<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $model->nama_data;?>
        <!--<small>Control panel</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Master Data Inventori</li>
        <li>Data Inventori</li>
        <li class="active"><?php echo $model->nama_data;?></li>
      </ol>
        
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box box-primary">
            
                <div class="box-body">
                    <p class="lead">Rincian Data Inventori #<?php echo $model->id;?></p>
                    <div class="table-responsive">
                <table class="table">
                  <tbody><tr>
                    <th style="width:30%">No CD</th>
                    <td><?php echo $model->no_cd;?></td>
                  </tr>
                  <tr>
                    <th>Label CD</th>
                    <td><?php echo $model->label_cd;?></td>
                  </tr>
                  <tr>
                    <th>Nama Data</th>
                    <td><?php echo $model->nama_data;?></td>
                  </tr>
                  <tr>
                    <th>Tahun</th>
                    <td><?php echo $model->tahun;?></td>
                  </tr>
                  <tr>
                    <th>Rincian</th>
                    <td><?php echo $model->rincian;?></td>
                  </tr>
                  <tr>
                    <th>Format</th>
                    <td><?php echo $model->format;?></td>
                  </tr>
                  <tr>
                    <th>Jumlah Record</th>
                    <td><?php echo $model->jumlah_rec;?></td>
                  </tr>
                  <tr>
                    <th>Ukuran File</th>
                    <td><?php echo $model->file_size;?></td>
                  </tr>
                  <tr>
                    <th>Satuan Ukuran File</th>
                    <td><?php echo $model->file_size_unit;?></td>
                  </tr>
                  <tr>
                    <th>Keterangan</th>
                    <td><?php echo $model->keterangan;?></td>
                  </tr>
                  <tr>
                    <th>Layout Data</th>
                    <td><?php echo $model->nama_layout!=NULL?CHtml::link($model->nama_layout, Yii::app()->baseUrl.'/storage/layouts/'.$model->nama_layout):'';?></td>
                  </tr>
                </tbody></table>
              </div>
        </div>
        </div>
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->