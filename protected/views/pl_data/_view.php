<?php
/* @var $this Pl_dataController */
/* @var $data PlData */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kode')); ?>:</b>
	<?php echo CHtml::encode($data->kode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama')); ?>:</b>
	<?php echo CHtml::encode($data->nama); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jumlah_media')); ?>:</b>
	<?php echo CHtml::encode($data->jumlah_media); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('duplikat')); ?>:</b>
	<?php echo CHtml::encode($data->duplikat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('manual')); ?>:</b>
	<?php echo CHtml::encode($data->manual); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tgl_terima')); ?>:</b>
	<?php echo CHtml::encode($data->tgl_terima); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('sn')); ?>:</b>
	<?php echo CHtml::encode($data->sn); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('media_id')); ?>:</b>
	<?php echo CHtml::encode($data->media_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('license_id')); ?>:</b>
	<?php echo CHtml::encode($data->license_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jenis_id')); ?>:</b>
	<?php echo CHtml::encode($data->jenis_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('company_id')); ?>:</b>
	<?php echo CHtml::encode($data->company_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tgl_expired')); ?>:</b>
	<?php echo CHtml::encode($data->tgl_expired); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ket')); ?>:</b>
	<?php echo CHtml::encode($data->ket); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_time')); ?>:</b>
	<?php echo CHtml::encode($data->create_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('operator_id')); ?>:</b>
	<?php echo CHtml::encode($data->operator_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kontak_id')); ?>:</b>
	<?php echo CHtml::encode($data->kontak_id); ?>
	<br />

	*/ ?>

</div>