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
                
                $role = Yii::app()->user->role_id;
                $konsultasi = new KonsultasiPost;
                $modelnya = KonsultasiThread::model()->with('konsultasiPosts')->findByPk($id);
                
                if($modelnya->user_id != Yii::app()->user->id && ($role != '1' && $role !='4')) 
                    throw new CHttpException(404,'The specified post cannot be found.');
                
                if(isset($_POST['KonsultasiPost']))
		{
			$konsultasi->attributes = $_POST['KonsultasiPost'];
                        if($role == '1' || $role == '4') {                            
                            $konsultasi->scenario = 'operator_tambah';
                            $modelnya->read_status = '1';
                            $modelnya->status = $konsultasi->status;
                        }
                        else {
                            $konsultasi->scenario = 'user_tambah';
                            $modelnya->read_status = '2';
                            $modelnya->status = '1';
                        }
                        $modelnya->save();
			if($konsultasi->validate()) {
                            $konsultasi->thread_id = $modelnya->id;
                            $konsultasi->user_id = Yii::app()->user->id;
                            $konsultasi->save(false);
                            
                            $konsultasi->status = NULL;
                            $konsultasi->isi = NULL;
                            $this->redirect(array('konsultasi/view', 'id'=>$id));
                        }
		}
                
                else {
                    if($role == '1' || $role=='4'){
                        if($modelnya->read_status == '2') $modelnya->read_status = '3';
                        $modelnya->save(false);
                    }
                        
                    else {
                        if($modelnya->read_status == '1') $modelnya->read_status = '3';
                        $modelnya->save(false);
                    }
                }
                
                $this->render('view',array(
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
		$model = new KonsultasiForm;
                

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['KonsultasiForm']))
		{
			$model->attributes=$_POST['KonsultasiForm'];
                        if($model->validate()) {
                            $thread = new KonsultasiThread;
                            $post = new KonsultasiPost;
                            $thread->judul = $model->judul;
                            $thread->status = '1';
                            $thread->read_status = '2';
                            $thread->user_id = Yii::app()->user->id;
                            $thread->save();
                            
                            $post->isi = $model->isi;
                            $post->user_id = $thread->user_id;
                            $post->thread_id = $thread->id;
                            $post->save();
                            
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
