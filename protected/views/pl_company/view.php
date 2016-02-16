<?php
/* @var $this Pl_companyController */
/* @var $model PlCompany */

$this->breadcrumbs=array(
	'Pl Companies'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List PlCompany', 'url'=>array('index')),
	array('label'=>'Create PlCompany', 'url'=>array('create')),
	array('label'=>'Update PlCompany', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete PlCompany', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PlCompany', 'url'=>array('admin')),
);
?>

<h1>View PlCompany #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nama_company',
	),
)); ?>
