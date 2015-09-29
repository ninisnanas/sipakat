<?php

class AkunController extends Controller
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
			'postOnly + delete', // we only allow deletion via POST request
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
		$model=new Akun;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Akun']))
		{
			$model->attributes=$_POST['Akun'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
		$model=Akun::model()->findByAttributes(array("username" => $id));
		$compare=Akun::model()->findByAttributes(array("username" => $id));

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		$model->password='';
		if ($model->new_password != null) {
			$model->new_password='';
		}
		if ($model->password_repeat != null) {
			$model->password_repeat='';
		}

		if(isset($_POST['Akun']))
		{
			$model->attributes=$_POST['Akun'];

			//$model->password = (crypt($model->password, $compare->password));
			if ($compare->password==$model->password) {
				if($model->new_password==$model->password_repeat) {
					$model->password=$model->new_password;
					//$model->password = crypt($model->new_password, self::blowfishSalt());
					$valid=true;
				} else {
					$valid=false;
				}
			} else {
				$valid=false;
			}


			if($model->save()) {
				if ($valid==true) {
					Yii::app()->user->setFlash('successPass', "Password berhasil diubah!");
					$this->redirect(array('view','id'=>$compare->id));
				} else {
					Yii::app()->user->setFlash('notice', "Gagal mengubah password!");
					$this->redirect(array('update', 'id'=>$compare->username));
				}
			}
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
		$dataProvider=new CActiveDataProvider('Akun');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Akun('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Akun']))
			$model->attributes=$_GET['Akun'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Akun the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Akun::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Akun $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='akun-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
