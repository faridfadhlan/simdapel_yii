<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $model->nama;?>
        <!--<small>Control panel</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Master Data Pengguna</li>
        <li class="active"><?php echo $model->nama;?></li>
      </ol>
        
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box box-primary">
            
                <div class="box-body">
                    <p class="lead">Rincian Pengguna #<?php echo $model->id;?></p>
                    <div class="table-responsive">
                <table class="table">
                  <tbody>
                    
                    <?php if($model->jenis_identitas != NULL) : ?>
                    <tr>
                        <th style="width:30%">Nama</th>
                        <td><?php echo $model->nama;?></td>
                    </tr>
                    <tr>
                        <th>Username</th>
                        <td><?php echo $model->username;?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><?php echo $model->email;?></td>
                    </tr>
                    <tr>
                        <th>Jenis Identitas</th>
                        <td><?php echo $model->jenis_identitas;?></td>
                    </tr>
                    <tr>
                        <th>Nomor Identitas</th>
                        <td><?php echo $model->no_identitas;?></td>
                    </tr>
                    <tr>
                        <th>Umur</th>
                        <td><?php echo $model->umur;?></td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td><?php echo $model->jk;?></td>
                    </tr>
                    <tr>
                        <th>Pendidikan Terakhir</th>
                        <td><?php echo $model->pendidikan_terakhir;?></td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td><?php echo $model->alamat;?></td>
                    </tr>
                    <tr>
                        <th>No Telepon</th>
                        <td><?php echo $model->telp;?></td>
                    </tr>
                    <tr>
                        <th>Pekerjaan</th>
                        <td><?php echo $model->pekerjaan;?></td>
                    </tr>
                    <?php else : ?>
                    <tr>
                        <th style="width:30%">NIP</th>
                        <td><?php echo $model->nip;?></td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td><?php echo $model->nama;?></td>
                    </tr>
                    <tr>
                        <th>Username</th>
                        <td><?php echo $model->username;?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><?php echo $model->email;?></td>
                    </tr>
                    <tr>
                        <th>Bidang / Unit Kerja</th>
                        <td><?php echo $model->seksi->bidang->nama_bidang;?></td>
                    </tr>
                    <tr>
                        <th>Seksi</th>
                        <td><?php echo $model->seksi->nama_seksi;?></td>
                    </tr>
                    <?php endif; ?>
                </tbody></table>
              </div>
        </div>
        </div>
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->