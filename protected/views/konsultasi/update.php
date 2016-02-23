<?php
/* @var $this KonsultasiController */
/* @var $model Konsultasi */

$this->breadcrumbs=array(
	'Konsultasis'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Konsultasi', 'url'=>array('index')),
	array('label'=>'Create Konsultasi', 'url'=>array('create')),
	array('label'=>'View Konsultasi', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Konsultasi', 'url'=>array('admin')),
);
?>

<h1>Update Konsultasi <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>