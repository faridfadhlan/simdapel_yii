<?php

class Peminjaman_plController extends Controller
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
				'actions'=>array('admin','delete','getDropdownSeksi','getDropdownPeminjam'),
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
		$model=new PlTransaksi;
                
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['PlTransaksi']))
		{
                        
			$model->attributes=$_POST['PlTransaksi'];
                        $model->operator_id = Yii::app()->user->id;
                        if($_POST['PlTransaksi']['duplikasi']==='1') $model->tgl_targetkembali = NULL;
			if($model->save()):
                            unset(Yii::app()->request->cookies['pl_data']);
                            $this->redirect(array('index'));
                        endif;
		}
                
                if(isset(Yii::app()->request->cookies['pl_data']))
                    $model->pl_data_id = Yii::app()->request->cookies['pl_data'];
                    
		$this->render('create',array(
			'model'=>$model,
                        'bidangs'=>  Bidang::model()->findAll(),
                        'pl_data'=> PlData::model()->findByPk((string)Yii::app()->request->cookies['pl_data'])
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

		if(isset($_POST['PlTransaksi']))
		{
			$model->attributes=$_POST['PlTransaksi'];
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
		$dataProvider=  PlTransaksi::model()->findAll();
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new PlTransaksi('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PlTransaksi']))
			$model->attributes=$_GET['PlTransaksi'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return PlTransaksi the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=PlTransaksi::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
        
        public function actionGetDropdownSeksi() {
            if(isset($_POST['bidang_id'])):
                $data=CHtml::listData(Seksi::model()->findAll('bidang_id=:bidang_id',array(':bidang_id'=>$_POST['bidang_id'])),'id','nama_seksi'); 
                echo "<option value=''>Pilih Seksi...</option>";
                foreach($data as $id=>$nama_bidang)
                    echo CHtml::tag('option', array('value'=>$id),CHtml::encode($nama_bidang),true);
            endif;
                
        }
        
        public function actionGetDropdownPeminjam() {
            if(isset($_POST['seksi_id'])):
                $data=CHtml::listData(User::model()->findAll('seksi_id=:seksi_id',array(':seksi_id'=>$_POST['seksi_id'])),'id','nama'); 
                echo "<option value=''>Pilih Nama Peminjam...</option>";
                foreach($data as $id=>$nama)
                    echo CHtml::tag('option', array('value'=>$id),CHtml::encode($nama),true);
            endif;
                
        }

	/**
	 * Performs the AJAX validation.
	 * @param PlTransaksi $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='pl-transaksi-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
