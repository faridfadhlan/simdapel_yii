<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $model->nama;?>
        <!--<small>Control panel</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Master Data Perangkat Lunak</li>
        <li>Data Perangkat Lunak</li>
        <li class="active"><?php echo $model->nama;?></li>
      </ol>
        
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box box-primary">
            
                <div class="box-body">
                    <p class="lead">Rincian Perangkat Lunak #<?php echo $model->id;?></p>
                    <div class="table-responsive">
                <table class="table">
                  <tbody><tr>
                    <th style="width:30%">Kode</th>
                    <td><?php echo $model->kode;?></td>
                  </tr>
                  <tr>
                    <th>Nama</th>
                    <td><?php echo $model->nama;?></td>
                  </tr>
                  <tr>
                    <th>Jumlah Media</th>
                    <td><?php echo $model->jumlah_media;?></td>
                  </tr>
                  <tr>
                    <th>Jumlah Duplikat</th>
                    <td><?php echo $model->duplikat;?></td>
                  </tr>
                  <tr>
                    <th>Tanggal Terima</th>
                    <td><?php echo datetime_to_tanggal($model->tgl_terima);?></td>
                  </tr>
                  <tr>
                    <th>Serial Number</th>
                    <td><?php echo $model->sn;?></td>
                  </tr>
                  <tr>
                    <th>Media Penyimpanan</th>
                    <td><?php echo $model->media->nama_media;?></td>
                  </tr>
                  <tr>
                    <th>License</th>
                    <td><?php echo $model->license->nama_license;?></td>
                  </tr>
                  <tr>
                    <th>Jenis</th>
                    <td><?php echo $model->jenis->nama_jenis;?></td>
                  </tr>
                  <tr>
                    <th>Company</th>
                    <td><?php echo $model->company->nama_company;?></td>
                  </tr>
                  <tr>
                    <th>Manual</th>
                    <td><?php echo $model->manual!=NULL?CHtml::link($model->manual, Yii::app()->baseUrl.'/storage/manuals/'.$model->manual):'Tidak Tersedia';?></td>
                  </tr>
                </tbody></table>
              </div>
        </div>
        </div>
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->