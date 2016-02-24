<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Layanan Konsultasi Data Statistik
        <!--<small>Control panel</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Buat Konsultasi Data Statistik</li>
      </ol>
    </section>
    
    <section class="content">
        <div class="box box-primary">
                <?php $this->renderPartial('_form', array(
                    'model'=>$model, 
                    ));?>
    </section>
</div>