<?php
/* @var $this Permohonan_dataController */
/* @var $model PermohonanData */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'permohonan-data-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'no_surat'); ?>
		<?php echo $form->textField($model,'no_surat',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'no_surat'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jenis_identitas'); ?>
		<?php echo $form->textField($model,'jenis_identitas',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'jenis_identitas'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'no_identitas'); ?>
		<?php echo $form->textField($model,'no_identitas',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'no_identitas'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nama'); ?>
		<?php echo $form->textField($model,'nama',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'nama'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'umur'); ?>
		<?php echo $form->textField($model,'umur'); ?>
		<?php echo $form->error($model,'umur'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jk'); ?>
		<?php echo $form->textField($model,'jk',array('size'=>9,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'jk'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pendidikan_terakhir'); ?>
		<?php echo $form->textField($model,'pendidikan_terakhir',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'pendidikan_terakhir'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alamat'); ?>
		<?php echo $form->textField($model,'alamat',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'alamat'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'telp'); ?>
		<?php echo $form->textField($model,'telp',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'telp'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pekerjaan'); ?>
		<?php echo $form->textField($model,'pekerjaan',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'pekerjaan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nama_instansi'); ?>
		<?php echo $form->textField($model,'nama_instansi',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'nama_instansi'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kategori_instansi'); ?>
		<?php echo $form->textField($model,'kategori_instansi',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'kategori_instansi'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nama_kepala'); ?>
		<?php echo $form->textField($model,'nama_kepala',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'nama_kepala'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'data_diminta'); ?>
		<?php echo $form->textArea($model,'data_diminta',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'data_diminta'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pnbp'); ?>
		<?php echo $form->textField($model,'pnbp'); ?>
		<?php echo $form->error($model,'pnbp'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'proses_data'); ?>
		<?php echo $form->textField($model,'proses_data'); ?>
		<?php echo $form->error($model,'proses_data'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'size'); ?>
		<?php echo $form->textField($model,'size'); ?>
		<?php echo $form->error($model,'size'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status_id'); ?>
		<?php echo $form->textField($model,'status_id'); ?>
		<?php echo $form->error($model,'status_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'operator_id'); ?>
		<?php echo $form->textField($model,'operator_id'); ?>
		<?php echo $form->error($model,'operator_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'create_time'); ?>
		<?php echo $form->textField($model,'create_time'); ?>
		<?php echo $form->error($model,'create_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pegawai_id'); ?>
		<?php echo $form->textField($model,'pegawai_id'); ?>
		<?php echo $form->error($model,'pegawai_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'data_inventori_id'); ?>
		<?php echo $form->textField($model,'data_inventori_id'); ?>
		<?php echo $form->error($model,'data_inventori_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'flag_user'); ?>
		<?php echo $form->textField($model,'flag_user'); ?>
		<?php echo $form->error($model,'flag_user'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->