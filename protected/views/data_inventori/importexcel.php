<div class="content-wrapper">
          <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Import Data Inventori
            <!--<small>Control panel</small>-->
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>Master Data Inventori</li>
            <li class="active">Import Data Inventori</li>
          </ol>
        </section>


<section class="content">
    <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Import Data Inventori</h3>
                </div><!-- /.box-header -->
                
                 
                    
                        
                <!-- form start -->
                
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
	'id'=>'import-data-inventori-form',
	'enableAjaxValidation'=>false,
        'htmlOptions'=>array('enctype'=>'multipart/form-data')
)); ?>
<div class="box-body">
    <p class="note">Fields with <span class="required">*</span> are required.</p>
    <div class="col-md-12">
        <div class="form-group">
            <?php echo $form->labelEx($model,'file_excel'); ?>
            <?php echo $form->fileField($model,'file_excel',array('class'=>'form-control')); ?>
        </div>
    </div>
</div>
<div class="box-footer">
    <div class="form-group">
<?php echo CHtml::submitButton('Import', array('class'=>'btn btn-primary')).'&nbsp;'.CHtml::link('Download Template', Yii::app()->baseUrl.'/storage/template_data_inventori.xls', array('class'=>'btn btn-primary')); ?>
        </div>
</div>
        
                
<?php $this->endWidget(); ?>
    </div>      
</section>
</div>