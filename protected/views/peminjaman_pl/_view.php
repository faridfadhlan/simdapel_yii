<?php
/* @var $this Peminjaman_plController */
/* @var $data PlTransaksi */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tgl_pinjam')); ?>:</b>
	<?php echo CHtml::encode($data->tgl_pinjam); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tgl_targetkembali')); ?>:</b>
	<?php echo CHtml::encode($data->tgl_targetkembali); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tgl_kembali')); ?>:</b>
	<?php echo CHtml::encode($data->tgl_kembali); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('operator_id')); ?>:</b>
	<?php echo CHtml::encode($data->operator_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('keterangan')); ?>:</b>
	<?php echo CHtml::encode($data->keterangan); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('pl_data_id')); ?>:</b>
	<?php echo CHtml::encode($data->pl_data_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_time')); ?>:</b>
	<?php echo CHtml::encode($data->create_time); ?>
	<br />

	*/ ?>

</div>