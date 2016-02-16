<?php
/* @var $this Pl_licenseController */
/* @var $data PlLicense */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_license')); ?>:</b>
	<?php echo CHtml::encode($data->nama_license); ?>
	<br />


</div>