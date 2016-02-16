<?php
/* @var $this Pl_dataController */
/* @var $model PlData */
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
		<?php echo $form->label($model,'kode'); ?>
		<?php echo $form->textField($model,'kode',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nama'); ?>
		<?php echo $form->textField($model,'nama',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'jumlah_media'); ?>
		<?php echo $form->textField($model,'jumlah_media'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'duplikat'); ?>
		<?php echo $form->textField($model,'duplikat'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'manual'); ?>
		<?php echo $form->textArea($model,'manual',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tgl_terima'); ?>
		<?php echo $form->textField($model,'tgl_terima'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sn'); ?>
		<?php echo $form->textArea($model,'sn',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'media_id'); ?>
		<?php echo $form->textField($model,'media_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'license_id'); ?>
		<?php echo $form->textField($model,'license_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'jenis_id'); ?>
		<?php echo $form->textField($model,'jenis_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'company_id'); ?>
		<?php echo $form->textField($model,'company_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tgl_expired'); ?>
		<?php echo $form->textField($model,'tgl_expired'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ket'); ?>
		<?php echo $form->textArea($model,'ket',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'create_time'); ?>
		<?php echo $form->textField($model,'create_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'operator_id'); ?>
		<?php echo $form->textField($model,'operator_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'kontak_id'); ?>
		<?php echo $form->textField($model,'kontak_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->