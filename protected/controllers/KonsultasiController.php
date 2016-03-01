<?php

class KonsultasiController extends Controller
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
                $konsultasi = new KonsultasiPost;
                $modelnya = KonsultasiThread::model()->with('konsultasiPosts')->findByPk($id);
                //$model = Konsultasi::model()->findAll('judul_id=:judul_id', array(':judul_id'=>$modelnya->judul_id));
		
                if(isset($_POST['KonsultasiPost']))
		{
			$konsultasi->attributes=$_POST['KonsultasiPost'];
                        if(Yii::app()->user->role_id == '1' || Yii::app()->user->role_id == '4') {
                            //$konsultasi->scenario = 'operator_tambah';
                        }
                        else {
                            $konsultasi->status = '1';
                            //$konsultasi->scenario = 'user_tambah';
                        }
                        //print_r(Yii::app()->user->role_id);exit;
			if($konsultasi->validate()) {
                            $konsultasi->judul_id = $modelnya->judul_id;
                            $konsultasi->user_id = Yii::app()->user->id;
                            $konsultasi->save(false);
                            //Update status thread
                            Konsultasi::model()->updateAll(
                                    array('status'=>$konsultasi->status),
                                    'judul_id=:judul_id',
                                    array(':judul_id'=>$konsultasi->judul_id)
                            );
                            //end of update status thread
                            $konsultasi->status = NULL;
                            $konsultasi->isi = NULL;
                            $this->redirect(array('konsultasi/view', 'id'=>$id));
                        }
		}
                
                $this->render('view',array(
			//'model'=>$model,
                        'modelnya'=>$modelnya,
                        'konsultasi'=>$konsultasi
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Konsultasi;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Konsultasi']))
		{
			$model->attributes=$_POST['Konsultasi'];
                        $model->scenario = 'baru';
                        if($model->validate()) {
                            $model->user_id = Yii::app()->user->id;
                            $model->status = '1';
                            $model->save(false);
                            $this->redirect(array('konsultasi/index'));
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
		// $this->performAjaxValidation($model);

		if(isset($_POST['Konsultasi']))
		{
			$model->attributes=$_POST['Konsultasi'];
                        $model->scenario = 'nambah';
                        
			if($model->validate()) {
                            $model->user_id = Yii::app()->user->id;
                            $model->save(false);
                            $model->status = NULL;
                            $model->isi = NULL;
                            $this->redirect(array('konsultasi/view', 'id'=>$id));
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
            $role = Yii::app()->user->role_id;
            if($role == '1' || $role=='4') {
                $dataProvider =  KonsultasiThread::model()->findAll();
            }
            else {
                $dataProvider =  KonsultasiThread::model()->findAll('user_id=:user_id', array(':user_id'=>Yii::app()->user->id));
                //print_r($dataProvider);exit;
            }
            
            
            
                //print_r($dataProvider);exit;
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Konsultasi('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Konsultasi']))
			$model->attributes=$_GET['Konsultasi'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Konsultasi the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=  KonsultasiThread::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Konsultasi $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='konsultasi-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
