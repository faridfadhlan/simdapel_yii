
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'permohonan-data-umum-form',
	'enableAjaxValidation'=>false,
)); ?>
<div class="box-body">
    <div class="row">
            <div class="col-md-12">
                <?php if($role=='3'):?>
                <div class="callout callout-warning">
                    <h4>Catatan</h4>
                    <p>Untuk permintaan raw data, dibebankan biaya PNBP sesuai ukuran file dan jenis pemrosesan data. Pengguna bisa memilih data melalui form ini terlebih dahulu. Jika data tersedia, akan kami hubungi kembali via email dan sms untuk pengambilan data dan proses administrasi. </p>
                  </div>
                <?php endif;?>
                <?php echo CHtml::errorSummary($model_raw,NULL, NULL,array('class'=>'callout callout-danger')); ?>
                
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
                                echo '<td>'.$data_inventori->id.$form->hiddenField($model_raw, 'data_inventori_id').'</td>';
                                echo '<td>'.$data_inventori->nama_data.' ('.CHtml::link('Ganti', array('data_inventori/index')).')</td>';
                                echo '<td>'.$data_inventori->rincian.'</td>';
                                echo '<td>'.$data_inventori->tahun.'</td>';
                            endif;?>
                        </tr>   
                    </tbody>
                </table>
        <div class="form-group">
            <?php echo $form->labelEx($model_raw,'data_diminta'); ?>
            <?php echo $form->textArea($model_raw,'data_diminta',array('class'=>'form-control','placeholder'=>$model_raw->getAttributeLabel('data_diminta'),'rows'=>'4')); ?>    
        </div>
        <?php if($role=='3'):?>
        <div class="form-group pnbp">
            <?php echo $form->labelEx($model_raw,'proses_data'); ?>
            <?php echo $form->dropDownList($model_raw,'proses_data',array('1'=>'Dengan Proses Data', '2'=>'Tanpa Proses Data'),array('class'=>'form-control','prompt'=>'Pilih Pemrosesan Data...')); ?>    
        </div>
        <?php endif;?>
    </div></div>
    <div class="box-footer">
<button type="submit" class="btn btn-primary">Kirim</button>
</div>
</div>

<?php $this->endWidget();?>