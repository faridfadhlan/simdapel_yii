<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
    
        public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
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
			array('allow',  // allow all users to access 'index' and 'view' actions.
				'actions'=>array('login','buat','register','captcha'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated users to access all actions
                            'actions'=>array('index','logout','error'),
                            'users'=>array('@'),
			),
			array('deny',  // deny all users
				
                            'users'=>array('*'),
			),
		);
	}
        
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
            //eval('echo ("Hai");');exit;
            $this->layout = '//layouts/column2';
            
            $role = Yii::app()->user->role_id;
            if($role=='1'){
                $jumlah['data1'] = array(PlData::model()->count(), 'Perangkat Lunak');
                $jumlah['data2'] = array(DataInventori::model()->count(), 'Data Inventori');
                $jumlah['data3'] = array(User::model()->count('role_id=3'), 'Pengguna Mendaftar');
                $jumlah['data4'] = array(PermohonanData::model()->count('status=:status',array(':status'=>'warning')), 'Permohonan Data Pending');
                $this->render('index', array(
                    'jumlah'=>$jumlah, 
                    'peminjaman_pl'=>  PlTransaksi::model()->findAll('tgl_targetkembali IS NOT NULL && tgl_kembali IS NULL'),
                    'permohonan_data' => PermohonanData::model()->findAll('status=:status', array(':status'=>'warning')),
                ));
            }
            
            if($role=='2' || $role=='3') {
                $jumlah['data1'] = array(PlData::model()->count(), 'Perangkat Lunak');
                $jumlah['data2'] = array(DataInventori::model()->count(), 'Data Inventori');
                $jumlah['data3'] = array(PermohonanData::model()->count('user_id=:user_id AND status=:status', array(':user_id'=>Yii::app()->user->id,':status'=>'warning')), 'Permohonan Data Pending');
                $jumlah['data4'] = array(PermohonanData::model()->count('user_id=:user_id', array(':user_id'=>Yii::app()->user->id)), 'Total Permohonan Data');
                $this->render('index_user_non_bps', array(
                    'jumlah'=>$jumlah, 
                    'permohonan_data'=>  PermohonanData::model()->findAll('user_id=:user_id',array(':user_id'=>Yii::app()->user->id))
                ));
                //$jumlah['permohonan_data'] = PermohonanData::model()->count('user_id=:user_id', array(':user_id'=>Yii::app()->user->id));
            }
            
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
			else{
                            $this->layout='//layouts/auth/column1';
                            $this->render('error', $error);
                        }
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
					"Content-Type: text/plain; charset=UTF-8";

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
            $this->layout='//layouts/auth/column1';
		$model=new LoginForm;


		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
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
        
        public function actionRegister()
        {
                $this->layout = '//layouts/kosong';
                $model = new RegistrasiForm;
                if(isset($_POST['RegistrasiForm']))
		{
			$model->attributes=$_POST['RegistrasiForm'];
			if($model->validate()):
                            $user = new User;
                            $user->attributes = $model->attributes;
                            $user->role_id = '3';
                            if($user->save()){
                                $this->redirect(array('site/login'));
                            }
                        endif;
		}
		// display the login form
		$this->render('register',array('model'=>$model));
        }
        
        public function actionBuat($pass){
            echo User::hashPassword($pass);
        }
}