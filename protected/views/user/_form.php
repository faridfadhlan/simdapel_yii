<div class="box-body">
<?php echo CHtml::errorSummary($model,NULL, NULL,array('class'=>'alert alert-danger')); ?>
</div>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>

<div class="box-body">
    <p class="note">Fields with <span class="required">*</span> are required.</p>
    <div class="col-md-6">
        <div class="form-group">
            <?php echo $form->labelEx($model,'nip'); ?>
            <?php echo $form->textField($model,'nip',array('maxlength'=>18,'class'=>'form-control','placeholder'=>'NIP')); ?>    
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model,'nama'); ?>
            <?php echo $form->textField($model,'nama',array('maxlength'=>50,'class'=>'form-control','placeholder'=>'Nama Lengkap')); ?>    
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model,'username'); ?>
            <?php echo $form->textField($model,'username',array('maxlength'=>25,'class'=>'form-control','placeholder'=>'Username')); ?>    
        </div>
        <?php if(Yii::app()->controller->action->id == 'create'): ?>
        <div class="form-group">
            <?php echo $form->labelEx($model,'password'); ?>
            <?php echo $form->passwordField($model,'password',array('maxlength'=>25,'class'=>'form-control','placeholder'=>'Username')); ?>    
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model,'password_confirmation'); ?>
            <?php echo $form->passwordField($model,'password_confirmation',array('maxlength'=>25,'class'=>'form-control','placeholder'=>'Konfirmasi Password')); ?>    
        </div>
        <?php endif;?>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <?php echo $form->labelEx($model,'email'); ?>
            <?php echo $form->textField($model,'email',array('maxlength'=>18,'class'=>'form-control','placeholder'=>'Email')); ?>    
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model,'bidang_id'); ?>
            <?php echo $form->dropDownList($model,'bidang_id',CHtml::listData($bidangs, 'id', 'nama_bidang'),array('class'=>'form-control','prompt'=>'Pilih Bidang...')); ?>    
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model,'seksi_id'); ?>
            <?php echo $form->dropDownList($model,'seksi_id',CHtml::listData($seksis, 'id', 'nama_seksi'),array('class'=>'form-control','prompt'=>'Pilih Seksi...')); ?>    
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model,'role_id'); ?>
            <?php echo $form->dropDownList($model,'role_id',CHtml::listData($roles, 'id', 'description'),array('class'=>'form-control','prompt'=>'Pilih Role...')); ?>    
        </div>
    </div>
</div>
<div class="box-footer">
    <div class="form-group">
<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'btn btn-primary')); ?>
        </div>
</div>
    
<?php $this->endWidget(); ?>