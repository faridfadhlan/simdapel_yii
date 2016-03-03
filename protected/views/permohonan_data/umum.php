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
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                    <?php $this->renderPartial('_form_data_raw', array(
                        'model_raw'=>$model_raw,
                        'role'=>$role,
                        'data_inventori'=>$data_inventori
                    ));?>
                    </div>
                </div><!-- /.tab-content -->
              </div><!-- nav-tabs-custom -->
    </section>
</div>

