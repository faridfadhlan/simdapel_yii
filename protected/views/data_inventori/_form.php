<div class="box-body">
<?php echo CHtml::errorSummary($model,NULL, NULL,array('class'=>'alert alert-danger')); ?>
</div>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'data-inventori-form',
	'enableAjaxValidation'=>false,
        'htmlOptions'=>array('enctype'=>'multipart/form-data')
)); ?>

<div class="box-body">
    <p class="note">Fields with <span class="required">*</span> are required.</p>
    <div class="col-md-6">
        <div class="form-group">
            <?php echo $form->labelEx($model,'subjek_id'); ?>
            <?php echo $form->dropDownList(
                    $model,
                    'subjek_id',
                    CHtml::listData($subjeks, 'id','nama_subjek'),
                    array(
                        'class'=>'form-control',
                        'prompt'=>'Pilih Subjek...',
                        'ajax' => array(
                                'type'=>'POST',
                                'data'=>array('subjek_id'=>'js:this.value'),
                                'url'=>Yii::app()->createUrl('data_inventori/getnocd'), //url to call.
                                'success'=>'update_no_cd',
                                //'update'=>'#'.CHTML::activeId($model,'seksi_id'),
                            ),
                    )); ?>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model,'no_cd'); ?>
            <?php echo $form->textField($model,'no_cd',array('class'=>'form-control no_cd','disabled'=>'disabled')); ?>    
            <?php //echo $form->hiddenField($model,'no_cd'); ?>    
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model,'label_cd'); ?>
            <?php echo $form->textField($model,'label_cd',array('maxlength'=>255,'class'=>'form-control','placeholder'=>'Label CD')); ?>    
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model,'nama_data'); ?>
            <?php echo $form->textField($model,'nama_data',array('maxlength'=>255,'class'=>'form-control','placeholder'=>'Nama Data')); ?>    
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model,'tahun'); ?>
            <?php echo $form->textField($model,'tahun',array('maxlength'=>4,'class'=>'form-control','placeholder'=>'Tahun')); ?>    
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model,'rincian'); ?>
            <?php echo $form->textField($model,'rincian',array('maxlength'=>255,'class'=>'form-control','placeholder'=>'Rincian')); ?>    
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model,'format'); ?>
            <?php echo $form->textField($model,'format',array('maxlength'=>255,'class'=>'form-control','placeholder'=>'Format')); ?>    
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <?php echo $form->labelEx($model,'jumlah_rec'); ?>
            <?php echo $form->textField($model,'jumlah_rec',array('class'=>'form-control','placeholder'=>'Jumlah Record')); ?>    
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model,'file_size'); ?>
            <?php echo $form->textField($model,'file_size',array('class'=>'form-control','placeholder'=>'Ukuran File')); ?>    
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model,'file_size_unit'); ?>
            <?php echo $form->dropDownList($model,'file_size_unit',array('1'=>'KB', '2'=>'MB', '3'=>'GB'),array('class'=>'form-control','prompt'=>'Pilih Satuan Ukuran File...')); ?>    
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model,'keterangan'); ?>
            <?php echo $form->textArea($model,'keterangan',array('class'=>'form-control','placeholder'=>'Keterangan...','rows'=>'8')); ?>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model,'layout_file'); ?>
            <?php echo $form->fileField($model,'layout_file',array('class'=>'form-control')); ?>  
            <?php echo CHtml::link($model->nama_layout,Yii::app()->baseUrl.'/storage/layouts/'.$model->nama_layout); ?>
        </div>
    </div>
</div>
<div class="box-footer">
    <div class="form-group">
<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'btn btn-primary')); ?>
        </div>
</div>
    
<?php $this->endWidget(); ?>

<?php
$cs = Yii::app()->clientScript;
$cs->scriptMap=array('jquery.js'=>false);
$cs->registerScript("sukses","
    function update_no_cd(data) {
        $('#".CHtml::activeId($model,'no_cd')."').val(data);
    }
", CClientScript::POS_END);
?>