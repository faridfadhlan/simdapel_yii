<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Master Data Perangkat Lunak
        <!--<small>Control panel</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Master Data Perangkat Lunak</li>
        <li class="active">Data Perangkat Lunak</li>
      </ol>
        <br />
        <?php if(Yii::app()->user->role_id=='1' || Yii::app()->user->role_id=='4'): ?> 
        <?php echo CHtml::link('<i class="fa fa-plus"></i>Tambah Perangkat Lunak', array('pl_data/create'), array('class'=>'btn btn-default pull-left'));?>
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
                        <th class="text-center">Kode</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Jumlah Media</th>
                        <th class="text-center">Company</th>
                        <th class="text-center">Lisensi</th>
                        <th class="text-center">Manual</th>
                        <th class="text-center">Aksi</th>
                      </tr>
                    </thead>  
                    <tbody>
                        <?php 
                        foreach($pl_data as $data) {
                            echo '<tr>';
                            echo '<td class="text-center">'.$data->kode.'</td>';
                            echo '<td>'.$data->nama.'</td>';
                            echo '<td class="text-center">'.$data->jumlah_media.'</td>';
                            echo '<td>'.$data->company->nama_company.'</td>';
                            echo '<td>'.$data->license->nama_license.'</td>';
                            echo '<td>'.$data->manual.'</td>';
                            echo '<td class="text-center">';?>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default btn-flat">Action&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                                        <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown">
                                            <span class="caret"></span>
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><?php echo CHtml::link('Edit',array('pl_data/update','id'=>$data->id));?></li>
                                            <li><?php echo CHtml::link('Hapus',array('pl_data/delete','id'=>$data->id));?></li>
                                            <li>
                                                <?php
                                                echo (($update_id!=NULL)?
                                                    CHtml::link(
                                                            'Pinjam',
                                                            array(
                                                                'pl_data/pinjam',
                                                                'id'=>$data->id,
                                                                'update_id'=>$update_id
                                                            )):
                                                    CHtml::link(
                                                            'Pinjam',
                                                            array(
                                                                'pl_data/pinjam',
                                                                'id'=>$data->id,
                                                            )));
                                                ?>
                                            </li>
                                            <li><?php echo CHtml::link('Instal',array('pl_data/instal','id'=>$data->id));?></li>
                                        </ul>
                                    </div>
                                    </td>
                            <?php
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