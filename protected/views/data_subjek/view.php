<?php
/* @var $this Data_subjekController */
/* @var $model DataSubjek */

$this->breadcrumbs=array(
	'Data Subjeks'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List DataSubjek', 'url'=>array('index')),
	array('label'=>'Create DataSubjek', 'url'=>array('create')),
	array('label'=>'Update DataSubjek', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete DataSubjek', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DataSubjek', 'url'=>array('admin')),
);
?>

<h1>View DataSubjek #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'kode',
		'nama_subjek',
	),
)); ?>
