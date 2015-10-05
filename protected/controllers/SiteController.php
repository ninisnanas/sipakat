<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		if (Yii::app()->user->isGuest) {
			$this->layout = "login";
			$this->redirect(array('site/login'));
		} else {
			$this->layout = "main";
			if(Yii::app()->user->getState('role') == 1) 
				$this->render('home'); //homenasional
			elseif(Yii::app()->user->getState('role') == 2)
				$this->render('home');
			elseif(Yii::app()->user->getState('role') == 3)
				$this->render('home'); //homeprov
			elseif(Yii::app()->user->getState('role') == 4)
				$this->render('home'); //homeprov
			elseif(Yii::app()->user->getState('role') == 5)
				$this->render('home'); //homekab
		}
	}

	public function actionSummary()
	{
		// cek role
		$this->render('summary');
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionTentang()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->layout = "main";
		$this->render('tentang');
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionSitemap()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('map');
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionHome()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('home');
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionAdminHome()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		// $this->layout = "main_admin";
		$this->render('home');
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionPusatHome()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		// $this->layout = "main_pusat";
		$this->render('homenasional');
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionProvHome()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		// $this->layout = "main_prov";
		$this->render('homeprov');
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionKabHome()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		// $this->layout = "main_kab";
		$this->render('homekab');
	}

	/**
	 * 
	 */
	public function actionLplpo()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('lplpo');
	}

	/**
	 * 
	 */
	public function actionFormAkun()
	{
		// renders the view file 'protected/views/site/.php'
		// using the default layout 'protected/views/layouts/.php'
		$this->render('formakun');
	}

	/**
	 * 
	 */
	public function actionFormObat()
	{
		// renders the view file 'protected/views/site/.php'
		// using the default layout 'protected/views/layouts/.php'
		$this->render('formobat');
	}

	/**
	 * 
	 */
	public function actionFormProvinsi()
	{
		// renders the view file 'protected/views/site/.php'
		// using the default layout 'protected/views/layouts/.php'
		$this->render('formprovinsi');
	}

	/**
	 * 
	 */
	public function actionFormKab()
	{
		// renders the view file 'protected/views/site/.php'
		// using the default layout 'protected/views/layouts/.php'
		$this->render('formkab');
	}

	/**
	 * 
	 */
	public function actionFormSupplier()
	{
		// renders the view file 'protected/views/site/.php'
		// using the default layout 'protected/views/layouts/.php'
		$this->render('formsupplier');
	}

	/**
	 * 
	 */
	public function actionFormUnggah()
	{
		// renders the view file 'protected/views/site/.php'
		// using the default layout 'protected/views/layouts/.php'
		$this->render('formunggah');
	}

	/**
	 * 
	 */
	public function actionDaftarAkun()
	{
		// renders the daftar file 'protected/daftars/site/.php'
		// using the default layout 'protected/daftars/layouts/.php'
		$this->render('daftarakun');
	}

	/**
	 * 
	 */
	public function actionDaftarObat()
	{
		// renders the daftar file 'protected/daftars/site/.php'
		// using the default layout 'protected/daftars/layouts/.php'
		$this->render('daftarobat');
	}

	/**
	 * 
	 */
	public function actionDaftarProvinsi()
	{
		// renders the daftar file 'protected/daftars/site/.php'
		// using the default layout 'protected/daftars/layouts/.php'
		$this->render('daftarprovinsi');
	}

	/**
	 * 
	 */
	public function actionDaftarKab()
	{
		// renders the daftar file 'protected/daftars/site/.php'
		// using the default layout 'protected/daftars/layouts/.php'
		$this->render('daftarkab');
	}

	/**
	 * 
	 */
	public function actionDaftarSupplier()
	{
		// renders the daftar file 'protected/daftars/site/.php'
		// using the default layout 'protected/daftars/layouts/.php'
		$this->render('daftarsupplier');
	}

	/**
	 * 
	 */
	public function actionDaftarUnggahKab()
	{
		// renders the view file 'protected/views/site/.php'
		// using the default layout 'protected/views/layouts/.php'
		$this->render('daftarunggahkab');
	}

	/**
	 * 
	 */
	public function actionDaftarUnggahPuskesmas()
	{
		// renders the view file 'protected/views/site/.php'
		// using the default layout 'protected/views/layouts/.php'
		$this->render('daftarunggahpuskesmas');
	}

	/**
	 * 
	 */
	public function actionTransaksi()
	{
		// renders the view file 'protected/views/site/.php'
		// using the default layout 'protected/views/layouts/.php'
		$this->render('transaksipenerimaanobat');
	}

	/**
	 * 
	 */
	public function actionFilterKetersediaan()
	{
		// renders the view file 'protected/views/site/.php'
		// using the default layout 'protected/views/layouts/.php'
		$this->render('filterketersediaanobat');
	}

	/**
	 * 
	 */
	public function actionFormKetersediaanObat()
	{
		// renders the view file 'protected/views/site/.php'
		// using the default layout 'protected/views/layouts/.php'
		$this->render('formketersediaanobat');
	}

	/**
	 * 
	 */
	public function actionKetersediaanObat()
	{
		// renders the view file 'protected/views/site/.php'
		// using the default layout 'protected/views/layouts/.php'
		$this->render('ketersediaanobat');
	}

	/**
	 * 
	 */
	public function actionPilihObat()
	{
		// renders the view file 'protected/views/site/.php'
		// using the default layout 'protected/views/layouts/.php'
		// $this->layout = "main_pusat";
		$this->render('formpilihobat');
	}

	/**
	 * 
	 */
	public function actionUKP4()
	{
		// renders the view file 'protected/views/site/.php'
		// using the default layout 'protected/views/layouts/.php'
		// $this->layout = "main_pusat";
		$this->render('ukp4');
	}

	/**
	 * 
	 */
	public function actionUnggahUKP4()
	{
		// renders the view file 'protected/views/site/.php'
		// using the default layout 'protected/views/layouts/.php'
		// $this->layout = "main_pusat";
		$this->render('unggahukp4');
	}

	/**
	 * 
	 */
	public function actionReviewUnggahUKP4()
	{
		// renders the view file 'protected/views/site/.php'
		// using the default layout 'protected/views/layouts/.php'
		// $this->layout = "main_pusat";
		$this->render('evaluasi');
	}

	/**
	 * 
	 */
	public function actionRiwayatUKP4()
	{
		// renders the view file 'protected/views/site/.php'
		// using the default layout 'protected/views/layouts/.php'
		// $this->layout = "main_pusat";
		$this->render('riwayatukp4');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login()) {
				$this->redirect(array('index'));
			}
		}
		// display the login form
		$this->layout = "login";
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

	public function actionDownload($id)
  	{
  		$model=Referensi::model()->findByPk($id);
  		$model->timestamp = new CDbExpression('NOW()');
  		$filename = "protected/file/".$model->file;
  		$content = "Content-Disposition: attachment;filename=\"".$model->file."\"";
  		header('Content-Type: application/force-download');
	    header('Cache-Control: max-age=0');
 		$filecontent=file_get_contents($filename);
  		header($content);	
  		echo $filecontent;
	    exit;
  	}

  	public function actionGetChart() 
  	{
  		$bidang = $_POST['bidang'];
  		$values = array(
  			array('name' => 'Jane', 'data' => array(5)),
            array('name' => 'John', 'data' => array(5))
            );
		$data = array();
		$data['values'] = $values;	
		var_dump($data);
		die();		
  		$this->renderPartial('_graph', $data, false, true);
  	}
}