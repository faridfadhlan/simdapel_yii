<?php
/* @var $this Pl_mediaController */
/* @var $data PlMedia */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_media')); ?>:</b>
	<?php echo CHtml::encode($data->nama_media); ?>
	<br />


</div>