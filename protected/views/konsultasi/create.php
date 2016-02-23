<?php
/* @var $this KonsultasiController */
/* @var $model Konsultasi */

$this->breadcrumbs=array(
	'Konsultasis'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Konsultasi', 'url'=>array('index')),
	array('label'=>'Manage Konsultasi', 'url'=>array('admin')),
);
?>

<h1>Create Konsultasi</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>