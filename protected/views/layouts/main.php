<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">   
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl;?>/public/bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl;?>/public/plugins/font-awesome/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl;?>/public/plugins/ionicons/css/ionicons.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl;?>/public/dist/css/AdminLTE.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl;?>/public/dist/css/skins/_all-skins.min.css" />
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
    
    <header class="main-header">
        <!-- Logo -->
        <?php echo CHtml::link('<span class="logo-mini"><b>S</b>DPL</span><span class="logo-lg"><b>SIM</b>DAPEL</span>',array('site/index'),array('class'=>'logo'));?>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
                    <?php
                    $role = Yii::app()->user->role_id;
                    if($role=='1' || $role=='4'){
                        $konsultasi_notif = KonsultasiThread::model()->findAll('read_status=:read_status', array(':read_status'=>'2'));
                    }
                    if($role=='2' || $role=='3') {
                        $konsultasi_notif = KonsultasiThread::model()->findAll('read_status=:read_status && user_id=:user_id', array(':read_status'=>'1', ':user_id'=>Yii::app()->user->id));
                    }
                    ?>
                  <span class="label label-success"><?php echo count($konsultasi_notif);?></span>
                </a>
                <ul class="dropdown-menu">
                    
                  <li class="header">Ada <?php echo count($konsultasi_notif);?> pesan belum dibaca</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                        <?php
                        $i = 0;
                        foreach($konsultasi_notif as $konsultasi) {
                            $i++;
                            if($i<=3) :
                                $criteria = new CDbCriteria;
                                $criteria->select = 'MAX(id) as id';
                                $criteria->condition = 'thread_id='.$konsultasi->id;
                                $max_post = KonsultasiPost::model()->find($criteria);
                                $post = KonsultasiPost::model()->findByPk($max_post->id);
                                echo '<li>';
                                echo '<a href="'.Yii::app()->createUrl("konsultasi/view", array("id"=>$konsultasi->id)).'">';
                                echo '<div class="pull-left">';
                                echo '<img src="'.Yii::app()->request->baseUrl.'/public/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">';
                                echo '</div>';
                                echo '<h4>';
                                echo $post->user->nama;
                                echo '<small><i class="fa fa-clock-o"></i>'.$post->create_time.'</small>';
                                echo '</h4>';
                                echo $post->isi;
                                echo '</a>';
                                echo '</li>';
                            endif;
                        }
                        
                        
                        
                        
                        ?>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">See All Messages</a></li>
                </ul>
              </li>
              
              <!-- Tasks: style can be found in dropdown.less -->
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo Yii::app()->request->baseUrl; ?>/public/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo Yii::app()->user->nama;?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/public/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    <p>
                      <?php echo Yii::app()->user->nama;?>
                      <small>Member since Jan. 2016</small>
                    </p>
                  </li>
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                        <?php echo CHtml::link('Ganti Password', array('user/gantipassword'), array('class'=>'btn btn-default btn-flat'));?>
                    </div>
                    <div class="pull-right">
                        <?php echo CHtml::link('Sign out', array('site/logout'), array('class'=>'btn btn-default btn-flat')); ?>
                      
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
        
        
        
        <?php echo $content;?>
        
        
         <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0.0
        </div>
        <strong>Copyright &copy; <?php echo date('Y');?> <a href="http://kalbar.bps.go.id">BPS Provinsi Kalimantan Barat</a>.</strong> All rights reserved.
 </footer>
        
    </div><!-- ./wrapper -->

    
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl;?>/public/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl;?>/public/bootstrap/js/bootstrap.min.js"></script>

<script type="text/javascript" src="<?php echo Yii::app()->baseUrl;?>/public/plugins/fastclick/fastclick.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl;?>/public/dist/js/app.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl;?>/public/plugins/slimScroll/jquery.slimscroll.min.js"></script>

  </body>
</html>