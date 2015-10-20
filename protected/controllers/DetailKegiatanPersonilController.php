<?php

class DetailKegiatanPersonilController extends Controller
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
				'actions'=>array('index','view', 'dinamis'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update', 'addKegiatan', 'deleteKegiatan'),
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
		$model=new DetailKegiatanPersonil;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['DetailKegiatanPersonil']))
		{
			$model->attributes=$_POST['DetailKegiatanPersonil'];
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
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['DetailKegiatanPersonil']))
		{
			$model->attributes=$_POST['DetailKegiatanPersonil'];
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
		$dataProvider = null;
		$puskaji = 0;
		$bidang = 0;
		$tahun_selected = 0;
		$tahun = DetailKegiatanPersonil::model()->getAllYears();

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
				$dataProvider=DetailKegiatanPersonil::model()->getDetailKegiatanPersonilByBidang($bidang);
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

	public function actionAddKegiatan($id, $id_personil)
	{
		if($id != null) {
			$model=$this->loadModel($id);
		} else {
			$model=new KegiatanPersonil;
			$model->id_personil = $id_personil;
		}

		if(isset($_GET['yt0']))
		{
			echo var_dump($model->id_personil);
			echo var_dump($_GET['id_detail_kegiatan']);
			$kegiatan = new KegiatanPersonil;
			$kegiatan->id_personil = $model->id_personil;
			$kegiatan->id_detail_kegiatan = $_GET['id_detail_kegiatan'];
			$dk=DetailKegiatan::model()->getIdKegiatan($_GET['id_detail_kegiatan']);
			$k=Kegiatan::model()->getTahunKegiatan($dk[0]['id_kegiatan']);
			
			$kegiatan->tahun=$k[0]['tahun'];
			
			if($kegiatan->save()) {
				// create new detail_kegiatan_personil
				echo var_dump($id_personil);
				$detail = DetailKegiatan::model()->findByPk($_GET['id_detail_kegiatan']);
				if($id!=null) {
					for($a=1; $a<=12; $a++) {
			        	for($b=1; $b<=4; $b++) {
			        		$val = "w".$a.$b;
			        		if($detail->$val != NULL) {
			        			$model->$val = $kegiatan->id_detail_kegiatan;
			        		}
			        	}
			        }
			        $model->save();
				} else {
					$dkp = new DetailKegiatanPersonil;
					$dkp->id_personil = $kegiatan->id_personil;
					$dkp->tahun = $kegiatan->tahun;

					for($a=1; $a<=12; $a++) {
			        	for($b=1; $b<=4; $b++) {
			        		$val = "w".$a.$b;
			        		if($detail->$val != NULL) {
			        			$dkp->$val = $kegiatan->id_detail_kegiatan;
			        		}
			        	}
			        }
			        $dkp->save();
					}
		        $this->redirect(array('index','id'=>$model->id));
			}
		}

		$this->render('tambahKegiatan',array(
			'model'=>$model,
		));
	}

	public function actionDeleteKegiatan($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		//$kegiatan_personil=KegiatanPersonil::controller->loadModel($id);

		if(isset($_GET['yt0']))
		{
			$kegiatan_personil=KegiatanPersonil::model()->getKPbyIDnDK($model->id_personil, $model->tahun, $_GET['dk']);
			$kp = KegiatanPersonil::model()->findByPk($kegiatan_personil[0]['id']);
			$kp->delete();
			for($a=1; $a<=12; $a++) 
			{
	        	for($b=1; $b<=4; $b++) 
	        	{
	        		$val = "w".$a.$b;
	        		if($model->$val == $_GET['dk']) 
	        		{
	        			$model->$val = '';
	        		}
	        	}
	        }
	        $model->save();
		    $this->redirect(array('index','id'=>$model->id));
		}

		$this->render('hapusKegiatan',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new DetailKegiatanPersonil('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['DetailKegiatanPersonil']))
			$model->attributes=$_GET['DetailKegiatanPersonil'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return DetailKegiatanPersonil the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=DetailKegiatanPersonil::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param DetailKegiatanPersonil $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='detail-kegiatan-personil-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionDinamis()
	{
		$data=DetailKegiatanPersonil::model()->getNamaKegiatanByBidang($_POST['bidang']);
		$data_new=array();
		$ii=0;
		foreach ($data as $value) {
			$data_new[$ii] = array('id'=>$value['id'],
									'nama'=>$value['nk']." - ".$value['nama']);
			$ii++;
		}
		$dataBaru = CHtml::listData($data_new, 'id', 'nama');
		echo CHtml::tag('option', array('value' => ''), 'Pilih Detail Kegiatan', true);
		foreach($dataBaru as $value=>$name)
		{
		    echo CHtml::tag('option', array('value' => $value), CHtml::encode($name), true);  
		}
	}
}