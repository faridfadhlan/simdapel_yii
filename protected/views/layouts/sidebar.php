<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo Yii::app()->request->baseUrl; ?>/public/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo Yii::app()->user->nama;?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <?php if(Yii::app()->user->role_id != '3') { ?>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-table"></i> <span>Master Perangkat Lunak</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                  <li><?php echo CHtml::link('<i class="fa fa-circle-o"></i>Data Perangkat Lunak', array('pl_data/index'));?></li>
                 <?php if(Yii::app()->user->role_id == '1' || Yii::app()->user->role_id =='4') {?>
                <li><a href="#"><i class="fa fa-circle-o"></i>Master Company</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i>Master Lisensi</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i>Master Media Penyimpanan</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i>Master Jenis</a></li>
                 <?php }?>
              </ul>
            </li>
            <?php }?>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-table"></i> <span>Master Data Inventori</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i>Data Inventori</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i>Subjek Data Inventori</a></li>
              </ul>
            </li>
            <?php if(Yii::app()->user->role_id == '1') { ?>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-table"></i> <span>Master Pengguna</span>
              </a>              
            </li>
            <?php }?>
            <?php if(Yii::app()->user->role_id=='1' || Yii::app()->user->role_id=='4') {?>
           
            
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-table text-yellow"></i><span>Peminjaman Software</span></a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-table text-aqua"></i><span>Permintaan Data</span></a>
            </li>
            <?php }?>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>