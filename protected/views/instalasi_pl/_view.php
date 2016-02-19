<?php
/* @var $this Pl_instalansiController */
/* @var $data PlInstalasi */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pl_data_id')); ?>:</b>
	<?php echo CHtml::encode($data->pl_data_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pegawai_id')); ?>:</b>
	<?php echo CHtml::encode($data->pegawai_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tgl_instalasi')); ?>:</b>
	<?php echo CHtml::encode($data->tgl_instalasi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('banyak_perangkat')); ?>:</b>
	<?php echo CHtml::encode($data->banyak_perangkat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('keterangan')); ?>:</b>
	<?php echo CHtml::encode($data->keterangan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('petugas_instalasi_id')); ?>:</b>
	<?php echo CHtml::encode($data->petugas_instalasi_id); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('operator_id')); ?>:</b>
	<?php echo CHtml::encode($data->operator_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_time')); ?>:</b>
	<?php echo CHtml::encode($data->create_time); ?>
	<br />

	*/ ?>

</div>