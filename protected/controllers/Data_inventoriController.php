<?php

class Data_inventoriController extends Controller
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
				'actions'=>array('view','index', 'getnocd'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','pinjam','hapuspinjam','create','update','importexcel'),
				'expression'=>function () {
                                                if(isset(Yii::app()->user->role_id)):
                                                    if(Yii::app()->user->role_id == '1' || Yii::app()->user->role_id == '4') return true;
                                                    return false;
                                                endif;
                                            }
			),
                        array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('mohon'),
				'expression'=>function () {
                                                if(isset(Yii::app()->user->role_id)):
                                                    if(Yii::app()->user->role_id == '2' || Yii::app()->user->role_id == '3') return true;
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
		$model=new DataInventori;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['DataInventori']))
		{
			$model->attributes=$_POST['DataInventori'];
                        $filenya = CUploadedFile::getInstance($model,'manual_file');
                        if(isset($filenya)) :
                            $model->nama_layout = $model->label_cd.'.'.$filenya->getExtensionName();
                        endif;
			if($model->save()):
                                Yii::app()->user->setFlash('success', "Data berhasil ditambah!");
                                if(isset($filenya)) {
                                    $filenya->saveAs(Yii::app()->basePath.'/../storage/layouts/'.$model->nama_layout);
                                }
				$this->redirect(array('index'));
                        endif;
		}

		$this->render('create',array(
			'model'=>$model,
                        'subjeks'=>  DataSubjek::model()->findAll()
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

		if(isset($_POST['DataInventori']))
		{
                        $filenya = CUploadedFile::getInstance($model,'layout_file');
                        //print_r($filenya);exit;
                        if(isset($filenya)) :
                            $layout_lama = $model->nama_layout;
                            $model->nama_layout = $model->nama_data.'.'.$filenya->getExtensionName();
                        endif;
			$model->attributes=$_POST['DataInventori'];
			if($model->save()):
                                if(isset($filenya)) {
                                    if($layout_lama != NULL && file_exists(Yii::app()->basePath.'/../storage/layouts/'.$layout_lama)) {
                                        unlink(Yii::app()->basePath.'/../storage/layouts/'.$layout_lama);
                                    }
                                    $filenya->saveAs(Yii::app()->basePath.'/../storage/layouts/'.$model->nama_layout);
                                }
                                Yii::app()->user->setFlash('success', "Data berhasil diupdate!");
				$this->redirect(array('index'));
                        endif;
		}

		$this->render('update',array(
			'model'=>$model,
                        'subjeks'=>  DataSubjek::model()->findAll()
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
	public function actionIndex()
	{
		$dataProvider=  DataInventori::model()->findAll();
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
        
        

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new DataInventori('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['DataInventori']))
			$model->attributes=$_GET['DataInventori'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return DataInventori the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=DataInventori::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
        
        public function actionPinjam($id, $update_id = NULL) {
            Yii::app()->request->cookies['data_inventori_id'] = new CHttpCookie('data_inventori_id',$id);
            if($update_id != NULL) $this->redirect(array('permohonan_data/update','id'=>$update_id));
            $this->redirect(array('permohonan_data/create'));
        }
        
        public function actionMohon($id, $update_id = NULL) {
            Yii::app()->request->cookies['mohon_data_inventori_id'] = new CHttpCookie('mohon_data_inventori_id',$id);
            if($update_id != NULL) $this->redirect(array('permohonan_data/umum','id'=>$update_id));
            $this->redirect(array('permohonan_data/umum'));
        }
        
        public function actionHapuspinjam() {
            unset(Yii::app()->request->cookies['data_inventori_id']);
            $this->redirect(array('permohonan_data/create'));
        }

	/**
	 * Performs the AJAX validation.
	 * @param DataInventori $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='data-inventori-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        public function actionImportexcel()
        {
            $model = new ImportExcelForm;
            if(isset($_POST['ImportExcelForm'])) {
                $model->attributes = $_POST['ImportExcelForm'];
                if($model->validate())
                    Yii::app()->user->setFlash('success', $model->jumlah_import. " data berhasil diimport!");
            }
            $this->render('importexcel', array('model'=>$model));
        }
        
        public function actionGetnocd() {
            $subjek_id = $_POST['subjek_id'];
            $data = new DataInventori;
            $data->subjek_id = $subjek_id;
            $data->set_new_kode();
            echo $data->no_cd;
        }
}
