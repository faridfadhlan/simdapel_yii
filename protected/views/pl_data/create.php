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
            <li class="active">Tambah Data Perangkat Lunak</li>
          </ol>
        </section>


<section class="content">
    <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Tambah Data Perangkat Lunak</h3>
                </div><!-- /.box-header -->
                
                 
                    
                        
                <!-- form start -->
                

<?php $this->renderPartial('_form', array(
    'model'=>$model, 
    'medias'=>$medias, 
    'licenses'=>$licenses,
    'jenises'=>$jenises,
    'companies'=>$companies,
    'kontaks'=>$kontaks
    ));?>
    </div>      
</section>
</div>