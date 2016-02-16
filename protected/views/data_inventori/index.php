<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Master Data Inventori
        <!--<small>Control panel</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Master Data Inventori</li>
        <li class="active">Data Inventori</li>
      </ol>
        <br />
        <?php if(Yii::app()->user->role_id=='1' || Yii::app()->user->role_id=='4'): ?> 
        <?php echo CHtml::link('<i class="fa fa-plus"></i>Tambah Data Inventori', array('data_inventori/create'), array('class'=>'btn btn-default pull-left'));?>
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
                        <th class="text-center">No CD</th>
                        <th class="text-center">Label CD</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Tahun</th>
                        <th class="text-center">Rincian</th>
                        <th class="text-center">Format</th>
                        <th class="text-center">Aksi</th>
                      </tr>
                    </thead>  
                    <tbody>
                        <?php 
                        foreach($dataProvider as $data) {
                            echo '<tr>';
                            echo '<td class="text-center">'.$data->no_cd.'</td>';
                            echo '<td>'.$data->label_cd.'</td>';
                            echo '<td>'.$data->nama_data.'</td>';
                            echo '<td>'.$data->tahun.'</td>';
                            echo '<td>'.$data->rincian.'</td>';
                            echo '<td>'.$data->format.'</td>';
                            echo '<td class="text-center">'.
                                    CHtml::link('<i class="fa fa-edit"></i>',array('data_inventori/update','id'=>$data->id)).
                                    CHtml::link('<i class="fa fa-remove"></i>',array('data_inventori/delete','id'=>$data->id)).
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