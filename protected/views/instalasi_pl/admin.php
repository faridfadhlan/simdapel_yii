<?php
/* @var $this Pl_instalansiController */
/* @var $model PlInstalasi */

$this->breadcrumbs=array(
	'Pl Instalasis'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List PlInstalasi', 'url'=>array('index')),
	array('label'=>'Create PlInstalasi', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#pl-instalasi-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Pl Instalasis</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pl-instalasi-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'pl_data_id',
		'pegawai_id',
		'tgl_instalasi',
		'banyak_perangkat',
		'keterangan',
		/*
		'petugas_instalasi_id',
		'operator_id',
		'create_time',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
