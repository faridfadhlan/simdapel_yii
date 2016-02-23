<div class="content-wrapper">
          <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Ganti Password
            <!--<small>Control panel</small>-->
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Ganti Password</li>
          </ol>
        </section>


<section class="content">
    <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Ganti Password</h3>
                </div>
        <div class="box-body">
            <?php if(Yii::app()->user->hasFlash('success')):?>
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Alert!</h4>
            <?php echo Yii::app()->user->getFlash('success');?>
        </div>
        <?php endif;?>
<?php echo CHtml::errorSummary($model,NULL, NULL,array('class'=>'alert alert-danger')); ?>
</div>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ganti-password-form',
	'enableAjaxValidation'=>false,
)); ?>
<div class="box-body">
    <div class="col-md-12">
        <p class="note">Fields with <span class="required">*</span> are required.</p>
        <div class="form-group">
            <?php echo $form->labelEx($model,'password_old'); ?>
            <?php echo $form->passwordField($model,'password_old',array('maxlength'=>15,'class'=>'form-control','placeholder'=>'Password')); ?>    
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model,'password_new'); ?>
            <?php echo $form->passwordField($model,'password_new',array('maxlength'=>15,'class'=>'form-control','placeholder'=>'Password Baru')); ?>    
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model,'password_new_confirmation'); ?>
            <?php echo $form->passwordField($model,'password_new_confirmation',array('maxlength'=>15,'class'=>'form-control','placeholder'=>'Konfirmasi Password Baru')); ?>    
        </div>
    </div>
</div>
<div class="box-footer">
    <div class="form-group">
    <?php echo CHtml::submitButton('Save', array('class'=>'btn btn-primary')); ?>
    </div>
</div>

    
<?php $this->endWidget(); ?>
                
                
    </div>      
</section>
</div>