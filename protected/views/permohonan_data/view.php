<?php
/* @var $this Permohonan_dataController */
/* @var $model PermohonanData */

$this->breadcrumbs=array(
	'Permohonan Datas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List PermohonanData', 'url'=>array('index')),
	array('label'=>'Create PermohonanData', 'url'=>array('create')),
	array('label'=>'Update PermohonanData', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete PermohonanData', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PermohonanData', 'url'=>array('admin')),
);
?>

<h1>View PermohonanData #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'no_surat',
		'jenis_identitas',
		'no_identitas',
		'nama',
		'umur',
		'jk',
		'pendidikan_terakhir',
		'alamat',
		'telp',
		'pekerjaan',
		'nama_instansi',
		'kategori_instansi',
		'nama_kepala',
		'email',
		'data_diminta',
		'pnbp',
		'proses_data',
		'size',
		'status_id',
		'operator_id',
		'create_time',
		'pegawai_id',
		'data_inventori_id',
		'flag_user',
	),
)); ?>
