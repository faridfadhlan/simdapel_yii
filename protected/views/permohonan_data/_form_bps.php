<div class="box-body">
<?php echo CHtml::errorSummary($model_bps,NULL, NULL,array('class'=>'alert alert-danger')); ?>
</div>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'permohonan-data-bps-form',
	'enableAjaxValidation'=>false,
)); ?>
<div class="box-body">
        <div class="row">
            <div class="col-md-12">
                <table id="tes" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Data</th>
                            <th>Rincian Data</th>
                            <th>Tahun</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php 
                            if(!isset($data_inventori)) :
                            echo '<td colspan="5">Data pinjaman belum dipilih. ('.
                                CHtml::link('Pilih Data', array('data_inventori/index')).
                                ')</td>';
                            else:
                                echo '<td>'.$data_inventori->id.$form->hiddenField($model_bps,'data_inventori_id').'</td>';
                                echo '<td>'.$data_inventori->nama_data.' ('.CHtml::link('Ganti', array('data_inventori/index')).'/'.CHtml::link('Hapus', array('data_inventori/hapuspinjam')).')</td>';
                                echo '<td>'.$data_inventori->rincian.'</td>';
                                echo '<td>'.$data_inventori->tahun.'</td>';
                            endif;?>
                        </tr>   
                    </tbody>
                </table>
            </div>
        </div>

     <div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <?php echo $form->labelEx($model_bps,'no_surat'); ?>
            <?php echo $form->textField($model_bps,'no_surat',array('class'=>'form-control','placeholder'=>$model_bps->getAttributeLabel('no_surat'))); ?>    
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model_bps,'bidang_id'); ?>
            <?php echo $form->dropDownList(
                    $model_bps,
                    'bidang_id',
                    CHtml::listData($bidangs, 'id', 'nama_bidang'),
                    array(
                        'class'=>'form-control',
                        'prompt'=>'Pilih Bidang...',
                        'ajax' => array(
                            'type'=>'POST',
                            'data'=>array('bidang_id'=>'js:this.value'),
                            'url'=>Yii::app()->createUrl('peminjaman_pl/getDropdownSeksi'), //url to call.
                            'success'=>'update_seksi_user',
                        ),
                )); ?>    
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model_bps,'seksi_id'); ?>
            <?php echo $form->dropDownList(
                    $model_bps,
                    'seksi_id',
                    CHtml::listData(Seksi::model()->findAll('bidang_id=:bidang_id', array(':bidang_id'=>$model_bps->bidang_id)),'id', 'nama_seksi'),
                    array(
                        'class'=>'form-control',
                        'prompt'=>'Pilih Seksi...',
                        'ajax' => array(
                            'type'=>'POST',
                            'data'=>array('seksi_id'=>'js:this.value'),
                            'url'=>Yii::app()->createUrl('peminjaman_pl/getDropdownPeminjam'), //url to call.
                            'update'=>'#'.CHTML::activeId($model_bps,'user_id'),
                        ),
                    )); ?>    
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model_bps,'user_id'); ?>
            <?php echo $form->dropDownList(
                    $model_bps,
                    'user_id',
                    CHtml::listData(User::model()->findAll('seksi_id=:seksi_id', array(':seksi_id'=>$model_bps->seksi_id)),'id', 'nama'),
                    array('class'=>'form-control','prompt'=>'Pilih Nama Peminjam...')); ?>    
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="form-group">
            <?php echo $form->labelEx($model_bps,'data_diminta'); ?>
            <?php echo $form->textArea($model_bps,'data_diminta',array('class'=>'form-control','placeholder'=>$model_bps->getAttributeLabel('data_diminta'),'rows'=>'8')); ?>    
        </div>
    </div>
     </div>
    <div class="box-footer">
<button type="submit" class="btn btn-primary">Simpan</button>
</div>
</div>

<?php $this->endWidget();?>
<?php
$cs = Yii::app()->clientScript;
$cs->scriptMap=array('jquery.js'=>false);
$cs->registerScript("sukses","
    function update_seksi_user(data) {
        $('#".CHtml::activeId($model_bps,'seksi_id')."').html(data);
        $('#".CHtml::activeId($model_bps,'user_id')."').html('<option>Pilih Nama Peminjam...</option>');
    }
", CClientScript::POS_END);

?>