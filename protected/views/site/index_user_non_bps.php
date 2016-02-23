<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php echo $jumlah['data1'][0];?></h3>
                  <p><?php echo $jumlah['data1'][1];?></p>
                </div>
                <div class="icon">
                  <i class="ion ion-android-desktop"></i>
                </div><?php echo CHtml::link('More info <i class="fa fa-arrow-circle-right"></i>', array('pl_data/index'), array('class'=>'small-box-footer'));?></div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo $jumlah['data2'][0];?></h3>
                  <p><?php echo $jumlah['data2'][1];?></p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <?php echo CHtml::link('More info <i class="fa fa-arrow-circle-right"></i>', array('data_inventori/index'), array('class'=>'small-box-footer'));?>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?php echo $jumlah['data3'][0];?></h3>
                  <p><?php echo $jumlah['data3'][1];?></p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php echo $jumlah['data4'][0];?></h3>
                  <p><?php echo $jumlah['data4'][1];?></p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          </div><!-- /.row -->
          <!-- Main row -->
         
            

              <!-- TO DO List -->
              <div class="box box-primary">
                
                <div class="box-header">
                  <h3 class="box-title">History Permohonan Data</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="tabel1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th class="text-center">Tanggal Permohonan</th>
                        <th class="text-center">Data Dipinjam</th>
                        <th class="text-center">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php foreach($permohonan_data as $data):?>
                      <tr>
                          <td class="text-center"><?php echo datetime_to_tanggal($data->create_time);?></td>
                        <td><?php echo $data->data_inventori->nama_data;?></td>
                        <td class="text-center"><?php echo '<span class="label label-'.$data->status.'">'.($data->status=='success'?'Approved':'Pending').'</span>';?></td>
                      </tr>
                      <?php endforeach;?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              
                
              </div><!-- /.box -->

              <!-- quick email widget -->
              

            </section><!-- /.Left col -->
            
          </div><!-- /.row (main row) -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->