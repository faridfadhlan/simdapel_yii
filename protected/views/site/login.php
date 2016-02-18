<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
?>
<body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="<?php echo Yii::app()->request->baseUrl; ?>"><b>SIMDAPEL</b></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableAjaxValidation'=>false,
)); ?>
          <div class="form-group has-feedback <?php echo $model->hasErrors('username')?'has-error':''; ?>">
              <?php echo $model->hasErrors('username')?CHtml::label($model->getError('username'),CHtml::activeName($model, 'username')):'';?>
              <?php echo $form->textField($model,'username',array('class'=>'form-control', 'placeholder'=>'Username')); ?>
            
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback <?php echo $model->hasErrors('password')?'has-error':''; ?>">
            <?php echo $model->hasErrors('password')?CHtml::label($model->getError('password'),CHtml::activeName($model, 'password')):'';?>
              <?php echo $form->passwordField($model,'password',array('class'=>'form-control', 'placeholder'=>'Password')); ?>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
        <div class="form-group has-feedback <?php echo $model->hasErrors('verifyCode')?'has-error':''; ?>">
             <?php echo $model->hasErrors('verifyCode')?CHtml::label($model->getError('verifyCode'),CHtml::activeName($model, 'verifyCode')):'';?>
            <?php $this->widget('CCaptcha');?>
            <?php echo $form->textField($model,'verifyCode',array('class'=>'form-control', 'placeholder'=>'Kode Verifikasi')); ?>
            
          </div>
            
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> Remember Me
                </label>
              </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
             
            </div><!-- /.col -->
          </div>
                        <div class="row"><div class="col-xs-12">
                             <?php echo 'Belum terdaftar? Silahkan registrasi di '.CHtml::link("sini", array('site/register'));?>
                            </div></div>
        <?php $this->endWidget();?>

        
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/public/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/public/bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/public/plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>