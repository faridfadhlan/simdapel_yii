<div class="content-wrapper">
<?php

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#pl-data-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<section class="content">
    <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Tambah Data Perangkat Lunak</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
<h1>Manage Pl Datas</h1>

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
	'id'=>'pl-data-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'kode',
		'nama',
		'jumlah_media',
		'duplikat',
		'manual',
		/*
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
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
                </div>
    </div>
</section>
</div>