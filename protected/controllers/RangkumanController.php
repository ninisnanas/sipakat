<?php

class RangkumanController extends Controller
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
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$tahun = Kegiatan::model()->getAllYears();
		$model = Kegiatan::model()->findAll();
		$dataProvider = null;
		$puskaji = 0;
		$bidang = 0;
		$kategori = 0;
		$tahun_selected = 0;		
		
		if(isset($_GET['yt0']))
		{
			//$dataProvider = array('aaa' => 'aaaaa');
			$puskaji = $_GET['puskaji'];
			$bidang = $_GET['bidang'];
			$kategori = $_GET['kategori'];
			$tahun_selected = $_GET['tahun_selected'];
			if ($tahun_selected != '')
			{
				if ($kategori == '1') 
				{
					if ($bidang != '') {
						$dataProvider = Kegiatan::model()->findAllByAttributes(array('id_bidang'=>(int) $bidang));
					} else if ($puskaji != '') {
						$dataProvider = Kegiatan::model()->findAllByAttributes(array('puskaji'=>(int) $puskaji));
					} else {
						$dataProvider = Kegiatan::model()->findAll();
					}
				} else if ($kategori == '2')
				{
					if ($bidang != '') {
						$dataProvider = Kegiatan::model()->getDetailKegiatanByBidang($bidang);
					} else if ($puskaji != '') {
						$dataProvider = Kegiatan::model()->getDetailKegiatanByPuskaji($puskaji);
					} else {
						$dataProvider = DetailKegiatan::model()->findAll();
					}
				} else if ($kategori == '3')
				{
					if ($bidang != '') {
						$id_personil = Personil::model()->getPersonilByBidang($bidang);
						$dataProvider = KegiatanPersonil::model()->countByBidang($bidang, $tahun_selected);
					} else if ($puskaji != '') {
						$dataProvider = KegiatanPersonil::model()->countByPuskaji($puskaji, $tahun_selected);
					} else {
						$dataProvider = KegiatanPersonil::model()->countAll($tahun_selected);
					}
				}
			}
		}
		
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			'puskaji'=>$puskaji,
			'bidang'=>$bidang,
			'kategori'=>$kategori,
			'model'=>$model,
			'tahun'=>$tahun,
			'tahun_selected'=>$tahun_selected
		));
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
