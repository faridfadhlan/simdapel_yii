<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Permohonan Data
        <!--<small>Control panel</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Permohonan Data</li>
        <li class="active">Data Permohonan Data</li>
      </ol>
        <br />
        <?php if(Yii::app()->user->role_id=='1' || Yii::app()->user->role_id=='4'): ?> 
        <?php echo CHtml::link('<i class="fa fa-plus"></i>Tambah Permohonan Data', array('permohonan_data/create'), array('class'=>'btn btn-default pull-left'));?>
        <?php else:
              echo CHtml::link('<i class="fa fa-plus"></i>Tambah Permohonan Data', array('permohonan_data/umum'), array('class'=>'btn btn-default pull-left'));?>
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
                        <th class="text-center">ID</th>
                        <th class="text-center">Kategori Pemohon</th>
                        <th class="text-center">Nama Pemohon/Instansi</th>
                        <th class="text-center">Data</th>
                        <th class="text-center">Tanggal Permohonan</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Aksi</th>
                      </tr>
                    </thead>  
                    <tbody>
                        <?php 
                        $i=0;
                        $jenis = array('1'=>'Pegawai BPS', '2'=>'Individu', '3'=>'Instansi/Lembaga');
                        foreach($dataProvider as $data) {
                            $i++;
                            echo '<tr>';
                            echo '<td class="text-center">'.$i.'</td>';
                            echo '<td>'.(($data->user_id!=NULL)?$data->peminjam->role->name:($data->nama==NULL?'Instansi':'Individu')).'</td>';
                            echo '<td>'.(($data->flag_user=='2')?$data->nama:(($data->flag_user=='1')?$data->peminjam->nama:$data->nama_instansi)).'</td>';
                            echo '<td>'.CHtml::link($data->data_inventori->nama_data,'#').'</td>';
                            echo '<td class="text-center">'.datetime_to_tanggal($data->create_time).'</td>';
                            echo '<td class="text-center"><span class="label label-'.$data->status.'">'.($data->status=='success'?'Approved':'Pending').'</span></td>';
                            echo '<td class="text-center">'.
                                    ((Yii::app()->user->role_id=='1' || Yii::app()->user->role_id=='4')?CHtml::link('<i class="fa fa-edit"></i>',array('permohonan_data/update','id'=>$data->id)):'').
                                    CHtml::link('<i class="fa fa-remove"></i>',array('permohonan_data/delete','id'=>$data->id)).
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
    $('#tabel1').DataTable({
        'ordering': false
    });
");
?>