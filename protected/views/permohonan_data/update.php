<div class="content-wrapper">
          <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Update Permohonan Data
        <!--<small>Control panel</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Permohonan Data</li>
        <li class="active">Update Permohonan Data</li>
      </ol>
        <div class='clearfix'></div>
        
    </section>

    <section class="content">
        <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_1" data-toggle="tab">BPS</a></li>
                  <li><a href="#tab_2" data-toggle="tab">Personal / Individu</a></li>
                  <li><a href="#tab_3" data-toggle="tab">Instansi / Organisasi / Perusahaan</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                    <?php $this->renderPartial('_form_bps', array(
                        'model_bps'=>$model_bps,
                        'bidangs'=>$bidangs,
                        'data_inventori'=>$data_inventori,
                    ));?>
                    </div>
                  <div class="tab-pane" id="tab_2">
                      <?php $this->renderPartial('_form_individu', array(
                        'model_individu'=>$model_individu,
                        'data_inventori'=>$data_inventori,
                    ));?>
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_3">
                      <?php $this->renderPartial('_form_instansi', array(
                        'model_instansi'=>$model_instansi,
                        'data_inventori'=>$data_inventori,
                    ));?>
                  </div>
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