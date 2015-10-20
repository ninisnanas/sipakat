<?php

class KegiatanController extends Controller
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
		$model=new Kegiatan;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Kegiatan']))
		{
			$model->attributes=$_POST['Kegiatan'];
			$model->anggaran=0;
			$model->persen_anggaran=0;
			$model->waktu=0;
			$model->persen_waktu=0;
			if($model->save())
				$this->redirect(array('index'));
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
		// $this->performAjaxValidation($model);

		if(isset($_POST['Kegiatan']))
		{
			$model->attributes=$_POST['Kegiatan'];
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
		$dataProvider = null;
		$puskaji = 0;
		$bidang = 0;
		$tahun_selected = 0;
		$tahun = Kegiatan::model()->getAllYears();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax'])) {
			Yii::app()->user->setFlash('successDelete', "Berhasil menghapus kegiatan!");
			$this->render('index',array('puskaji' => $puskaji,
			'bidang' => $bidang,
			'tahun_selected' => $tahun_selected,
			'tahun' => $tahun,
			'dataProvider'=>$dataProvider));
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
		$tahun_selected = 0;
		$tahun = Kegiatan::model()->getAllYears();

		if(isset($_GET['yt0']))
		{
			//$dataProvider = array('aaa' => 'aaaaa');
			$tahun_selected = $_GET['tahun_selected'];
			if(isset($_GET['puskaji'])) {
				$puskaji = $_GET['puskaji'];
				$bidang = $_GET['kode_bidang'];
			} else {
				$puskaji = Yii::app()->user->getState('puskaji');
				$bidang = Yii::app()->user->getState('bidang');
			}
			if ($tahun_selected != '')
			{
				$dataProvider = Kegiatan::model()->findAllByAttributes(array('id_bidang'=>(int) $bidang, 'tahun'=>(int) $tahun_selected));
			}
		}
		$this->render('index',array(
			'puskaji' => $puskaji,
			'bidang' => $bidang,
			'tahun_selected' => $tahun_selected,
			'tahun' => $tahun,
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Kegiatan('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Kegiatan']))
			$model->attributes=$_GET['Kegiatan'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Kegiatan the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Kegiatan::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Kegiatan $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='kegiatan-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
