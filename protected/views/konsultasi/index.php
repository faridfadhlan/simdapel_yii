<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Layanan Konsultasi Data Statistik
        <!--<small>Control panel</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Layanan Konsultasi Data Statistik</li>
      </ol>
        <?php echo CHtml::link('<i class="fa fa-plus"></i>Buat Pesan', array('konsultasi/create'), array('class'=>'btn btn-default pull-left'));?>
        <div class='clearfix'></div>
        
    </section>

    <!-- Main content -->
    <section class="content">
        <?php if(Yii::app()->user->hasFlash('success')):?>
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Alert!</h4>
            <?php echo Yii::app()->user->getFlash('success');?>
        </div>
        <?php endif;?>
        <div class="box box-primary">
            <div class="box-body">
                <table id="tabel1" class="table table-hover">
                    <thead>
                      <tr>
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">Judul</th>
                        <th class="text-center">Status</th>
                      </tr>
                    </thead>  
                    <tbody>
                        <?php 
                        if(count($dataProvider)>0) :
                            foreach($dataProvider as $data) {
                                echo '<tr>';
                                echo '<td class="text-center" width="20%">'.datetime_to_tanggal($data->create_time).'</td>';
                                echo '<td>'.CHtml::link($data->judul,array('konsultasi/view', 'id'=>$data->id)).'</td>';
                                echo '<td class="text-center" width="20%"><span class="label label-warning">Pending</span></td>';
                                echo '</tr>';
                            }
                        else:
                            echo '<tr><td colspan="3">Tidak ada pesan</td></tr>';
                        endif;
                        ?>
                    </tbody>
                  </table>
            </div><!-- /.box-body -->
          </div><!-- /.box -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
