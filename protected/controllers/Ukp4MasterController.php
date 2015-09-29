<?php

class Ukp4MasterController extends Controller
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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','delete'),
				'users'=>array('pusat'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('download'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		// get 
		$daftar_obat = Yii::app()->db->createCommand()
					 ->select(array('kode_obat','nama'))
					 ->from('obat')->queryAll();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Ukp4Master']))
		{
			Ukp4Master::model()->deleteAll();
			foreach($_POST['Ukp4Master'] as $i) {
				if(isset($_POST['Ukp4Master'][$i]))
				{
					$model = new Ukp4Master;
					$model->kode_obat = $i;
					$model->save(true);
				}
			}
			$this->generateExcel();
			$this->redirect(array('Ukp4Master/index'));
		}
		$test = $this->getAllObatStatus($daftar_obat);
		$this->render('create',array(
			'daftar_obat' => $daftar_obat , 'temp_master' => $test
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

		if(isset($_POST['Ukp4Master']))
		{
			$model->attributes=$_POST['Ukp4Master'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
		$this->generateExcel();
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(array('index'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$data = Ukp4Master::model()->with('kodeObat')->findAll();
		$this->render('index',array(
			'dataProvider'=>$data,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Ukp4Master('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Ukp4Master']))
			$model->attributes=$_GET['Ukp4Master'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Ukp4Master the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Ukp4Master::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function getAllObatStatus($list_obat)
	{
		$obat_status = array();
		foreach($list_obat as $obat)
		{
			$model= Ukp4Master::model()->find('kode_obat=:kode', array(':kode'=>$obat['kode_obat']));
			if($model)
			{
				array_push($obat_status,1);
			}else {
				array_push($obat_status,0);
			}
		}
		return $obat_status;
	}

	public function generateExcel(){
		include 'protected/extensions/PHPExcel/IOFactory.php';
	  	for($i = 0; $i<4; $i++){
			$objPHPExcel = PHPExcel_IOFactory::load('protected/upload/template.xls');;
			$objPHPExcel->setActiveSheetIndex(0);
			$objPHPExcel->getDefaultStyle()->getFont()->setSize(8); 
			$objSheet = $objPHPExcel->getActiveSheet();
			$objSheet->setTitle('UKP4');

			$styleArray = array(
					'borders' => array(
			  				'allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN)
			  		)
			);

			$dataProvider = Ukp4Master::model()->with('kodeObat')->findAll();
			$col = 1;
			$row = 10;
			foreach($dataProvider as $data)
			{
			 	$objSheet->setCellValueByColumnAndRow($col,$row,$row-9);
			 	$objSheet->setCellValueByColumnAndRow($col+1,$row,$data->kodeObat->nama);
			 	$objSheet->setCellValueByColumnAndRow($col+2,$row,$data->kodeObat->satuan);
			 	$objSheet->setCellValueByColumnAndRow($col+6,$row,"=F".$row."+G".$row);
			 	$objSheet->setCellValueByColumnAndRow($col+7,$row,"=IF(OR(E".$row."=\"\",E".$row."= 0),0,H".$row."/E".$row."*100)");
			  $row++;
			}
			$objPHPExcel->getActiveSheet()->getStyle('B7:I'.($row-1))->applyFromArray($styleArray);
			$objPHPExcel->getActiveSheet()->setCellValue('H'.($row),'Ketersediaan = ');
			$objPHPExcel->getActiveSheet()->setCellValue('I'.($row),"=AVERAGE(I10:I".($row-1).")*100");
			$objPHPExcel->getActiveSheet()->setCellValue('C'.($row+2),'Mengetahui');
			$objPHPExcel->getActiveSheet()->setCellValue('C'.($row+3),'Kepala Dinas Kesehatan');
			$objPHPExcel->getActiveSheet()->setCellValue('C'.($row+4),'Kab/Kota');
			$objPHPExcel->getActiveSheet()->setCellValue('C'.($row+9),'...................');
			$objPHPExcel->getActiveSheet()->setCellValue('C'.($row+10),'NIP: ...........');
			$objPHPExcel->getActiveSheet()->setCellValue('G'.($row+3),'<nama tempat>, <dd-mm-yyyy>');
			$objPHPExcel->getActiveSheet()->setCellValue('G'.($row+4),'<jabatan>');
			$objPHPExcel->getActiveSheet()->setCellValue('G'.($row+9),'...................');
			$objPHPExcel->getActiveSheet()->setCellValue('G'.($row+10),'NIP: ...........');
			$objSheet->getStyle('E10:G'.($row-1))->getProtection()->setLocked(PHPExcel_Style_Protection::PROTECTION_UNPROTECTED);
			//$objSheet->getStyle('E10:G'.($row-1))->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
			//$objSheet->getStyle('E10:G'.($row-1))->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
			$objSheet->getStyle('E10:H'.($row-1))->getNumberFormat()->setFormatCode('#,#');
			$objSheet->getStyle('B1:I4')->getProtection()->setLocked(PHPExcel_Style_Protection::PROTECTION_UNPROTECTED);
			$objSheet->getStyle('C'.($row+3).':H'.($row+10))->getProtection()->setLocked(PHPExcel_Style_Protection::PROTECTION_UNPROTECTED);
			$objSheet->getStyle('I10:I'.($row))->getNumberFormat()->setFormatCode('0.00');
			$objSheet->getProtection()->setSheet(true);
  		if (ob_get_contents()) ob_end_clean();
		  ob_start();
			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
			if($i == 0){
				$objPHPExcel->getActiveSheet()->setCellValue('G7','SISA STOK PER 28 FEBRUARI 2013');
				$objPHPExcel->getActiveSheet()->setCellValue('F7','TOTAL PENGGUNAAN BULAN DESEMBER 2012 S/D BULAN FEBRUARI 2013');
				$objPHPExcel->getActiveSheet()->setCellValue('B4','PERIODE: B-03');
				$objWriter->save('protected/file/template/template-ukp4-B03.xls');
			}
			if($i == 1){
				$objPHPExcel->getActiveSheet()->setCellValue('G7','SISA STOK PER 31 MEI 2013');
				$objPHPExcel->getActiveSheet()->setCellValue('F7','TOTAL PENGGUNAAN BULAN DESEMBER 2012 S/D BULAN MEI 2013');
				$objPHPExcel->getActiveSheet()->setCellValue('B4','PERIODE: B-06');
				$objWriter->save('protected/file/template/template-ukp4-B06.xls');
			}
			if($i == 2){
				$objPHPExcel->getActiveSheet()->setCellValue('G7','SISA STOK PER 31 AGUSTUS 2013');
				$objPHPExcel->getActiveSheet()->setCellValue('F7','TOTAL PENGGUNAAN BULAN DESEMBER 2012 S/D BULAN AGUSTUS 2013');
				$objPHPExcel->getActiveSheet()->setCellValue('B4','PERIODE: B-09');
				$objWriter->save('protected/file/template/template-ukp4-B09.xls');
			}
			if($i == 3){
				$objPHPExcel->getActiveSheet()->setCellValue('G7','SISA STOK PER 30 NOVEMBER 2013');
				$objPHPExcel->getActiveSheet()->setCellValue('F7','TOTAL PENGGUNAAN BULAN DESEMBER 2012 S/D BULAN NOVEMBER 2013');
				$objPHPExcel->getActiveSheet()->setCellValue('B4','PERIODE: B-12');
				$objWriter->save('protected/file/template/template-ukp4-B12.xls');
			}
		}
  }

  public function actionDownload($id)
  {
  	if((int) Ukp4Master::model()->count() !== 0)
  	{
  		header('Content-Type: application/vnd.ms-excel');
	    header('Cache-Control: max-age=0');
  		if($id == 1)
  		{
  			$filecontent=file_get_contents('protected/file/template/template-ukp4-B03.xls');
  			header('Content-Disposition: attachment;filename="template-ukp4-B03.xls"');	
  		}else if($id == 2)
  		{
  			$filecontent=file_get_contents('protected/file/template/template-ukp4-B06.xls');
  			header('Content-Disposition: attachment;filename="template-ukp4-B06.xls"');
  		}else if($id == 3)
  		{
  			$filecontent=file_get_contents('protected/file/template/template-ukp4-B09.xls');
  			header('Content-Disposition: attachment;filename="template-ukp4-B09.xls"');
  		}else {
  			$filecontent=file_get_contents('protected/file/template/template-ukp4-B12.xls');
  			header('Content-Disposition: attachment;filename="template-ukp4-B12.xls"');
  		}
	    echo $filecontent;
	    exit;
  	} else {
  					
  	}
  }

	/**
	 * Performs the AJAX validation.
	 * @param Ukp4Master $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='ukp4-master-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
