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
            <li class="active">Edit Data Inventori</li>
          </ol>
        </section>


<section class="content">
    <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Edit Data Inventori</h3>
                </div><!-- /.box-header -->
                
                 
                    
                        
                <!-- form start -->
                

<?php $this->renderPartial('_form', array(
    'model'=>$model,
    'subjeks'=>$subjeks
    ));?>
    </div>      
</section>
</div>