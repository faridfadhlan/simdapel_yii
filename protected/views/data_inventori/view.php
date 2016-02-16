<?php
/* @var $this Data_inventoriController */
/* @var $model DataInventori */

$this->breadcrumbs=array(
	'Data Inventoris'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List DataInventori', 'url'=>array('index')),
	array('label'=>'Create DataInventori', 'url'=>array('create')),
	array('label'=>'Update DataInventori', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete DataInventori', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DataInventori', 'url'=>array('admin')),
);
?>

<h1>View DataInventori #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'no_cd',
		'label_cd',
		'nama_data',
		'tahun',
		'rincian',
		'format',
		'jumlah_rec',
		'file_size',
		'file_size_unit',
		'keterangan',
		'nama_layout',
		'subjek_id',
		'create_time',
		'operator_id',
	),
)); ?>
