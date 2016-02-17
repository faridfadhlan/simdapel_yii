<div class="box-body">
<?php echo CHtml::errorSummary($model_individu,NULL, NULL,array('class'=>'alert alert-danger')); ?>
</div>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'permohonan-data-individu-form',
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
                                echo '<td>'.$data_inventori->id.'</td>';
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
            <?php echo $form->labelEx($model_individu,'jenis_identitas'); ?>
            <?php echo $form->dropDownList($model_individu,'jenis_identitas',array('1'=>'KTP','2'=>'SIM','3'=>'Lainnya'),array('class'=>'form-control','prompt'=>'Pilih Jenis Identitas...')); ?>    
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model_individu,'no_identitas'); ?>
            <?php echo $form->textField($model_individu,'no_identitas',array('class'=>'form-control','placeholder'=>$model_individu->getAttributeLabel('no_identitas'))); ?>    
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model_individu,'nama'); ?>
            <?php echo $form->textField($model_individu,'nama',array('class'=>'form-control','placeholder'=>$model_individu->getAttributeLabel('nama'))); ?>    
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model_individu,'umur'); ?>
            <?php echo $form->textField($model_individu,'umur',array('class'=>'form-control','placeholder'=>$model_individu->getAttributeLabel('umur'))); ?>    
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model_individu,'jk'); ?>
            <?php echo $form->dropDownList($model_individu,'jk',array('1'=>'Laki-Laki', '2'=>'Perempuan'),array('class'=>'form-control','prompt'=>'Pilih Jenis Kelamin...')); ?>    
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model_individu,'pendidikan_terakhir'); ?>
            <?php echo $form->dropDownList($model_individu,'pendidikan_terakhir',array('1'=>'SMA', '2'=>'D1/D2/D3', '3'=>'S1/D4', '4'=>'S2', '5'=>'S3'),array('class'=>'form-control','prompt'=>'Pilih Pendidikan Terakhir...')); ?>    
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model_individu,'alamat'); ?>
            <?php echo $form->textField($model_individu,'alamat',array('class'=>'form-control','placeholder'=>$model_individu->getAttributeLabel('alamat'))); ?>    
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model_individu,'telp'); ?>
            <?php echo $form->textField($model_individu,'telp',array('class'=>'form-control','placeholder'=>$model_individu->getAttributeLabel('telp'))); ?>    
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="form-group">
            <?php echo $form->labelEx($model_individu,'pekerjaan'); ?>
            <?php echo $form->textField($model_individu,'pekerjaan',array('class'=>'form-control','placeholder'=>$model_individu->getAttributeLabel('pekerjaan'))); ?>    
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model_individu,'nama_instansi'); ?>
            <?php echo $form->textField($model_individu,'nama_instansi',array('class'=>'form-control','placeholder'=>$model_individu->getAttributeLabel('nama_instansi'))); ?>    
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model_individu,'email'); ?>
            <?php echo $form->textField($model_individu,'email',array('class'=>'form-control','placeholder'=>$model_individu->getAttributeLabel('email'))); ?>    
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model_individu,'data_diminta'); ?>
            <?php echo $form->textField($model_individu,'data_diminta',array('class'=>'form-control','placeholder'=>$model_individu->getAttributeLabel('data_diminta'))); ?>    
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model_individu,'pnbp'); ?>
            <?php echo $form->dropDownList($model_individu,'pnbp',array('1'=>'PNBP', '2'=>'Non PNBP'),array('class'=>'form-control','prompt'=>'Pilih Pembayaran...','onchange'=>'pilih_pnbp(this.value)')); ?>    
        </div>
        <div class="form-group pnbp">
            <?php echo $form->labelEx($model_individu,'proses_data'); ?>
            <?php echo $form->dropDownList($model_individu,'proses_data',array('1'=>'Dengan Proses Data', '2'=>'Tanpa Proses Data'),array('class'=>'form-control')); ?>    
        </div>
        <div class="form-group pnbp">
            <?php echo $form->labelEx($model_individu,'size'); ?>
            <?php echo $form->textField($model_individu,'size',array('class'=>'form-control','placeholder'=>$model_individu->getAttributeLabel('size'))); ?>    
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
$cs->registerScript("pnbp","
    function pilih_pnbp(data) {
        if(data=='1') $('.pnbp').show();
        else $('.pnbp').hide();
    }
", CClientScript::POS_END);

$show = $model_individu->pnbp=='1'?'true':'false';
$cs->registerScript("sds","
    $('.pnbp').toggle(".$show.");
");

?>