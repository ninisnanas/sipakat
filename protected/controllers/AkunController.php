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
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','view','filterkab','create','admin','delete'),
				'users'=>array('admin'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('view', 'update', 'updatepassword'),
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
			'model'=>Akun::model()->getDetailAkun($id),
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
		$this->performAjaxValidation($model);

		if(isset($_POST['Akun']))
		{
			$model->attributes=$_POST['Akun'];
			if ($model->password!='') {
				$model->password = crypt($model->password, self::blowfishSalt());
			}
			if($model->kode_role==1||$model->kode_role==2||$model->kode_role==3) {
				$model->kode_provinsi='';
				$model->kode_kabkot='';
			} else if($model->kode_role==4) {
				$model->kode_kabkot='';
			}

			if($model->save()) {
				Yii::app()->user->setFlash('success', "Akun berhasil dibuat!");
				$this->redirect(array('view','id'=>$model->username));
				$model->password = '';
				$model->password_repeat = '';
			}
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

		if(Yii::app()->user->getState('role') == 1) 
		{
			$ret=2;
		} else {
			$ret=null;
		}

		if(isset($_POST['Akun']))
		{
			$model->attributes=$_POST['Akun'];

			if($model->kode_role==1||$model->kode_role==2||$model->kode_role==3) {
				$model->kode_provinsi='';
				$model->kode_kabkot='';
			} else if($model->kode_role==4) {
				$model->kode_kabkot='';
			}
			if ($model->password != null && $ret==2) {
				$model->password = crypt($model->password, self::blowfishSalt());
			}

			if($model->save()) {
				Yii::app()->user->setFlash('successUpdate', "Akun berhasil diubah!");
				$this->redirect(array('view','id'=>$model->username));
			}
		}

		//echo var_dump(Yii::app()->user->getState('role'));
		//die();

		$this->render('update',array(
			'model'=>$model,
			'pass'=>$ret,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdatepassword($id)
	{
		$model=$this->loadModel($id);
		$compare=$this->loadModel($id);
		$model->scenario='updatePass';
		
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);
		
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

			$model->password = (crypt($model->password, $compare->password));
			if ($compare->password==$model->password) {
				$model->password = crypt($model->new_password, self::blowfishSalt());
				$valid=true;
			} else {
				$valid=false;
			}


			if($model->save()) {
				if ($valid==true) {
					Yii::app()->user->setFlash('successPass', "Password berhasil diubah!");
					$this->redirect(array('view','id'=>$compare->username));
				} else {
					Yii::app()->user->setFlash('notice', "Gagal mengubah password!");
					$this->redirect(array('updatepassword', 'id'=>$compare->username));
				}
			}
		}

		$this->render('update',array(
			'model'=>$model,
			'pass'=>1,
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
			Yii::app()->user->setFlash('successDelete', "Berhasil menghapus akun!");
			$this->render('index',array('dataProvider'=>Akun::model()->getListProvKab()));
		}
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$this->render('index',array('dataProvider'=>Akun::model()->getListProvKab()));
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

		/**
	 * Generate a random salt in the crypt(3) standard Blowfish format.
	 *
	 * @param int $cost Cost parameter from 4 to 31.
	 *
	 * @throws Exception on invalid cost parameter.
	 * @return string A Blowfish hash salt for use in PHP's crypt()
	 */
	function blowfishSalt($cost = 13)
	{
	    if (!is_numeric($cost) || $cost < 4 || $cost > 31) {
	        throw new Exception("cost parameter must be between 4 and 31");
	    }
	    $rand = array();
	    for ($i = 0; $i < 8; $i += 1) {
	        $rand[] = pack('S', mt_rand(0, 0xffff));
	    }
	    $rand[] = substr(microtime(), 2, 6);
	    $rand = sha1(implode('', $rand), true);
	    $salt = '$2a$' . sprintf('%02d', $cost) . '$';
	    $salt .= strtr(substr(base64_encode($rand), 0, 22), array('+' => '.'));
	    return $salt;
	}
}