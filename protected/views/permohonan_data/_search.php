<?php
/* @var $this Permohonan_dataController */
/* @var $model PermohonanData */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'no_surat'); ?>
		<?php echo $form->textField($model,'no_surat',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'jenis_identitas'); ?>
		<?php echo $form->textField($model,'jenis_identitas',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'no_identitas'); ?>
		<?php echo $form->textField($model,'no_identitas',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nama'); ?>
		<?php echo $form->textField($model,'nama',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'umur'); ?>
		<?php echo $form->textField($model,'umur'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'jk'); ?>
		<?php echo $form->textField($model,'jk',array('size'=>9,'maxlength'=>9)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pendidikan_terakhir'); ?>
		<?php echo $form->textField($model,'pendidikan_terakhir',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'alamat'); ?>
		<?php echo $form->textField($model,'alamat',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'telp'); ?>
		<?php echo $form->textField($model,'telp',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pekerjaan'); ?>
		<?php echo $form->textField($model,'pekerjaan',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nama_instansi'); ?>
		<?php echo $form->textField($model,'nama_instansi',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'kategori_instansi'); ?>
		<?php echo $form->textField($model,'kategori_instansi',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nama_kepala'); ?>
		<?php echo $form->textField($model,'nama_kepala',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'data_diminta'); ?>
		<?php echo $form->textArea($model,'data_diminta',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pnbp'); ?>
		<?php echo $form->textField($model,'pnbp'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'proses_data'); ?>
		<?php echo $form->textField($model,'proses_data'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'size'); ?>
		<?php echo $form->textField($model,'size'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status_id'); ?>
		<?php echo $form->textField($model,'status_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'operator_id'); ?>
		<?php echo $form->textField($model,'operator_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'create_time'); ?>
		<?php echo $form->textField($model,'create_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pegawai_id'); ?>
		<?php echo $form->textField($model,'pegawai_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'data_inventori_id'); ?>
		<?php echo $form->textField($model,'data_inventori_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'flag_user'); ?>
		<?php echo $form->textField($model,'flag_user'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->