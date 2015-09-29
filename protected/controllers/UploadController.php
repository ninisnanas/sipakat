<?php

class UploadController extends Controller
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
				'actions'=>array('create','update','ukp4','preview'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
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

	public function actionUkp4()
	{
		$model = new Upload;
		$model->setTriwulan();
		$model->setTahun();
		
		$criteria = new CDbCriteria;
		$criteria->condition = 'username= :name';
		$criteria->order = 'waktu DESC';
		$criteria->params = array(':name'=>Yii::app()->user->getName());
		
		$pages = new CPagination(Upload::model()->count());
		$pages->pageSize = 5;
		$pages->applyLimit($criteria);
		
		$dataProvider = Upload::model()->findAll($criteria);
		
		if(isset($_POST['Upload']))
		{
			$model->attributes = $_POST['Upload'];
			$model->file=CUploadedFile::getInstance($model,'file');
			$array = array(
					'triwulan'=>$_POST['Upload']['triwulan'],
					'tahun'=>$_POST['Upload']['tahun'],
					'filename'=>$model->getFileName(),
					'username'=>Yii::app()->user->getName(),
					'kode_provinsi'=>Yii::app()->user->getState('provinsi'),
					'kode_kabkot'=>Yii::app()->user->getState('kabupaten'),
			);
			if($model->save() && Upload::model()->isUkp4Valid($array))
			{
				$tempArray = array('upload_id'=> $model->id);
				$array = array_merge($array, $tempArray);
				$model->file->saveAs('protected/upload/'.$array['filename']);
				$res = $this->jobsUkp4($array);
				unlink(getcwd().'/protected/upload/'.$array['filename']);
				if($res['valid'])
				{
					$model->status = 1;
					$model->save();
					$this->redirect(array('Ukp4/rekap','id'=>$res['id']));
				}
			} else {
				$this->redirect(array('Upload/ukp4'));
			}
		}

		$this->render('ukp4',array(
			'model'=>$model,
			'dataProvider'=>$dataProvider,
			'pages'=>$pages
		));
	}

	public function jobsUkp4($array)
	{
		include 'protected/extensions/PHPExcel/IOFactory.php';
		$command = Yii::app()->db->createCommand();
		$inputFileName = 'protected/upload/'.$array['filename'];

		try {
		    $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
		    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
		    $objPHPExcel = $objReader->load($inputFileName);
		} catch(Exception $e) {
		    die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
		}

		$sheet = $objPHPExcel->getSheet(0); 
		$highestRow = $sheet->getHighestRow();
		$highestColumn = PHPExcel_Cell::columnIndexFromString($sheet->getHighestColumn()); 

		if($highestColumn !== Ukp4::COLUMN_SIZE || $highestRow !== (Ukp4Master::model()->count() + 20))
		{
			return array('valid'=>false,'id'=>null);
		}
		
		$model = new Ukp4;
		$model->kode_prop = $array['kode_provinsi'];
		$model->kode_kab = $array['kode_kabkot'];
		$model->triwulan = $array['triwulan'];
		$model->tahun = $array['tahun'];

		if($model->save())
		{
			$list_obat = Ukp4Master::model()->getListNamaObat();
			for($row = 10; $row <= ($highestRow-10); $row++)
			{
				$rowData = $sheet->rangeToArray('B' . $row . ':' . 'I' . $row,NULL,TRUE,FALSE);
				if($list_obat[$row-10]['nama'] === $rowData[0][1])
				{
					if($rowData[0][3] != "0" && $rowData[0][4] != "0") {
						$attributes = array(
		    			'kode_lap'=>$model->kode_lap,
		    			'kode_obat'=>$list_obat[$row-10]['kode_obat'],
		    			'kebutuhan'=> round($rowData[0][3]),
		    			'total_penggunaan'=> round($rowData[0][4]),
						  'sisa_stok'=> round($rowData[0][5]),
							'jumlah'=> round($rowData[0][6]),
							'ketersediaan'=> round($rowData[0][7])
						);
					} else {
						$attributes = array(
		    			'kode_lap'=>$model->kode_lap,
		    			'kode_obat'=>$list_obat[$row-10]['kode_obat'],
		    			'kebutuhan'=> 0,
		    			'total_penggunaan'=> 0,
						  'sisa_stok'=> 0,
							'jumlah'=> 0,
							'ketersediaan'=> 0
						);
					}
					$model->addLineItem($attributes);
				} else 
				{
					Yii::app()->db
		       		->createCommand()->delete('ukp4_line_item','kode_lap=:kodelap', array(':kodelap'=>$model->kode_lap));
		      		$model->delete();  
		       		return array('valid'=>false,'id'=>null);;					
				}
			}
			$model->setKetersediaan();
			return array('valid'=>true,'id'=>$model->kode_lap);
		}
		return array('valid'=>false,'id'=>null);
	}
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Upload;
		$dataProvider = Upload::model()->findAll();
		$model->setTriwulan();
		$model->setTahun();
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Upload']))
		{
			$model->attributes =$_POST['Upload'];
			$model->file=CUploadedFile::getInstance($model,'file');
			$model->setTriwulan();
			$model->setTahun();
			if($model->save()){
				$array = array(
					'triwulan'=>$model->getTriwulan(),
					'tahun'=>$model->getTahun(),
					'filename'=>$model->getFileName(),		
				);
				$model->file->saveAs('protected/upload/'.$model->getFileName());
				$this->actionUkp4($array);
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionPreview($ID_laporan){
		$line_item = Yii::app()->db->createCommand()
		->select('id, nama, satuan, kebutuhan, total_penggunaan, sisa_stok')
        ->from('ukp4_line_item, obat')
        ->where('ukp4_line_item.kode_obat = obat.kode_obat and kode_lap=:id', array(':id'=>$ID_laporan))
    	->queryAll();

    	$this->render('preview',array(
			'line_item'=>$line_item,
			'ID_laporan'=>$ID_laporan,
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

		if(isset($_POST['Upload']))
		{
			$model->attributes=$_POST['Upload'];
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

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$criteria = new CDbCriteria;
		$criteria->condition = 'username= :name';
		$criteria->order = 'waktu DESC';
		$criteria->params = array(':name'=>Yii::app()->user->getName());
		
		$dataProvider = Upload::model()->findAll($criteria);
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Upload('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Upload']))
			$model->attributes=$_GET['Upload'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Upload the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Upload::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Upload $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='upload-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
