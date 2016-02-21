<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pesan / Layanan Konsultasi Data
        <!--<small>Control panel</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Pesan / Layanan Konsultasi Data</li>
      </ol>
        <br />
        <?php echo CHtml::link('<i class="fa fa-plus"></i>&nbsp;&nbsp;&nbsp;Buat Pesan', array('messages/create'), array('class'=>'btn btn-sm btn-info btn-flat pull-left'));?>
        <div class='clearfix'></div>
    </section>

    <!-- Main content -->
    <section class="content">

<div class="box box-success">
<div class="box-header">
  <i class="fa fa-comments-o"></i>
  <h3 class="box-title">Pesan</h3>
</div>
<div class="box-body chat" id="chat-box">
  <!-- chat item -->
  <?php for($i=0;$i<count($models)-1;$i++):?>
  <div class="item">
    <img src="<?php echo Yii::app()->baseUrl;?>/public/dist/img/user4-128x128.jpg" alt="user image" class="online">
    <p class="message">
      <a href="#" class="name">
        <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> <?php //echo $models[$i]->create_time;?></small>
        <?php print_r($models[$i][0]);//->isi;//echo $models[$i]->user->nama;?>
      </a>
      <?php //echo $models[$i]->isi;?>
    </p>
  </div><!-- /.item -->
  <?php endfor;?>
</div><!-- /.chat -->
<div class="box-footer">
  <div class="input-group">
    <input class="form-control" placeholder="Type message...">
    <div class="input-group-btn">
      <button class="btn btn-success"><i class="fa fa-plus"></i></button>
    </div>
  </div>
</div>
</div><!-- /.box (chat box) -->
</section>
</div>