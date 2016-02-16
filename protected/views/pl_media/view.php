<?php
/* @var $this Pl_mediaController */
/* @var $model PlMedia */

$this->breadcrumbs=array(
	'Pl Medias'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List PlMedia', 'url'=>array('index')),
	array('label'=>'Create PlMedia', 'url'=>array('create')),
	array('label'=>'Update PlMedia', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete PlMedia', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PlMedia', 'url'=>array('admin')),
);
?>

<h1>View PlMedia #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nama_media',
	),
)); ?>
