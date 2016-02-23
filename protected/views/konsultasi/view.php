<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Layanan Konsultasi Data Statistik
        <!--<small>Control panel</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><?php echo CHtml::link('Layanan Konsultasi Data Statistik', array('konsultasi/index'));?></li>
        
      </ol>
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
            <div class="box-header with-border">
                  <h3 class="box-title"><?php echo $modelnya->judul;?></h3>
                </div><!-- /.box-header -->
            <div class="box-body chat" id="chat-box">
              <?php foreach($model as $data):?>
              <div class="item">
                <img src="<?php echo Yii::app()->baseUrl;?>/public/dist/img/user2-160x160.jpg" alt="user image" class="online">
                <p class="message">
                  <a href="#" class="name">
                    <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> <?php echo $data->create_time;?></small>
                    <?php echo $data->user->nama;?>
                  </a>
                  <?php echo $data->isi;?>
                </p>
              <?php endforeach;?>
            </div>
        </div>
                <div class="box-footer">
                    <?php $form=$this->beginWidget('CActiveForm', array(
                                'id'=>'konsultasi-form',
                                'enableAjaxValidation'=>false
                        )); ?>
                    <?php if(count($model)==0) {
                    echo '<div class="form-group">';
                      echo $form->textField($konsultasi, 'judul', array('class'=>'form-control', 'placeholder'=>'Judul'));
                  echo '</div>';
                        
                    }
                    else {
                        echo '<div class="form-group">';
                      echo $form->dropDownList($konsultasi, 'status', array('1'=>'Open','2'=>'Closed'),array('class'=>'form-control', 'prompt'=>'Pilih Status...'));
                  echo '</div>';
                    }
                    ?>
                    
                  <div class="form-group">
                      <?php echo $form->textArea($konsultasi, 'isi', array('class'=>'form-control', 'placeholder'=>'Ketikkan pesan...','rows'=>'6'));?>
                  </div>
                    <div class="form-group">
                    <?php echo CHtml::submitButton('Kirim', array('class'=>'btn btn-primary')); ?>
        </div>
                    <?php $this->endWidget(); ?>
                </div>
        </div>
    </section>
</div>
