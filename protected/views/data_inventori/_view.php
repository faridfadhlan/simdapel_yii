<?php
/* @var $this Data_inventoriController */
/* @var $data DataInventori */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_cd')); ?>:</b>
	<?php echo CHtml::encode($data->no_cd); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('label_cd')); ?>:</b>
	<?php echo CHtml::encode($data->label_cd); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_data')); ?>:</b>
	<?php echo CHtml::encode($data->nama_data); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tahun')); ?>:</b>
	<?php echo CHtml::encode($data->tahun); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rincian')); ?>:</b>
	<?php echo CHtml::encode($data->rincian); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('format')); ?>:</b>
	<?php echo CHtml::encode($data->format); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('jumlah_rec')); ?>:</b>
	<?php echo CHtml::encode($data->jumlah_rec); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('file_size')); ?>:</b>
	<?php echo CHtml::encode($data->file_size); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('file_size_unit')); ?>:</b>
	<?php echo CHtml::encode($data->file_size_unit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('keterangan')); ?>:</b>
	<?php echo CHtml::encode($data->keterangan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_layout')); ?>:</b>
	<?php echo CHtml::encode($data->nama_layout); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('subjek_id')); ?>:</b>
	<?php echo CHtml::encode($data->subjek_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_time')); ?>:</b>
	<?php echo CHtml::encode($data->create_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('operator_id')); ?>:</b>
	<?php echo CHtml::encode($data->operator_id); ?>
	<br />

	*/ ?>

</div>