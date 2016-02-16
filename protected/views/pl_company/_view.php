<?php
/* @var $this Pl_companyController */
/* @var $data PlCompany */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_company')); ?>:</b>
	<?php echo CHtml::encode($data->nama_company); ?>
	<br />


</div>