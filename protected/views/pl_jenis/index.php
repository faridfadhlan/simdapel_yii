<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Master Data Perangkat Lunak
        <!--<small>Control panel</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Master Jenis Perangkat Lunak</li>
        <li class="active">Data Jenis Perangkat Lunak</li>
      </ol>
        <br />
        <?php if(Yii::app()->user->role_id=='1' || Yii::app()->user->role_id=='4'): ?> 
        <?php echo CHtml::link('<i class="fa fa-plus"></i>Tambah Jenis', array('pl_jenis/create'), array('class'=>'btn btn-default pull-left'));?>
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
                        <th width='10%' style='text-align: center;vertical-align: center;'>Kode</th>
                        <th style='text-align: center;vertical-align: center;'>Nama Jenis</th>
                        <th style='text-align: center;vertical-align: center;'>Aksi</th>
                      </tr>
                    </thead>  
                    <tbody>
                        <?php 
                        foreach($dataProvider as $data) {
                            echo '<tr>';
                            echo '<td class="text-center">'.$data->kode.'</td>';
                            echo '<td>'.$data->nama_jenis.'</td>';
                            echo '<td class="text-center">'.
                                    CHtml::link('<i class="fa fa-edit"></i>',array('pl_jenis/update','id'=>$data->id)).
                                    CHtml::link('<i class="fa fa-remove"></i>',array('pl_jenis/delete','id'=>$data->id)).
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