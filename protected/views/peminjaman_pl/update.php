<?php
/* @var $this Peminjaman_plController */
/* @var $model PlTransaksi */

$this->breadcrumbs=array(
	'Pl Transaksis'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List PlTransaksi', 'url'=>array('index')),
	array('label'=>'Create PlTransaksi', 'url'=>array('create')),
	array('label'=>'View PlTransaksi', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage PlTransaksi', 'url'=>array('admin')),
);
?>

<h1>Update PlTransaksi <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>