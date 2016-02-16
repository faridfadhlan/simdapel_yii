<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Peminjaman Perangkat Lunak
        <!--<small>Control panel</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Peminjaman Perangkat Lunak</li>
        <li class="active">Data Peminjaman Perangkat Lunak</li>
      </ol>
        <br />
        <?php if(Yii::app()->user->role_id=='1' || Yii::app()->user->role_id=='4'): ?> 
        <?php echo CHtml::link('<i class="fa fa-plus"></i>Tambah Peminjaman', array('peminjaman_pl/create'), array('class'=>'btn btn-default pull-left'));?>
        <div class='clearfix'></div>
        
        <?php endif;?>
        
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
                <table id="tabel1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Perangkat Lunak</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>  
                    <tbody>
                        <?php 
                        foreach($dataProvider as $data) {
                            echo '<tr>';
                            echo '<td class="text-center">'.$data->id.'</td>';
                            echo '<td>'.$data->user->nama.'</td>';
                            echo '<td>'.$data->pl_data->nama.'</td>';
                            echo '<td class="text-center">'.datetime_to_tanggal($data->tgl_pinjam).'</td>';
                            echo '<td class="text-center">'.datetime_to_tanggal($data->tgl_kembali).'</td>';
                            echo '<td>'.($data->tgl_targetkembali===NULL?'Software digandakan':($data->tgl_kembali===NULL?'Belum Kembali':'Sudah Kembali')).'</td>';
                            echo '<td class="text-center">'.
                                    CHtml::link('<i class="fa fa-edit"></i>',array('peminjaman_pl/update','id'=>$data->id)).
                                    CHtml::link('<i class="fa fa-remove"></i>',array('peminjaman_pl/delete','id'=>$data->id)).
                                    '</td>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                  </table>

            </div><!-- /.box-body -->
          </div><!-- /.box -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<?php
$cs=Yii::app()->getClientScript();
$cs->scriptMap=array('jquery.js'=>false);
$cs->registerCssFile(Yii::app()->request->baseUrl.'/public/plugins/datatables/dataTables.bootstrap.css');
$cs->registerScriptFile(Yii::app()->request->baseUrl.'/public/plugins/datatables/jquery.dataTables.min.js',CClientScript::POS_END);
$cs->registerScriptFile(Yii::app()->request->baseUrl.'/public/plugins/datatables/dataTables.bootstrap.min.js',CClientScript::POS_END);
$cs->registerScript("datatable", "
    $('#tabel1').DataTable();
");
?>