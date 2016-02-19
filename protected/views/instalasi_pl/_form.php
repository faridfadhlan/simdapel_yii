<div class="box-body">
        <?php echo CHtml::errorSummary($model,NULL, NULL,array('class'=>'alert alert-danger')); ?>
        </div>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'instalasi-pl-form',
	'enableAjaxValidation'=>false,
)); ?>
<div class="box-body">
    <div class="row">
        <div class="col-md-12">
    <div id="tabel-pinjam-pl">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama Perangkat Lunak</th>
                    <th>Kategori</th>
                    <th>Jumlah Media</th>
                    <th>Lisensi</th>
                </tr>
            </thead>
            <tbody>
                <?php if($pl_data === NULL):?>
                <tr><td colspan="5">Software belum dipilih. <?php echo CHtml::link('Pilih Software', array('pl_data/index'));?></td></tr>
                <?php else: ?>
                <tr>
                    <td>
                        <?php echo $pl_data->kode;?>
                        <?php echo $form->hiddenField($model,'pl_data_id');?>
                    </td>
                    <td><?php echo $pl_data->nama.'&nbsp;('.
                            (($model->isNewRecord)?
                            CHtml::link(
                                    'Ganti', 
                                    array(
                                        'pl_data/index',
                                    )):
                            CHtml::link(
                                    'Ganti', 
                                    array(
                                        'pl_data/index',
                                        'update_id'=>$model->id
                                    ))
                            ).
                            ' / '.CHtml::link('Hapus', array('pl_data/hapuspinjam')).')';?></td>
                    <td><?php echo $pl_data->jenis->nama_jenis;?></td>
                    <td><?php echo $pl_data->jumlah_media;?></td>
                    <td><?php echo $pl_data->license->nama_license;?></td>
                </tr>
                <?php endif;?>
                
            </tbody>
        </table>
    </div>
        </div></div>

        

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <?php echo $form->labelEx($model,'bidang_id'); ?>
                <?php echo $form->dropDownList(
                        $model,
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
                                //'update'=>'#'.CHTML::activeId($model,'seksi_id'),
                            ),
                    )); ?>    
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model,'seksi_id'); ?>
                <?php echo $form->dropDownList(
                        $model,
                        'seksi_id',
                        CHtml::listData(
                                Seksi::model()->findAll(
                                        'bidang_id=:bidang_id', 
                                        array(':bidang_id'=>$model->bidang_id)),
                                'id', 
                                'nama_seksi'),
                        array(
                            'class'=>'form-control',
                            'prompt'=>'Pilih Seksi...',
                            'ajax' => array(
                                'type'=>'POST',
                                'data'=>array('seksi_id'=>'js:this.value'),
                                'url'=>Yii::app()->createUrl('peminjaman_pl/getDropdownPeminjam'), //url to call.
                                //'success'=>'update_seksi_user',
                                'update'=>'#'.CHTML::activeId($model,'pegawai_id'),
                            ),
                        )); ?>    
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model,'pegawai_id'); ?>
                <?php echo $form->dropDownList(
                        $model,
                        'pegawai_id',
                        CHtml::listData(
                                User::model()->findAll(
                                        'seksi_id=:seksi_id', 
                                        array(':seksi_id'=>$model->seksi_id)),
                                'id', 
                                'nama'),
                        array('class'=>'form-control','prompt'=>'Pilih Nama...')); 
                ?>    
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model,'tgl_instalasi'); ?>
                <?php echo $form->textField($model,'tgl_instalasi',array('class'=>'form-control datepicker','placeholder'=>'Tanggal Instal')); ?>    
            </div>
            
        </div>
        <div class="col-md-6">            
            <div class="form-group">
                <?php echo $form->labelEx($model,'banyak_perangkat'); ?>
                <?php echo $form->textField($model,'banyak_perangkat',array('class'=>'form-control','placeholder'=>'Banyak Perangkat')); ?>    
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model,'petugas_instalasi_id'); ?>
                <?php echo $form->dropDownList($model,'petugas_instalasi_id',CHtml::listData(User::model()->findAll('seksi_id in (17,18,19)'),'id','nama'),array('class'=>'form-control','prompt'=>'Pilih Petugas Instalasi')); ?>    
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model,'keterangan'); ?>
                <?php echo $form->textArea($model,'keterangan',array('class'=>'form-control','placeholder'=>'Keterangan','rows'=>'4')); ?>    
            </div>
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
$cs->registerCssFile(Yii::app()->baseUrl."/public/plugins/datepicker/datepicker3.css");
$cs->registerScriptFile(Yii::app()->baseUrl."/public/plugins/datepicker/bootstrap-datepicker.js",CClientScript::POS_END);
$cs->registerScript("sukses","
    function update_seksi_user(data) {
        $('#".CHtml::activeId($model,'seksi_id')."').html(data);
        $('#".CHtml::activeId($model,'pegawai_id')."').html('<option>Pilih Nama...</option>');
    }
", CClientScript::POS_END);
$cs->registerScript("duplikasi","
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
    });
");
?>