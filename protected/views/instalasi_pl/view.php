<?php
/* @var $this Pl_instalansiController */
/* @var $model PlInstalasi */

$this->breadcrumbs=array(
	'Pl Instalasis'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List PlInstalasi', 'url'=>array('index')),
	array('label'=>'Create PlInstalasi', 'url'=>array('create')),
	array('label'=>'Update PlInstalasi', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete PlInstalasi', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PlInstalasi', 'url'=>array('admin')),
);
?>

<h1>View PlInstalasi #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'pl_data_id',
		'pegawai_id',
		'tgl_instalasi',
		'banyak_perangkat',
		'keterangan',
		'petugas_instalasi_id',
		'operator_id',
		'create_time',
	),
)); ?>
