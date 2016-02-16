<?php
/* @var $this Pl_licenseController */
/* @var $model PlLicense */

$this->breadcrumbs=array(
	'Pl Licenses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List PlLicense', 'url'=>array('index')),
	array('label'=>'Create PlLicense', 'url'=>array('create')),
	array('label'=>'Update PlLicense', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete PlLicense', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PlLicense', 'url'=>array('admin')),
);
?>

<h1>View PlLicense #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nama_license',
	),
)); ?>
