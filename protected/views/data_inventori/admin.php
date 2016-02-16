<?php
/* @var $this Data_inventoriController */
/* @var $model DataInventori */

$this->breadcrumbs=array(
	'Data Inventoris'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List DataInventori', 'url'=>array('index')),
	array('label'=>'Create DataInventori', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#data-inventori-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Data Inventoris</h1>

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
	'id'=>'data-inventori-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'no_cd',
		'label_cd',
		'nama_data',
		'tahun',
		'rincian',
		/*
		'format',
		'jumlah_rec',
		'file_size',
		'file_size_unit',
		'keterangan',
		'nama_layout',
		'subjek_id',
		'create_time',
		'operator_id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
