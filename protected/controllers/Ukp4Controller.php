<?php

class Ukp4Controller extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			//'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('deny',  // deny all users
				'actions'=>array('rekap'),
				'users'=>array('admin','cataloguer'),
			),
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','admin','rekap'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('pusat'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$model = $this->loadModel($id);
		$type = Ukp4::KABUPATEN;
		$dataProvider = Ukp4::model()->getDataByUkp4($id);

		$this->render('view',array(
			'model'=> $model,
			'dataProvider' => $dataProvider,
			'type' => $type,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Ukp4;
		$tahun= Ukp4::model()->getAllYears();
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['Ukp4']))
		{
			$model->attributes=$_POST['Ukp4'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->kode_lap));
		}

		$this->render('create',array(
			'model'=>$model,
			'tahun'=>$tahun,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Ukp4']))
		{
			$model->attributes=$_POST['Ukp4'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->kode_lap));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Ukp4');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Ukp4('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Ukp4']))
			$model->attributes=$_GET['Ukp4'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionHistory($id, $tahun)
	{
		$nama_prop=Propinsi::model()->getNamaProvinsi($id);
		$dataProvider = Ukp4::model()->getListUpload($id);
		$dataProvider = $this->getListUKP($dataProvider, $tahun);

		$this->render('history',array(
			'dataProvider'=>$dataProvider,
			'tahun_selected'=>$tahun,
			'prov'=>false,
			'nama_prop'=>$nama_prop
		));
	}

	public function actionHistorykab()
	{
		$model=new Ukp4('search');

		$prov=true;

		$dataProvider = null;
		$nama_prop = null;
		$hasAction = false;
		$tahun= Ukp4::model()->getAllYears();
		$tahun_selected=9999;
		$this->performAjaxValidation($model);

		if(isset($_POST['Ukp4']))
		{
			if($_POST['Ukp4']['kode_prop'] === "") 
			{
				$kode_prop = Yii::app()->user->getState('provinsi');
			} 
			else 
			{
				$kode_prop=$_POST['Ukp4']['kode_prop'];
			}
			if ($_POST['Ukp4']['tahun'] === "") {
				$tahun_selected=9999;
			} else {
				$tahun_selected=$_POST['Ukp4']['tahun'];
			}
			$nama_prop=Propinsi::model()->getNamaProvinsi($kode_prop);
			$dataProvider = Ukp4::model()->getListUpload($kode_prop);
			$dataProvider = $this->getListUKP($dataProvider, $tahun_selected);

			$array = array(
				'kode_prop'=>$kode_prop,
				'tahun'=>$tahun_selected,
				);
			$model->attributes = $array;
		}

		if(Yii::app()->user->getState('role') == Akun::PROVINSI)
		{
			$model->kode_prop = Yii::app()->user->getState('provinsi');
		}

		$this->render('history',array(
			'dataProvider'=>$dataProvider,
			'tahun'=>$tahun,
			'tahun_selected'=>$tahun_selected,
			'model'=>$model,
			'nama_prop'=>$nama_prop,
			'hasAction'=>$hasAction,
			'prov'=>$prov,
		));
	}

	public function actionSummary()
	{
		$model=new Ukp4('search');

		$type = Ukp4::NASIONAL;

		$dataProvider = null;
		$nama_prop = null;
		$hasAction = false;
		$tahun= Ukp4::model()->getAllYears();
		$this->performAjaxValidation($model);

		if(isset($_GET['Ukp4']))
		{
			
			if ($_GET['Ukp4']['tahun'] === "") {
				$tahun_selected=9999;
			} else {
				$tahun_selected=$_GET['Ukp4']['tahun'];
			}
			$dataProvider = Ukp4::model()->getAllListUpload($tahun_selected);
			$dataProvider = $this->getAllListUKP($dataProvider);

			$array = array(
				'tahun'=>$tahun_selected,
				);
			$model->attributes = $array;
		}

		if(Yii::app()->user->getState('role') == Akun::PROVINSI)
		{
			$model->kode_prop = Yii::app()->user->getState('provinsi');
		}

		$this->render('summary',array(
			'dataProvider'=>$dataProvider,
			'tahun'=>$tahun,
			'model'=>$model,
			'nama_prop'=>$nama_prop,
			'hasAction'=>$hasAction,
			'type'=>$type,
		));
	}

	public function actionRekap($id = null)
	{
		$model=new Ukp4('search');

		$type = Ukp4::NASIONAL;

		$dataProvider = null;
		$hasAction = false;
		$tahun= Ukp4::model()->getAllYears();
		$this->performAjaxValidation($model);

		if(isset($_GET['Ukp4']))
		{
			if($_GET['Ukp4']['kode_prop'] === "")
			{
				$array = array(
					'triwulan'=>$_GET['Ukp4']['triwulan'],
					'tahun'=>$_GET['Ukp4']['tahun'],
				);
				$type = Ukp4::NASIONAL;
			} else {
				if($_GET['Ukp4']['kode_kab'] === "")
				{
					$array = array(
						'triwulan'=>$_GET['Ukp4']['triwulan'],
						'tahun'=>$_GET['Ukp4']['tahun'],
						'kode_prop'=>$_GET['Ukp4']['kode_prop'],
					);
					$type = Ukp4::PROVINSI;
				}else {
					$array = array(
						'triwulan'=>$_GET['Ukp4']['triwulan'],
						'tahun'=>$_GET['Ukp4']['tahun'],
						'kode_prop'=>$_GET['Ukp4']['kode_prop'],
						'kode_kab'=>$_GET['Ukp4']['kode_kab'],
					);
					$type = Ukp4::KABUPATEN;
					$hasAction = true;
				}
			}
			$model->attributes = $array;
			//$dataProvider = Ukp4::model()->getRekapitulasi($type,$array,$model->ketersediaan);
			if ($_GET['Ukp4']['ketersediaan'] === "") {
				$model->ketersediaan=0;
			} else {
				$model->ketersediaan=$_GET['Ukp4']['ketersediaan'];
			}
			$dataProvider = Ukp4::model()->getRekapitulasi($type,$array,$model->ketersediaan);
			if(isset($_GET['yt1']))
			{
				$this->actionPrint($dataProvider, $model);
			}

		} else if($id != null)
		{
			$model = $this->loadModel($id);
			$type = Ukp4::KABUPATEN;
			$hasAction = true;
			$array = array(
				'triwulan'=>$model['triwulan'],
				'tahun'=>$model['tahun'],
				'kode_prop'=>$model['kode_prop'],
				'kode_kab'=>$model['kode_kab'],
			);
			$dataProvider = Ukp4::model()->getRekapitulasi($type,$array,$model->ketersediaan);
			if(isset($_GET['yt1']))
			{
				$this->actionPrint($dataProvider, $model);
			}
		}

		if(Yii::app()->user->getState('role') == Akun::PROVINSI)
		{
			$model->kode_prop = Yii::app()->user->getState('provinsi');
		}

		if(Yii::app()->user->getState('role') == AKUN::KABUPATEN)
		{
			$model->kode_prop = Yii::app()->user->getState('provinsi');
			$model->kode_kab = Yii::app()->user->getState('kabupaten');
		}
		$this->render('rekap',array(
			'dataProvider'=>$dataProvider,
			'kode_lap'=>$model->kode_lap,
			'triwulan'=>$model->triwulan,
			'tahun'=>$tahun,
			'tahun_ukp'=>$model->tahun,
			'model'=>$model,
			'ketersediaan'=>$model->ketersediaan,
			'hasAction'=>$hasAction,
			'type'=>$type,
		));
	}

	public function actionPrint($dataProvider, $model){
		include 'protected/extensions/PHPExcel/IOFactory.php';
		$objPHPExcel = PHPExcel_IOFactory::load('protected/upload/template.xls');;
		$objPHPExcel->setActiveSheetIndex(0);
		$objSheet = $objPHPExcel->getActiveSheet();
		$objSheet->setTitle('UKP4');

		$styleArray = array(
				'borders' => array(
		  				'allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN)
		  		)
		);

		$col = 1;
		$row = 10;
		foreach($dataProvider as $data)
		{
		 	$objSheet->setCellValueByColumnAndRow($col,$row,$row-7);
		 	$objSheet->setCellValueByColumnAndRow($col+1,$row,$data['nama']);
		 	$objSheet->setCellValueByColumnAndRow($col+2,$row,$data['satuan']);
		 	if ($data['total_penggunaan'] != 0) {
		 		$objSheet->setCellValueByColumnAndRow($col+3,$row,$data['kebutuhan']);
		 	}
		 	$objSheet->setCellValueByColumnAndRow($col+4,$row,$data['total_penggunaan']);
		 	$objSheet->setCellValueByColumnAndRow($col+5,$row,$data['sisa_stok']);
		 	$objSheet->setCellValueByColumnAndRow($col+6,$row,"=F".$row."+G".$row);
		 	$objSheet->setCellValueByColumnAndRow($col+7,$row,"=IF(E".$row."=\"\",0,H".$row."/E".$row."*100)");
		  	$row++;
		}
		$objPHPExcel->getActiveSheet()->getStyle('B7:I'.($row-1))->applyFromArray($styleArray);
		$objPHPExcel->getActiveSheet()->setCellValue('H'.($row),'Ketersediaan = ');
		$objPHPExcel->getActiveSheet()->setCellValue('I'.($row),"=AVERAGE(I10:I".($row-1).")");
		$objPHPExcel->getActiveSheet()->setCellValue('C'.($row+2),'Mengetahui');
		$objPHPExcel->getActiveSheet()->setCellValue('C'.($row+3),'Kepala Dinas Kesehatan');
		$objPHPExcel->getActiveSheet()->setCellValue('C'.($row+4),'Kab/Kota');
		$objPHPExcel->getActiveSheet()->setCellValue('C'.($row+9),'...................');
		$objPHPExcel->getActiveSheet()->setCellValue('C'.($row+10),'NIP: ...........');
		$objPHPExcel->getActiveSheet()->setCellValue('H'.($row+3),'<nama tempat>, <dd-mm-yyyy>');
		$objPHPExcel->getActiveSheet()->setCellValue('H'.($row+4),'<jabatan>');
		$objPHPExcel->getActiveSheet()->setCellValue('H'.($row+9),'...................');
		$objPHPExcel->getActiveSheet()->setCellValue('H'.($row+10),'NIP: ...........');
		$objSheet->getStyle('B1:I4')->getProtection()->setLocked(PHPExcel_Style_Protection::PROTECTION_UNPROTECTED);
		$objSheet->getStyle('C'.($row+3).':H'.($row+10))->getProtection()->setLocked(PHPExcel_Style_Protection::PROTECTION_UNPROTECTED);
		$objSheet->getStyle('I10:I'.($row))->getNumberFormat()->setFormatCode('0.00');
		$objSheet->getProtection()->setSheet(true);
	    if (ob_get_contents()) ob_end_clean();
	    ob_start();
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');

		


		if($model['triwulan'] == 1){
			$objPHPExcel->getActiveSheet()->setCellValue('G7','SISA STOK PER 28 FEBRUARI 2013');
			$objPHPExcel->getActiveSheet()->setCellValue('F7','TOTAL PENGGUNAAN BULAN DESEMBER 2012 S/D BULAN FEBRUARI 2013');
			$objPHPExcel->getActiveSheet()->setCellValue('C4','B-03');
			//$objWriter->save('protected/file/template/template-ukp4-B03.xls');
		}
		if($model['triwulan'] == 2){
			$objPHPExcel->getActiveSheet()->setCellValue('G7','SISA STOK PER 31 MEI 2013');
			$objPHPExcel->getActiveSheet()->setCellValue('F7','TOTAL PENGGUNAAN BULAN DESEMBER 2012 S/D BULAN MEI 2013');
			$objPHPExcel->getActiveSheet()->setCellValue('C4','B-06');
			//$objWriter->save('protected/file/template/template-ukp4-B06.xls');
		}
		if($model['triwulan'] == 3){
			$objPHPExcel->getActiveSheet()->setCellValue('G7','SISA STOK PER 31 AGUSTUS 2013');
			$objPHPExcel->getActiveSheet()->setCellValue('F7','TOTAL PENGGUNAAN BULAN DESEMBER 2012 S/D BULAN AGUSTUS 2013');
			$objPHPExcel->getActiveSheet()->setCellValue('C4','B-09');
			//$objWriter->save('protected/file/template/template-ukp4-B09.xls');
		}
		if($model['triwulan'] == 4){
			$objPHPExcel->getActiveSheet()->setCellValue('G7','SISA STOK PER 30 NOVEMBER 2013');
			$objPHPExcel->getActiveSheet()->setCellValue('F7','TOTAL PENGGUNAAN BULAN DESEMBER 2012 S/D BULAN NOVEMBER 2013');
			$objPHPExcel->getActiveSheet()->setCellValue('C4','B-12');
			//$objWriter->save('protected/file/template/template-ukp4-B12.xls');
		}
		
	  	header('Content-Type: application/vnd.ms-excel');
	    header('Content-Disposition: attachment;filename="print.xls"');
	    header('Cache-Control: max-age=0');
		  $objWriter->save('php://output');
	}

	//public function

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Ukp4 the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Ukp4::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Ukp4 $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='ukp4-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function getListUKP($dataProvider, $tahun)
	{
		$list_kab = array();
		$array = array();
		$ii = 0;
		foreach ($dataProvider as $data) {
			$kode_kab=$data['kode_kab'];
			if (!in_array($kode_kab, $list_kab))
			{
				array_push($list_kab, $kode_kab);
				$ii++;
				$array[$ii]['nama']=$data['nama'];
				$array[$ii]['1']=0;
				$array[$ii]['2']=0;
				$array[$ii]['3']=0;
				$array[$ii]['4']=0;
				
				if ($data['triwulan']==1 && $data['tahun']==$tahun) 
					{
						$array[$ii]['1']=1;
						$array[$ii]['val']=$data['ketersediaan'];
					}
				if ($data['triwulan']==2 && $data['tahun']==$tahun)
					{
						$array[$ii]['2']=1;
						$array[$ii]['val']=$data['ketersediaan'];
					}
				if ($data['triwulan']==3 && $data['tahun']==$tahun)
					{
						$array[$ii]['3']=1;
						$array[$ii]['val']=$data['ketersediaan'];
					}
				if ($data['triwulan']==4 && $data['tahun']==$tahun)
					{
						$array[$ii]['4']=1;
						$array[$ii]['val']=$data['ketersediaan'];
					}
			} else {
				if ($data['triwulan']==1 && $data['tahun']==$tahun)
					{
						$array[$ii]['1']=1;
						$array[$ii]['val']=$data['ketersediaan'];
					}
				if ($data['triwulan']==2 && $data['tahun']==$tahun)
					{
						$array[$ii]['2']=1;
						$array[$ii]['val']=$data['ketersediaan'];
					}
				if ($data['triwulan']==3 && $data['tahun']==$tahun)
					{
						$array[$ii]['3']=1;
						$array[$ii]['val']=$data['ketersediaan'];
					}
				if ($data['triwulan']==4 && $data['tahun']==$tahun)
					{
						$array[$ii]['4']=1;
						$array[$ii]['val']=$data['ketersediaan'];
					}
					
			}
		}
		return $array;
	}

	public function getAllListUKP($dataProvider)
	{
		$list_prov = array();
		$array = array();
		$ii = 0;
		$exist = false;
		foreach ($dataProvider as $data) {
			$kode_prov=$data['kode_prop'];
			if (!in_array($kode_prov, $list_prov))
			{
				array_push($list_prov, $kode_prov);
				$ii++;
				$array[$ii]['kode_prop']=$kode_prov;
				$array[$ii]['nama']=$data['nama'];
				$array[$ii]['1']=0;
				$array[$ii]['2']=0;
				$array[$ii]['3']=0;
				$array[$ii]['4']=0;
				
				if ($data['triwulan']==1)
					{
						$array[$ii]['1']=$data['jumlah'];
						$exist=true;
					}
				if ($data['triwulan']==2)
					{
						$array[$ii]['2']=$data['jumlah'];
						$exist=true;
					}
				if ($data['triwulan']==3)
					{
						$array[$ii]['3']=$data['jumlah'];
						$exist=true;
					}
				if ($data['triwulan']==4)
					{
						$array[$ii]['4']=$data['jumlah'];
						$exist=true;
					}
			} else {
				if ($data['triwulan']==1)
					{
						$array[$ii]['1']=$data['jumlah'];
						$exist=true;
					}
				if ($data['triwulan']==2)
					{
						$array[$ii]['2']=$data['jumlah'];
						$exist=true;
					}
				if ($data['triwulan']==3)
					{
						$array[$ii]['3']=$data['jumlah'];
						$exist=true;
					}
				if ($data['triwulan']==4)
					{
						$array[$ii]['4']=$data['jumlah'];
						$exist=true;
					}
			}
		}
		if ($exist)
			return $array;
		else return null;
	}

	public function actionDetail($kode_obat, $triwulan, $tahun, $kode_prop = null , $kode_kab = null)
	{
		$model = Obat::model()->findByPk($kode_obat);
		if($kode_prop == null && $kode_kab == null)
		{
			$detailType = 1;
		}else if($kode_kab == null)
		{
			$detailType = 2;
		}else {
			$criteria = new CDbCriteria;
			$criteria->condition = 'kode_kab= :kab AND kode_prop= :prop AND triwulan= :triwulan AND tahun= :tahun';
			$criteria->params = array(':kab'=>$kode_kab,':prop'=>$kode_prop,':triwulan'=>$triwulan,':tahun'=>$tahun);

			$ukp4 = Ukp4::model()->find($criteria);
			$this->redirect(array('rekap','id'=>$ukp4->kode_lap));
		}
		
		$dataProvider = Ukp4::model()->getDetailObat($kode_obat, $triwulan, $tahun, $kode_prop, $kode_kab);
		$this->render('detail',array(
			'dataProvider'=>$dataProvider,
			'triwulan'=>$triwulan,
			'tahun'=>$tahun,
			'model'=>$model,
			'detailType'=>$detailType,
		));
	}
}
