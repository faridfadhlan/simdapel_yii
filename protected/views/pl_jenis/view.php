<?php
/* @var $this Pl_jenisController */
/* @var $model PlJenis */

$this->breadcrumbs=array(
	'Pl Jenises'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List PlJenis', 'url'=>array('index')),
	array('label'=>'Create PlJenis', 'url'=>array('create')),
	array('label'=>'Update PlJenis', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete PlJenis', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PlJenis', 'url'=>array('admin')),
);
?>

<h1>View PlJenis #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'kode',
		'nama_jenis',
	),
)); ?>
