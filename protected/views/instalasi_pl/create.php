<div class="content-wrapper">
          <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Instalansi Perangkat Lunak
        <!--<small>Control panel</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Data Instalansi Perangkat Lunak</li>
        <li class="active">Tambah Instalansi Perangkat Lunak</li>
      </ol>
        <div class='clearfix'></div>
        
    </section>


    <section class="content">
        <div class="box box-primary">                  
            <div class="box-body">
            <?php $this->renderPartial('_form', array(
                        'model'=>$model,
                        'bidangs'=>$bidangs,
                        'pl_data'=>$pl_data
                    ));?>
            </div>
        </div>
    </section>
</div>