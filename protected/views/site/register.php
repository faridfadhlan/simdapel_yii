<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl;?>/public/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl;?>/public/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl;?>/public/plugins/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl;?>/public/dist/css/AdminLTE.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl;?>/public/plugins/iCheck/square/blue.css">
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="register-page">
    <div class="register-container">
        <div class="register-logo">
            Sistem Informasi Manajemen Data dan Perangkat Lunak
        </div>
        <div class="box box-primary">
            <div class="box-header with-border">
               <h4 align="center">Pendaftaran Pengguna Layanan Konsultasi Statistik</h4>
            </div>
            <?php $form=$this->beginWidget('CActiveForm', array(
                'id'=>'registrasi-form',
                'enableAjaxValidation'=>false,
            )); ?>
            <div class="box-body">
                <?php $errors = $model->getErrors();?>
            <div class="col-xs-6">
                <div class="form-group has-feedback <?php echo isset($errors['nama'])?'has-error' : '';?>">
                    <?php echo $model->hasErrors('nama')?CHtml::label($model->getError('nama'),CHtml::activeName($model, 'nama'), array('class'=>'control-label')):$form->labelEx($model,'nama');?>
                    <?php echo $form->textField($model,'nama',array('maxlength'=>50,'class'=>'form-control','placeholder'=>$model->getAttributeLabel('nama'))); ?>   
                </div>
                <div class="form-group has-feedback <?php echo isset($errors['username'])?'has-error' : '';?>">
                    <?php echo $model->hasErrors('username')?CHtml::label($model->getError('username'),CHtml::activeName($model, 'username'), array('class'=>'control-label')):$form->labelEx($model,'username');?>
                    <?php echo $form->textField($model,'username',array('maxlength'=>20,'class'=>'form-control','placeholder'=>$model->getAttributeLabel('username'))); ?>   
                </div>
                <div class="form-group has-feedback <?php echo isset($errors['email'])?'has-error' : '';?>">
                    <?php echo $model->hasErrors('email')?CHtml::label($model->getError('email'),CHtml::activeName($model, 'email'), array('class'=>'control-label')):$form->labelEx($model,'email');?>
                    <?php echo $form->textField($model,'email',array('maxlength'=>20,'class'=>'form-control','placeholder'=>$model->getAttributeLabel('email'))); ?>   
                </div>
                <div class="form-group has-feedback <?php echo isset($errors['password'])?'has-error' : '';?>">
                    <?php echo $model->hasErrors('password')?CHtml::label($model->getError('password'),CHtml::activeName($model, 'password'), array('class'=>'control-label')):$form->labelEx($model,'password');?>
                    <?php echo $form->passwordField($model,'password',array('maxlength'=>20,'class'=>'form-control','placeholder'=>$model->getAttributeLabel('password'))); ?>   
                </div>
                <div class="form-group has-feedback <?php echo isset($errors['password_confirmation'])?'has-error' : '';?>">
                    <?php echo $model->hasErrors('password_confirmation')?CHtml::label($model->getError('password_confirmation'),CHtml::activeName($model, 'password_confirmation'), array('class'=>'control-label')):$form->labelEx($model,'password_confirmation');?>
                    <?php echo $form->passwordField($model,'password_confirmation',array('maxlength'=>20,'class'=>'form-control','placeholder'=>$model->getAttributeLabel('password_confirmation'))); ?>   
                </div>
                <div class="form-group has-feedback <?php echo isset($errors['jenis_identitas'])?'has-error' : '';?>">
                    <?php echo $model->hasErrors('jenis_identitas')?CHtml::label($model->getError('jenis_identitas'),CHtml::activeName($model, 'jenis_identitas'), array('class'=>'control-label')):$form->labelEx($model,'jenis_identitas');?>
                    <?php echo $form->dropDownList($model,'jenis_identitas',array('1'=>'KTP','2'=>'SIM','3'=>'Lainnya'),array('class'=>'form-control','prompt'=>'Pilih Jenis Identitas...')); ?>   
                </div>
                <div class="form-group has-feedback <?php echo isset($errors['no_identitas'])?'has-error' : '';?>">
                    <?php echo $model->hasErrors('no_identitas')?CHtml::label($model->getError('no_identitas'),CHtml::activeName($model, 'no_identitas'), array('class'=>'control-label')):$form->labelEx($model,'no_identitas');?>
                    <?php echo $form->textField($model,'no_identitas',array('maxlength'=>20,'class'=>'form-control','placeholder'=>$model->getAttributeLabel('no_identitas'))); ?>   
                </div>
                <div class="form-group has-feedback <?php echo isset($errors['umur'])?'has-error' : '';?>">
                    <?php echo $model->hasErrors('umur')?CHtml::label($model->getError('umur'),CHtml::activeName($model, 'umur'), array('class'=>'control-label')):$form->labelEx($model,'umur');?>
                    <?php echo $form->textField($model,'umur',array('maxlength'=>2,'class'=>'form-control','placeholder'=>$model->getAttributeLabel('umur'))); ?>   
                </div>
                <div class="form-group has-feedback <?php echo isset($errors['jk'])?'has-error' : '';?>">
                    <?php echo $model->hasErrors('jk')?CHtml::label($model->getError('jk'),CHtml::activeName($model, 'jk'), array('class'=>'control-label')):$form->labelEx($model,'jk');?>
                    <?php echo $form->dropDownList($model,'jk',array('1'=>'Laki-Laki','2'=>'Perempuan'),array('class'=>'form-control','prompt'=>'Pilih Jenis Kelamin...')); ?>   
                </div>
            </div>
            <div class="col-xs-6">
                
                <div class="form-group has-feedback <?php echo isset($errors['pendidikan_terakhir'])?'has-error' : '';?>">
                    <?php echo $model->hasErrors('pendidikan_terakhir')?CHtml::label($model->getError('pendidikan_terakhir'),CHtml::activeName($model, 'pendidikan_terakhir'), array('class'=>'control-label')):$form->labelEx($model,'pendidikan_terakhir');?>
                    <?php echo $form->dropDownList($model,'pendidikan_terakhir',array('1'=>'SMA', '2'=>'D1/D2/D3', '3'=>'S1/D4', '4'=>'S2', '5'=>'S3'),array('class'=>'form-control','prompt'=>'Pilih Pendidikan Terakhir...')); ?>   
                </div>
                <div class="form-group has-feedback <?php echo isset($errors['alamat'])?'has-error' : '';?>">
                    <?php echo $model->hasErrors('alamat')?CHtml::label($model->getError('alamat'),CHtml::activeName($model, 'alamat'), array('class'=>'control-label')):$form->labelEx($model,'alamat');?>
                    <?php echo $form->textArea($model,'alamat',array('class'=>'form-control','placeholder'=>$model->getAttributeLabel('alamat'),'rows'=>'8')); ?>   
                </div>
                <div class="form-group has-feedback <?php echo isset($errors['telp'])?'has-error' : '';?>">
                    <?php echo $model->hasErrors('telp')?CHtml::label($model->getError('telp'),CHtml::activeName($model, 'telp'), array('class'=>'control-label')):$form->labelEx($model,'telp');?>
                    <?php echo $form->textField($model,'telp',array('class'=>'form-control','placeholder'=>$model->getAttributeLabel('telp'))); ?>   
                </div>
                <div class="form-group has-feedback <?php echo isset($errors['pekerjaan'])?'has-error' : '';?>">
                    <?php echo $model->hasErrors('pekerjaan')?CHtml::label($model->getError('pekerjaan'),CHtml::activeName($model, 'pekerjaan'), array('class'=>'control-label')):$form->labelEx($model,'pekerjaan');?>
                    <?php echo $form->textField($model,'pekerjaan',array('class'=>'form-control','placeholder'=>$model->getAttributeLabel('pekerjaan'))); ?>   
                </div>
                <div class="form-group has-feedback <?php echo isset($errors['instansi_pekerjaan'])?'has-error' : '';?>">
                    <?php echo $model->hasErrors('instansi_pekerjaan')?CHtml::label($model->getError('instansi_pekerjaan'),CHtml::activeName($model, 'instansi_pekerjaan'), array('class'=>'control-label')):$form->labelEx($model,'instansi_pekerjaan');?>
                    <?php echo $form->textField($model,'instansi_pekerjaan',array('class'=>'form-control','placeholder'=>$model->getAttributeLabel('instansi_pekerjaan'))); ?>   
                </div>
                <div class="form-group has-feedback <?php echo isset($errors['verifyCode'])?'has-error' : '';?>">
                    <?php echo $model->hasErrors('verifyCode')?CHtml::label($model->getError('verifyCode'),CHtml::activeName($model, 'verifyCode'), array('class'=>'control-label')):$form->labelEx($model,'verifyCode');?>
                    <br /><?php $this->widget('CCaptcha');?>
                    <?php echo $form->textField($model,'verifyCode',array('class'=>'form-control','placeholder'=>$model->getAttributeLabel('verifyCode'))); ?>   
                </div>
            </div>
          
          </div>
                <div class="box-footer">
                    <div class="form-group col-md-6">
                    <?php echo CHtml::submitButton('Register', array('class'=>'btn btn-primary','style'=>'float:left;margin-right:5px;')); ?>
                    <?php echo CHtml::link('Saya Sudah Mendaftar', array('site/login'), array('class'=>'btn btn-primary','style'=>'float:left;')); ?>
                    <!--<a href="{{ URL::to('login') }}" class="text-center" style="text-decoration: underline;">I already have a membership</a>-->
                    </div>
                </div>
            <?php $this->endWidget(); ?>
            
        </form>
        
      </div><!-- /.form-box -->
      
    </div><!-- /.register-box -->
    </div>

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo Yii::app()->baseUrl;?>/public/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo Yii::app()->baseUrl;?>/public/bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo Yii::app()->baseUrl;?>/public/plugins/iCheck/icheck.min.js"></script>
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
  </html>