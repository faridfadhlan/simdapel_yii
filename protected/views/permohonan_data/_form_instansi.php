<div class="box-body">
<?php echo CHtml::errorSummary($model_instansi,NULL, NULL,array('class'=>'alert alert-danger')); ?>
</div>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'permohonan-data-instansi-form',
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
                                echo '<td>'.$data_inventori->id.$form->hiddenField($model_instansi,'data_inventori_id').'</td>';
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
            <?php echo $form->labelEx($model_instansi,'no_surat'); ?>
            <?php echo $form->textField($model_instansi,'no_surat',array('class'=>'form-control','placeholder'=>$model_instansi->getAttributeLabel('no_surat'))); ?>    
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model_instansi,'nama_instansi'); ?>
            <?php echo $form->textField($model_instansi,'nama_instansi',array('class'=>'form-control','placeholder'=>$model_instansi->getAttributeLabel('nama_instansi'))); ?>    
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model_instansi,'kategori_instansi'); ?>
            <?php echo $form->dropDownList(
                    $model_instansi,
                    'kategori_instansi',
                    array(
                        '1'=>'Lembaga Pendidikan dan Penelitian',
                        '2'=>'Kementerian dan Lembaga Pemerintah',
                        '3'=>'Lembaga Internasional',
                        '4'=>'Media Massa',
                        '5'=>'Pemerintah Daerah',
                        '6'=>'Perbankan',
                        '7'=>'Swasta',
                        '8'=>'Lainnya'),
                    array(
                        'class'=>'form-control',
                        'prompt'=>'Pilih Kategori Instansi...'
                    )); 
            ?>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model_instansi,'alamat'); ?>
            <?php echo $form->textField($model_instansi,'alamat',array('class'=>'form-control','placeholder'=>$model_instansi->getAttributeLabel('alamat'))); ?>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model_instansi,'telp'); ?>
            <?php echo $form->textField($model_instansi,'telp',array('class'=>'form-control','placeholder'=>$model_instansi->getAttributeLabel('telp'))); ?>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model_instansi,'nama_kepala'); ?>
            <?php echo $form->textField($model_instansi,'nama_kepala',array('class'=>'form-control','placeholder'=>$model_instansi->getAttributeLabel('nama_kepala'))); ?>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="form-group">
            <?php echo $form->labelEx($model_instansi,'data_diminta'); ?>
            <?php echo $form->textArea($model_instansi,'data_diminta',array('class'=>'form-control','placeholder'=>$model_instansi->getAttributeLabel('data_diminta'),'rows'=>'8')); ?>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model_instansi,'pnbp'); ?>
            <?php echo $form->dropDownList($model_instansi,'pnbp',array('1'=>'PNBP', '2'=>'Non PNBP'),array('class'=>'form-control','prompt'=>'Pilih Pembayaran...','onchange'=>'pilih_pnbp2(this.value)')); ?>    
        </div>
        <div class="form-group pnbp2">
            <?php echo $form->labelEx($model_instansi,'proses_data'); ?>
            <?php echo $form->dropDownList($model_instansi,'proses_data',array('1'=>'Dengan Proses Data', '2'=>'Tanpa Proses Data'),array('class'=>'form-control')); ?>    
        </div>
        <div class="form-group pnbp2">
            <?php echo $form->labelEx($model_instansi,'size'); ?>
            <?php echo $form->textField($model_instansi,'size',array('class'=>'form-control','placeholder'=>$model_instansi->getAttributeLabel('size'))); ?>    
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
$cs->registerScript("pnbp2","
    function pilih_pnbp2(data) {
        if(data=='1') $('.pnbp2').show();
        else $('.pnbp2').hide();
    }
", CClientScript::POS_END);

$show = $model_instansi->pnbp=='1'?'true':'false';
$cs->registerScript("sds2","
    $('.pnbp2').toggle(".$show.");
");

?>