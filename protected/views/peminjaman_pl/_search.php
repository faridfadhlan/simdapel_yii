<?php
/* @var $this Peminjaman_plController */
/* @var $model PlTransaksi */
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
		<?php echo $form->label($model,'tgl_pinjam'); ?>
		<?php echo $form->textField($model,'tgl_pinjam'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tgl_targetkembali'); ?>
		<?php echo $form->textField($model,'tgl_targetkembali'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tgl_kembali'); ?>
		<?php echo $form->textField($model,'tgl_kembali'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'operator_id'); ?>
		<?php echo $form->textField($model,'operator_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'keterangan'); ?>
		<?php echo $form->textArea($model,'keterangan',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pl_data_id'); ?>
		<?php echo $form->textField($model,'pl_data_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'create_time'); ?>
		<?php echo $form->textField($model,'create_time'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->