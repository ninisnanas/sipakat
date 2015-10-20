<?php

class PersonilController extends Controller
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
				'actions'=>array('index','view', 'dinamis', 'dinamisForm', 'dinamisFormAkun'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
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

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Personil;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['Personil']))
		{
			$model->attributes=$_POST['Personil'];
			if($model->save())
				$this->redirect(array('index','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
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
		$this->performAjaxValidation($model);

		if(isset($_POST['Personil']))
		{
			$model->attributes=$_POST['Personil'];
			if($model->save())
				$this->redirect(array('index','id'=>$model->id));
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
		if(!isset($_GET['ajax'])) {
			Yii::app()->user->setFlash('successDelete', "Berhasil menghapus personil!");
			$this->render('index',array('dataProvider'=>Personil::model()->findAll()));
		}
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider = null;
		$puskaji = 0;
		$bidang = 0;
		if(isset($_GET['yt0']))
		{
			//$dataProvider = array('aaa' => 'aaaaa');
			if(isset($_GET['puskaji'])) {
				$puskaji = $_GET['puskaji'];
				$bidang = $_GET['kode_bidang'];
			} else {
				$puskaji = Yii::app()->user->getState('puskaji');
				$bidang = Yii::app()->user->getState('bidang');
			}
			$dataProvider = Personil::model()->findAllByAttributes(array('bidang'=>(int) $bidang));
		}
		$this->render('index',array(
			'puskaji' => $puskaji,
			'bidang' => $bidang,
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Personil('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Personil']))
			$model->attributes=$_GET['Personil'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Personil the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Personil::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	 /* Performs the AJAX validation.
	 * @param Personil $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='personil-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public static function  getNamaByBidang($kode_bidang) {
		$data = Personil::model()->findAll('id_bidang=:id_bidang',array(':id_bidang' => (int) $kode_bidang));
	  return CHtml::listData($data, 'id', 'nama');
	}

	public function actionDinamis()
	{
		$data=Bidang::model()->findAllByAttributes(array('id_puskaji'=>(int) $_POST['puskaji']));
		$data=CHtml::listData($data,'id','nama');

		echo CHtml::tag('option', array('value' => ''), 'Pilih Bidang', true);
		foreach($data as $value=>$name)
		{
		    echo CHtml::tag('option',
		               array('value'=>$value),CHtml::encode($name),true);
		}
	}

	public function actionDinamisForm()
	{
		if(isset($_POST['puskaji']))
	    {
	    	$data = Bidang::model()->getListBidangByPuskaji($_POST['puskaji']);	
	    } else {
	    	$data = Bidang::model()->getBidangList();
	    }
	    echo CHtml::tag('option', array('value' => ''), 'Pilih Bidang', true);
	    foreach ($data as $value => $name) {  
	        echo CHtml::tag('option', array('value' => $value), CHtml::encode($name), true);  
	    }  
	}

	public function actionDinamisFormAkun()
	{
		if(isset($_POST['bidang']))
	    {
	    	$data = Personil::model()->getNamaPersonilByBidang1($_POST['bidang']);	
	    } else {
	    	$data = Personil::model()->findAll();
	    }
	    echo CHtml::tag('option', array('value' => ''), 'Pilih Personil', true);
	    foreach ($data as $value => $name) {  
	        echo CHtml::tag('option', array('value' => $value), CHtml::encode($name), true);  
	    }  
	}
}
