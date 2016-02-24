<div class="box-body">
<?php echo CHtml::errorSummary($model,NULL, NULL,array('class'=>'alert alert-danger')); ?>
</div>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'konsultasi-form',
	'enableAjaxValidation'=>false,
)); ?>
<div class="box-body">
    <div class="col-md-12">
        <p class="note">Fields with <span class="required">*</span> are required.</p>
        <div class="form-group">
            <?php echo $form->labelEx($model,'judul'); ?>
            <?php echo $form->textField($model,'judul',array('class'=>'form-control','placeholder'=>'Judul')); ?>    
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model,'isi'); ?>
            <?php echo $form->textArea($model,'isi',array('class'=>'form-control','placeholder'=>'Isi', 'rows'=>'8')); ?>    
        </div>
    </div>
</div>
<div class="box-footer">
    <div class="form-group">
    <?php echo CHtml::submitButton('Kirim', array('class'=>'btn btn-primary')); ?>
    </div>
</div>

    
<?php $this->endWidget(); ?>