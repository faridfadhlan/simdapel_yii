<?php $this->beginContent('//layouts/main'); ?>

        
        <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo Yii::app()->request->baseUrl; ?>/public/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo Yii::app()->user->username;?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">HOME</li>
            <li class="treeview"><?php echo CHtml::link('<i class="fa fa-bell-o"></i><span>Notifikasi</span>', array('site/index'));?></li>
            <li class="treeview"><?php echo CHtml::link('<i class="fa fa-envelope-o"></i><span>Pesan</span>', array('messages/index'));?></li>
            <li class="header">MASTER DATA</li>
            <?php if(Yii::app()->user->role_id != '3') { ?>
            <li class="treeview <?php 
            echo (
                    Yii::app()->controller->id == 'pl_data' ||
                    Yii::app()->controller->id == 'pl_company' ||
                    Yii::app()->controller->id == 'pl_license' ||
                    Yii::app()->controller->id == 'pl_media' ||
                    Yii::app()->controller->id == 'pl_jenis'
                    )?'active':'';?>">
              <a href="#">
                <i class="fa fa-table"></i><span>Master Perangkat Lunak</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li <?php echo (Yii::app()->controller->id == 'pl_data')?'class="active"':'';?>><?php echo CHtml::link('<i class="fa fa-table text-yellow"></i>Data Perangkat Lunak', array('pl_data/index'));?></li>
                <?php if(Yii::app()->user->role_id == '1' || Yii::app()->user->role_id =='4') :?>
                <li <?php echo (Yii::app()->controller->id == 'pl_company')?'class="active"':'';?>><?php echo CHtml::link('<i class="fa fa-table text-yellow"></i>Master Company', array('pl_company/index'));?></li>
                <li <?php echo (Yii::app()->controller->id == 'pl_license')?'class="active"':'';?>><?php echo CHtml::link('<i class="fa fa-table text-yellow"></i>Master License', array('pl_license/index'));?></li>
                <li <?php echo (Yii::app()->controller->id == 'pl_media')?'class="active"':'';?>><?php echo CHtml::link('<i class="fa fa-table text-yellow"></i>Master Media', array('pl_media/index'));?></li>
                <li <?php echo (Yii::app()->controller->id == 'pl_jenis')?'class="active"':'';?>><?php echo CHtml::link('<i class="fa fa-table text-yellow"></i>Master Jenis', array('pl_jenis/index'));?></li>
                 <?php endif;?>
              </ul>
            </li>
            <?php }?>
            
            <li class="treeview <?php 
            echo (
                    Yii::app()->controller->id == 'data_inventori' ||
                    Yii::app()->controller->id == 'data_subjek'
                    )?'active':'';?>">
              <a href="#">
                <i class="fa fa-table"></i><span>Master Data Inventori</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                    <li <?php echo (Yii::app()->controller->id == 'data_inventori')?'class="active"':'';?>><?php echo CHtml::link('<i class="fa fa-circle-o"></i>Data Inventori', array('data_inventori/index'));?></li>
                    <?php if(Yii::app()->user->role_id == '1' || Yii::app()->user->role_id =='4') :?>
                    <li <?php echo (Yii::app()->controller->id == 'data_subjek')?'class="active"':'';?>><?php echo CHtml::link('<i class="fa fa-circle-o"></i>Subjek Data Inventori', array('data_subjek/index'));?></li>
                    <?php endif;?>
              </ul>
            </li>
            <?php if(Yii::app()->user->role_id == '1') { ?>
            <li class="treeview <?php echo (Yii::app()->controller->id == 'user')?'active':'';?>"> <?php echo CHtml::link('<i class="fa fa-table"></i><span>Master Pengguna</span>', array('user/index'));?></li>
            <?php }?>
            <?php if(Yii::app()->user->role_id=='1' || Yii::app()->user->role_id=='4') {?>
           
            <li class="header">TRANSAKSI</li>
            <li class="treeview <?php echo (Yii::app()->controller->id == 'peminjaman_pl')?'active':'';?>"><?php echo CHtml::link('<i class="fa fa-table text-yellow"></i><span>Peminjaman Software</span>', array('peminjaman_pl/index'));?></li>
            <li class="treeview <?php echo (Yii::app()->controller->id == 'permohonan_data')?'active':'';?>"><?php echo CHtml::link('<i class="fa fa-table text-aqua"></i><span>Permohonan Data</span>', array('permohonan_data/index'));?></li>
            <li class="treeview <?php echo (Yii::app()->controller->id == 'instalasi_pl')?'active':'';?>"><?php echo CHtml::link('<i class="fa fa-table text-aqua"></i><span>Permohonan Instalansi</span>', array('instalasi_pl/index'));?></li>
            <li class="header">REPORT</li>
            <li class="treeview"><?php echo CHtml::link('<i class="fa fa-table text-yellow"></i><span>REPORT</span>', array('peminjaman_pl/index'));?></li>
                
                <?php }?>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
        
        <?php echo $content;?>
        
        
         
        
    
<?php $this->endContent(); ?>