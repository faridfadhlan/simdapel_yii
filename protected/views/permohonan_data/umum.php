<div class="content-wrapper">
          <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Permohonan Data
        <!--<small>Control panel</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Permohonan Data</li>
        <li class="active">Tambah Permohonan Data</li>
      </ol>
        <div class='clearfix'></div>
        
    </section>

    <section class="content">
        <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_1" data-toggle="tab">Raw Data</a></li>
                  <li><a href="#tab_2" data-toggle="tab">Data Lainnya</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                    <?php $this->renderPartial('_form_data_raw', array(
                        'model_raw'=>$model_raw,
                        'data_inventori'=>$data_inventori
                    ));?>
                    </div>
                  <div class="tab-pane" id="tab_2">
                      <?php $this->renderPartial('_form_data_lainnya', array(
                        'model_lainnya'=>$model_lainnya,
                    ));?>
                  </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
              </div><!-- nav-tabs-custom -->
    </section>
</div>

<?php
$cs = Yii::app()->clientScript;

$cs->registerScript("mulai","
    $('.nav-tabs li:eq(".$tab_aktif.") a').tab('show') 
");

?>

