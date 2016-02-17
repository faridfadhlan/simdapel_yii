<?php

class Permohonan_dataController extends Controller
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
				'expression'=>array('Controller','harus_admin_or_operator')
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
		$model_bps=new PermohonanDataBPSForm();
                $model_individu = new PermohonanDataIndividuForm();
                $model_instansi = new PermohonanDataInstansiForm();
		$tab_aktif = 0;

		if(isset($_POST['PermohonanDataBPSForm']))
		{
                        $model_bps->attributes = $_POST['PermohonanDataBPSForm'];
                        $permohonan = new PermohonanData;
                        $permohonan->attributes=$_POST['PermohonanDataBPSForm'];
                        if(isset($permohonan->peminjam_bps)):
                            $model_bps->bidang_id = $permohonan->peminjam_bps->seksi->bidang_id;
                            $model_bps->seksi_id = $permohonan->peminjam_bps->seksi_id;
                        endif;
                        if($model_bps->validate()):
                            $permohonan->flag_user='1';
                            if($permohonan->save())
				$this->redirect(array('index'));
                        endif;
		}
                
                if(isset($_POST['PermohonanDataIndividuForm']))
		{
                        $model_individu->attributes = $_POST['PermohonanDataIndividuForm'];
                        $permohonan = new PermohonanData;
                        $permohonan->attributes=$_POST['PermohonanDataIndividuForm'];
                        //print_r($model_individu);exit;
                        if($model_individu->validate()):
                            $permohonan->flag_user='2';
                            if($permohonan->pnbp=='2') :
                                $permohonan->proses_data = NULL;
                                $permohonan->size = NULL;
                            endif;
                            if($permohonan->save()):
                                unset(Yii::app()->request->cookies['data_inventori_id']);
                                $this->redirect(array('index'));
                            endif;
				
                        endif;
                        $tab_aktif = 1;
		}
                
                if(isset($_POST['PermohonanDataInstansiForm']))
		{
                        $model_instansi->attributes = $_POST['PermohonanDataInstansiForm'];
                        $permohonan = new PermohonanData;
                        $permohonan->attributes=$_POST['PermohonanDataInstansiForm'];
                        //print_r($model_individu);exit;
                        if($model_instansi->validate()):
                            $permohonan->flag_user='3';
                            if($permohonan->pnbp=='2') :
                                $permohonan->proses_data = NULL;
                                $permohonan->size = NULL;
                            endif;
                            if($permohonan->save()):
                                unset(Yii::app()->request->cookies['data_inventori_id']);
                                $this->redirect(array('index'));
                            endif;
				
                        endif;
                        $tab_aktif = 2;
		}
                
                
                
                if(isset(Yii::app()->request->cookies['data_inventori_id'])):
                    $model_bps->data_inventori_id = Yii::app()->request->cookies['data_inventori_id'];
                    $model_individu->data_inventori_id = Yii::app()->request->cookies['data_inventori_id'];
                    $model_instansi->data_inventori_id = Yii::app()->request->cookies['data_inventori_id'];
                endif;
                
                $this->render('create',array(
                        'tab_aktif'=>$tab_aktif,
			'model_bps'=>$model_bps,
                        'model_individu'=>$model_individu,
                        'model_instansi'=>$model_instansi,
                        'bidangs'=>  Bidang::model()->findAll(),
                        'data_inventori'=> DataInventori::model()->findByPk((string)Yii::app()->request->cookies['data_inventori_id'])
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
                $model_bps = new PermohonanDataBPSForm();
                $model_individu = new PermohonanDataIndividuForm();
                $model_instansi = new PermohonanDataInstansiForm();
                $tab_aktif = 0;
                
                //unset(Yii::app()->request->cookies['data_inventori_id']);
                Yii::app()->request->cookies['data_inventori_id'] = new CHttpCookie('data_inventori_id',$model->data_inventori_id);
                //print_r($model);exit;
                if($model->flag_user==1) {                    
                    $model_bps->attributes = $model->attributes;
                    //print_r($model_bps->attributes);exit;
                }
                
                if($model->flag_user==2) {
                    $model_individu->attributes = $model->attributes;
                    $tab_aktif = 1;
                }
                
                if($model->flag_user==3) {
                    $model_instansi->attributes = $model->attributes;
                    $tab_aktif = 2;
                }
                //print_r($tab_aktif);exit;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['PermohonanData']))
		{
			$model->attributes=$_POST['PermohonanData'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'tab_aktif'=>$tab_aktif,
			'model_bps'=>$model_bps,
                        'model_individu'=>$model_individu,
                        'model_instansi'=>$model_instansi,
                        'bidangs'=>  Bidang::model()->findAll(),
                        'data_inventori'=>DataInventori::model()->findByPk((string)Yii::app()->request->cookies['data_inventori_id']),
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
		$dataProvider= PermohonanData::model()->findAll();
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new PermohonanData('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PermohonanData']))
			$model->attributes=$_GET['PermohonanData'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return PermohonanData the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=PermohonanData::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param PermohonanData $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='permohonan-data-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
