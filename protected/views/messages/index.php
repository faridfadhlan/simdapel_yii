<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pesan / Layanan Konsultasi Data
        <!--<small>Control panel</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Pesan / Layanan Konsultasi Data</li>
      </ol>
        <br />
        <?php echo CHtml::link('<i class="fa fa-plus"></i>&nbsp;&nbsp;&nbsp;Buat Pesan', array('messages/create'), array('class'=>'btn btn-sm btn-info btn-flat pull-left'));?>
        <div class='clearfix'></div>
    </section>
    
    <section class="content">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Latest Orders</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div><!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                    <tr>
                      <th>Tanggal</th>
                      <th>Judul</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    foreach($dataProvider as $data):
                        $status = array(1=>array('Open','warning'), '2'=>array('Closed','success'));
                        echo '<tr>';
                        echo '<td>'.datetime_to_tanggal($data->create_time).'</td>';
                        echo '<td>'.CHtml::link($data->judul,array('messages/view','id'=>$data->id)).'</td>';
                        echo '<td><span class="label label-'.$status[$data->status][1].'">'.$status[$data->status][0].'</span></td>';
                        echo '<td></td>';
                        echo '</tr>';
                    endforeach;
                    ?>
                  </tbody>
                </table>
              </div><!-- /.table-responsive -->
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </section>
</div>
