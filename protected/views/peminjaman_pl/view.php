<?php
/* @var $this Peminjaman_plController */
/* @var $model PlTransaksi */

$this->breadcrumbs=array(
	'Pl Transaksis'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List PlTransaksi', 'url'=>array('index')),
	array('label'=>'Create PlTransaksi', 'url'=>array('create')),
	array('label'=>'Update PlTransaksi', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete PlTransaksi', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PlTransaksi', 'url'=>array('admin')),
);
?>

<h1>View PlTransaksi #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'tgl_pinjam',
		'tgl_targetkembali',
		'tgl_kembali',
		'user_id',
		'operator_id',
		'keterangan',
		'pl_data_id',
		'create_time',
	),
)); ?>
