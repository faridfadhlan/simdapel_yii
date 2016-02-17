<?php
/* @var $this Permohonan_dataController */
/* @var $data PermohonanData */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_surat')); ?>:</b>
	<?php echo CHtml::encode($data->no_surat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jenis_identitas')); ?>:</b>
	<?php echo CHtml::encode($data->jenis_identitas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_identitas')); ?>:</b>
	<?php echo CHtml::encode($data->no_identitas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama')); ?>:</b>
	<?php echo CHtml::encode($data->nama); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('umur')); ?>:</b>
	<?php echo CHtml::encode($data->umur); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jk')); ?>:</b>
	<?php echo CHtml::encode($data->jk); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('pendidikan_terakhir')); ?>:</b>
	<?php echo CHtml::encode($data->pendidikan_terakhir); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alamat')); ?>:</b>
	<?php echo CHtml::encode($data->alamat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telp')); ?>:</b>
	<?php echo CHtml::encode($data->telp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pekerjaan')); ?>:</b>
	<?php echo CHtml::encode($data->pekerjaan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_instansi')); ?>:</b>
	<?php echo CHtml::encode($data->nama_instansi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kategori_instansi')); ?>:</b>
	<?php echo CHtml::encode($data->kategori_instansi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_kepala')); ?>:</b>
	<?php echo CHtml::encode($data->nama_kepala); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('data_diminta')); ?>:</b>
	<?php echo CHtml::encode($data->data_diminta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pnbp')); ?>:</b>
	<?php echo CHtml::encode($data->pnbp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('proses_data')); ?>:</b>
	<?php echo CHtml::encode($data->proses_data); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('size')); ?>:</b>
	<?php echo CHtml::encode($data->size); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status_id')); ?>:</b>
	<?php echo CHtml::encode($data->status_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('operator_id')); ?>:</b>
	<?php echo CHtml::encode($data->operator_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_time')); ?>:</b>
	<?php echo CHtml::encode($data->create_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pegawai_id')); ?>:</b>
	<?php echo CHtml::encode($data->pegawai_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('data_inventori_id')); ?>:</b>
	<?php echo CHtml::encode($data->data_inventori_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('flag_user')); ?>:</b>
	<?php echo CHtml::encode($data->flag_user); ?>
	<br />

	*/ ?>

</div>