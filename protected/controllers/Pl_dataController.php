<?php

class Pl_dataController extends Controller
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
				'actions'=>array('create','update','pinjam', 'hapuspinjam'),
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
		$model=new PlData;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['PlData']))
		{
			$model->attributes = $_POST['PlData'];
                        $filenya = CUploadedFile::getInstance($model,'manual_file');
                        if(isset($filenya)) $model->manual = $model->nama.'.'.$filenya->getExtensionName();
                        $model->manual = $model->nama.'.'.$filenya->getExtensionName();
                        $model->operator_id = Yii::app()->user->id;
                        if($model->jenis_id != NULL)$model->set_kode();
                        //print_r($model->kode);exit;
			if($model->save()){
                                if(isset($filenya)) $filenya->saveAs(Yii::app()->basePath.'/../storage/manuals/'.$model->manual);
				Yii::app()->user->setFlash('success', "Data berhasil ditambah!");
                                $this->redirect(array('index'));
                        }
		}
                
                $criteria = new CDbCriteria(); 

		$this->render('create',array(
			'model'=>$model,
                        'medias' =>  PlMedia::model()->findAll(),
                        'licenses' => PlLicense::model()->findAll(),
                        'jenises' => PlJenis::model()->findAll(),
                        'companies' => PlCompany::model()->findAll(),
                        'kontaks' => User::model()->findAll($criteria->addInCondition('seksi_id',array(17,18,19)))
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
                $jenis_id_old = $model->jenis_id;
		if(isset($_POST['PlData']))
		{
			$model->attributes = $_POST['PlData'];
                        $filenya = CUploadedFile::getInstance($model,'manual_file');                        
                        $model->operator_id = Yii::app()->user->id;
                        if(isset($filenya)){
                            $model->manual = $model->nama.'.'.$filenya->getExtensionName();                            
                        }
                        
                        if($model->jenis_id != $jenis_id_old) {
                            $model->set_kode();
                        }
                        //print_r($model->kode);exit;
			if($model->save()){
                            if(isset($filenya)) $filenya->saveAs(Yii::app()->basePath.'/../storage/manuals/'.$model->manual);
                            Yii::app()->user->setFlash('success', "Data berhasil diupdate!");
                            $this->redirect(array('index'));
                        }
		}
                
                $criteria = new CDbCriteria(); 

		$this->render('update',array(
			'model'=>$model,
                        'medias' =>  PlMedia::model()->findAll(),
                        'licenses' => PlLicense::model()->findAll(),
                        'jenises' => PlJenis::model()->findAll(),
                        'companies' => PlCompany::model()->findAll(),
                        'kontaks' => User::model()->findAll($criteria->addInCondition('seksi_id',array(17,18,19)))
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
                Yii::app()->user->setFlash('success', "Data berhasil dihapus!");
                $this->redirect(array('index'));
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		//if(!isset($_GET['ajax']))
		//	$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex($update_id = NULL)
	{
		$dataProvider=PlData::model()->findAll();
                $this->js_tambahan = array(
                    '<script type="text/javascript" src="'.Yii::app()->request->baseUrl.'/public/plugins/datatables/jquery.dataTables.min.js'.'"></script>',
                    '<script type="text/javascript" src="'.Yii::app()->request->baseUrl.'/public/plugins/datatables/dataTables.bootstrap.min.js'.'"></script>'
                );
                //print_r($dataProvider);
                if($update_id == NULL) unset(Yii::app()->request->cookies['pl_data']);
		$this->render('index',array(
			'pl_data'=>$dataProvider,
                        'update_id'=>$update_id
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new PlData('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PlData']))
			$model->attributes=$_GET['PlData'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return PlData the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=PlData::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
        
        public function actionPinjam($id, $update_id=NULL) {
            Yii::app()->request->cookies['pl_data'] = new CHttpCookie('pl_data',$id);
            if($update_id!=NULL) $this->redirect(array('peminjaman_pl/update','id'=>$update_id));
            $this->redirect(array('peminjaman_pl/create'));
        }
        
        public function actionHapuspinjam() {
            unset(Yii::app()->request->cookies['pl_data']);
            $this->redirect(array('peminjaman_pl/create'));
        }

	/**
	 * Performs the AJAX validation.
	 * @param PlData $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='pl-data-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
