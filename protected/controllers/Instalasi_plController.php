<?php

class Instalasi_plController extends Controller
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
				'expression'=>function () {
                                                if(isset(Yii::app()->user->role_id)):
                                                    if(Yii::app()->user->role_id == '1' || Yii::app()->user->role_id == '4') return true;
                                                    return false;
                                                endif;
                                            }
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
		$model=new PlInstalasi;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['PlInstalasi']))
		{
			$model->attributes=$_POST['PlInstalasi'];
			if($model->save()):
                            unset(Yii::app()->request->cookies['pl_data_id_instal']);
                            Yii::app()->user->setFlash('success', "Data berhasil ditambah!");
                            $this->redirect(array('index'));
                        endif;
				
		}

                if(isset(Yii::app()->request->cookies['pl_data_id_instal']))
                    $model->pl_data_id = Yii::app()->request->cookies['pl_data_id_instal'];
                
		$this->render('create',array(
			'model'=>$model,
                        'bidangs'=>  Bidang::model()->findAll(),
                        'pl_data'=> PlData::model()->findByPk((string)Yii::app()->request->cookies['pl_data_id_instal'])
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

		if(isset($_POST['PlInstalasi']))
		{
			$model->attributes=$_POST['PlInstalasi'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}
                
                $model->bidang_id = $model->pegawai->seksi->bidang_id;
                $model->seksi_id = $model->pegawai->seksi_id;
		$this->render('update',array(
			'model'=>$model,
                        'bidangs'=>  Bidang::model()->findAll(),
                        'pl_data'=> PlData::model()->findByPk($model->pl_data_id)
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
		$dataProvider=  PlInstalasi::model()->findAll();
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new PlInstalasi('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PlInstalasi']))
			$model->attributes=$_GET['PlInstalasi'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return PlInstalasi the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=PlInstalasi::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param PlInstalasi $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='pl-instalasi-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
