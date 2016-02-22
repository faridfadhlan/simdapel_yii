<div class="box-body">
<?php echo CHtml::errorSummary($model_lainnya,NULL, NULL,array('class'=>'alert alert-danger')); ?>
</div>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'permohonan-data-lainnya-form',
	'enableAjaxValidation'=>false,
)); ?>
<div class="box-body">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <?php echo $form->labelEx($model_lainnya,'jenis_data'); ?>
                <?php echo $form->dropDownList($model_lainnya,'jenis_data',array('1'=>'Buku Publikasi', '2'=>'Lainnya'),array('class'=>'form-control','prompt'=>'Pilih Jenis Data...')); ?>    
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model_lainnya,'data_diminta'); ?>
                <?php echo $form->textArea($model_lainnya,'data_diminta',array('class'=>'form-control','placeholder'=>$model_lainnya->getAttributeLabel('data_diminta'),'rows'=>'6')); ?>    
            </div>
        </div>
    </div>
    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Kirim</button>
    </div>
</div>

<?php $this->endWidget();?>