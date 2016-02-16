<div class="box-body">
<?php echo CHtml::errorSummary($model,NULL, NULL,array('class'=>'alert alert-danger')); ?>
</div>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'data-subjek-form',
	'enableAjaxValidation'=>false,
)); ?>
<div class="box-body">
    <div class="col-md-12">
        <p class="note">Fields with <span class="required">*</span> are required.</p>
        <div class="form-group">
            <?php echo $form->labelEx($model,'kode'); ?>
            <?php echo $form->textField($model,'kode',array('maxlength'=>2,'class'=>'form-control','placeholder'=>'Kode Subjek')); ?>    
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model,'nama_subjek'); ?>
            <?php echo $form->textField($model,'nama_subjek',array('maxlength'=>255,'class'=>'form-control','placeholder'=>'Nama Subjek')); ?>    
        </div>
    </div>
</div>
<div class="box-footer">
    <div class="form-group">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'btn btn-primary')); ?>
    </div>
</div>

    
<?php $this->endWidget(); ?>