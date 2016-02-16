<?php
/* @var $this Pl_dataController */
/* @var $model PlData */

$this->breadcrumbs=array(
	'Pl Datas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List PlData', 'url'=>array('index')),
	array('label'=>'Create PlData', 'url'=>array('create')),
	array('label'=>'Update PlData', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete PlData', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PlData', 'url'=>array('admin')),
);
?>

<h1>View PlData #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'kode',
		'nama',
		'jumlah_media',
		'duplikat',
		'manual',
		'tgl_terima',
		'sn',
		'media_id',
		'license_id',
		'jenis_id',
		'company_id',
		'tgl_expired',
		'ket',
		'create_time',
		'operator_id',
		'kontak_id',
	),
)); ?>
