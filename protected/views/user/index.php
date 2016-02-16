<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Master Pengguna
        <!--<small>Control panel</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Master Pengguna</li>
        <li class="active">Daftar Master Pengguna</li>
      </ol>
        <br />
        <?php if(Yii::app()->user->role_id=='1'): ?> 
        <?php echo CHtml::link('<i class="fa fa-plus"></i>Tambah Pengguna', array('user/create'), array('class'=>'btn btn-default pull-left'));?>
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
                        <th>Username</th>
                        <th>Email</th>
                        <th>Seksi</th>
                        <th>Role</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>  
                    <tbody>
                        <?php 
                        foreach($dataProvider as $data) {
                            echo '<tr>';
                            echo '<td class="text-center">'.$data->id.'</td>';
                            echo '<td>'.$data->nama.'</td>';
                            echo '<td>'.$data->username.'</td>';
                            echo '<td>'.$data->email.'</td>';
                            echo '<td>'.$data->seksi['nama_seksi'].'</td>';
                            echo '<td>'.$data->role->name.'</td>';
                            echo '<td class="text-center">'.
                                    CHtml::link('<i class="fa fa-edit"></i>',array('user/update','id'=>$data->id)).
                                    CHtml::link('<i class="fa fa-remove"></i>',array('user/delete','id'=>$data->id)).
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