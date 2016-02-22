<div class="box-body">
<?php echo CHtml::errorSummary($model,NULL, NULL,array('class'=>'alert alert-danger')); ?>
</div>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pl-data-form',
	'enableAjaxValidation'=>false,
        'htmlOptions'=>array('enctype'=>'multipart/form-data')
)); ?>
<div class="box-body">
    <p class="note">Fields with <span class="required">*</span> are required.</p>
    <div class="col-md-6">
        <div class="form-group">
            <?php echo $form->labelEx($model,'jenis_id'); ?>
            <?php echo $form->dropDownList(
                    $model,
                    'jenis_id',
                    CHtml::listData($jenises, 'id','nama_jenis'),
                    array(
                        'class'=>'form-control',
                        'prompt'=>'Pilih Jenis...',
                        'ajax' => array(
                                'type'=>'POST',
                                'data'=>array('jenis_id'=>'js:this.value'),
                                'url'=>Yii::app()->createUrl('pl_data/getkode'), //url to call.
                                'success'=>'update_kode',
                                //'update'=>'#'.CHTML::activeId($model,'seksi_id'),
                            ),
                    )); ?>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model,'kode'); ?>
            <?php echo $form->textField($model,'kode',array('class'=>'form-control','disabled'=>'disabled')); ?>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model,'nama'); ?>
            <?php echo $form->textField($model,'nama',array('maxlength'=>255,'class'=>'form-control','placeholder'=>'Nama')); ?>    
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model,'duplikat'); ?>
            <?php echo $form->textField($model,'duplikat',array('maxlength'=>255,'class'=>'form-control','placeholder'=>'Jumlah Duplikat')); ?>     
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model,'jumlah_media'); ?>
            <?php echo $form->textField($model,'jumlah_media',array('class'=>'form-control','placeholder'=>'Jumlah Media')); ?>    
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model,'manual_file'); ?>
            <?php echo $form->fileField($model,'manual_file',array('class'=>'form-control')); ?>  
            <?php echo $model->manual; ?>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model,'tgl_terima'); ?>
            <?php echo $form->textField($model,'tgl_terima',array('class'=>'form-control datepicker','placeholder'=>'Tanggal Terima')); ?>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model,'media_id'); ?>
            <?php echo $form->dropDownList($model,'media_id',CHtml::listData($medias, 'id','nama_media'),array('class'=>'form-control','prompt'=>'Pilih Media...')); ?>    
        </div>
        
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <?php echo $form->labelEx($model,'license_id'); ?>
            <?php echo $form->dropDownList($model,'license_id',CHtml::listData($licenses, 'id','nama_license'),array('class'=>'form-control','prompt'=>'Pilih Lisensi...')); ?>    
        </div>
        
        <div class="form-group">
            <?php echo $form->labelEx($model,'company_id'); ?>
            <?php echo $form->dropDownList($model,'company_id',CHtml::listData($companies, 'id','nama_company'),array('class'=>'form-control','prompt'=>'Pilih Company...')); ?>    
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model,'tgl_expired'); ?>
            <?php echo $form->textField($model,'tgl_expired',array('class'=>'form-control datepicker','placeholder'=>'Tanggal Expired')); ?>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model,'ket'); ?>
            <?php echo $form->textArea($model,'ket',array('class'=>'form-control','placeholder'=>'Keterangan...','rows'=>'8')); ?>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model,'kontak_id'); ?>
            <?php echo $form->dropDownList($model,'kontak_id',CHtml::listData($kontaks,'id','nama'),array('class'=>'form-control','prompt'=>'Pilih Kontak...')); ?>
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
$cs=Yii::app()->getClientScript();
$cs->scriptMap=array('jquery.js'=>false);
$cs->registerCssFile(Yii::app()->request->baseUrl.'/public/plugins/datepicker/datepicker3.css');
$cs->registerScriptFile(Yii::app()->request->baseUrl.'/public/plugins/datepicker/bootstrap-datepicker.js',CClientScript::POS_END);
$cs->registerScript("datepicker", '
    $(".datepicker").datepicker({
            format: "yyyy-mm-dd",
        });
');
$cs->registerScript("sukses","
    function update_kode(data) {
        $('#".CHtml::activeId($model,'kode')."').val(data);
    }
", CClientScript::POS_END);
?>