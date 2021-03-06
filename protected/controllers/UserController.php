<?php

class UserController extends Controller
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
				'actions'=>array('gantipassword'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','index','view','create','update'),
				'expression'=>array('Controller', 'harus_admin'),
			),
			array('deny',
                                'users'=>array('*')
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
		$model=new User;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
                        if($model->seksi_id!=NULL):
                            $model->bidang_id = $model->seksi->bidang_id;
                        endif;
                        $model->scenario = 'create';
                        //print_r($model);exit;
                        if($model->validate()){
                            if($model->save()):
                                    Yii::app()->user->setFlash('success', "Data berhasil ditambah!");
                                    $this->redirect(array('index'));
                            endif;
                        }
		}

		$this->render('create',array(
			'model' => $model,
                        'bidangs' =>  Bidang::model()->findAll(),
                        'roles' =>  Role::model()->findAllByAttributes(array(),'id!=:id',array(':id'=>3))
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
                $model->bidang_id = $model->seksi->bidang_id;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
                        $model->scenario = 'update';
                        if($model->validate()):
                            if($model->save()):
                                    Yii::app()->user->setFlash('success', "Data berhasil diubah!");
                                    $this->redirect(array('index'));
                            endif;
                        endif;
		}

		$this->render('update',array(
			'model'=>$model,
                        'bidangs' =>  Bidang::model()->findAll(),
                        'seksis' =>  Seksi::model()->findAll(),
                        'roles' =>  Role::model()->findAllByAttributes(array(),'id!=:id',array(':id'=>3))
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
		$dataProvider=User::model()->findAll();
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return User the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=User::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
        
        public function actionGantipassword() {
            $model = new GantiPasswordForm;
            if(isset($_POST['GantiPasswordForm'])) {
                $model->attributes = $_POST['GantiPasswordForm'];
                if($model->validate()) {
                    $model->user->password = $model->user->hashPassword($model->password_new);
                    $model->user->save(false);
                    Yii::app()->user->setFlash('success', "Password telah diubah.");
                }
            }
            
            $model->password_new = NULL;
            $model->password_new_confirmation = NULL;
            $model->password_old = NULL;
            
            $this->render('ganti_password',array(
			'model'=>$model,
		));
        }

	/**
	 * Performs the AJAX validation.
	 * @param User $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
