<?php

class DetailKegiatanController extends Controller
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
	public function actionCreate($id)
	{
		$model=new DetailKegiatan;
		$model->id_kegiatan=$id;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['DetailKegiatan']))
		{
			$model->attributes=$_POST['DetailKegiatan'];
			$kegiatan=Kegiatan::model()->findByPk($model->id_kegiatan);
			$other_kg=DetailKegiatan::model()->findAllByAttributes(array('id_kegiatan'=>$id));
			$waktu_avg=0;
			$anggaran_avg=0;
			$temp_waktu=0;
			$temp_anggaran=0;
			if(!empty($other_kg)) {
				$ii = 0;
				foreach ($other_kg as $data) {
					$temp_waktu += $data->persen_waktu;
					$temp_anggaran += $data->persen_anggaran;
					$ii++;
				}
				$waktu_avg = $temp_waktu/$ii;
				$anggaran_avg = $temp_anggaran/$ii;
				$kegiatan->persen_waktu=$waktu_avg;
				$kegiatan->persen_anggaran=$anggaran_avg;
			} else {
				$kegiatan->persen_waktu = $model->persen_waktu;
				$kegiatan->persen_anggaran = $model->persen_anggaran;
				$kegiatan->save();
			}

			if($model->save())
				$this->redirect(array('index','id'=>$model->id_kegiatan));
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

		if(isset($_POST['DetailKegiatan']))
		{
			$model->attributes=$_POST['DetailKegiatan'];
			$kegiatan=Kegiatan::model()->findByPk($model->id_kegiatan);
			$other_kg=DetailKegiatan::model()->findAllByAttributes(array('id_kegiatan'=>$id));
			$waktu_avg=0;
			$anggaran_avg=0;
			if(!empty($other_kg)) {
				foreach ($other_kg as $data) {
				}
			} else {
				$kegiatan->persen_waktu = $model->persen_waktu;
				$kegiatan->persen_anggaran = $model->persen_anggaran;
				$kegiatan->save();
			}

			if($model->save())
				$this->redirect(array('index','id'=>$kegiatan->id));
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
			Yii::app()->user->setFlash('successDelete', "Berhasil menghapus detail kegiatan!");
			$this->render('index');
		}
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex($id)
	{
		$dataProvider=DetailKegiatan::model()->findAllByAttributes(array('id_kegiatan'=>$id));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			'id'=>$id
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new DetailKegiatan('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['DetailKegiatan']))
			$model->attributes=$_GET['DetailKegiatan'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return DetailKegiatan the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=DetailKegiatan::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param DetailKegiatan $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='detail-kegiatan-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
