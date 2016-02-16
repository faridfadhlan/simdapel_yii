<?php
/* @var $this UserController */
/* @var $data User */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nip')); ?>:</b>
	<?php echo CHtml::encode($data->nip); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama')); ?>:</b>
	<?php echo CHtml::encode($data->nama); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::encode($data->username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('remember_token')); ?>:</b>
	<?php echo CHtml::encode($data->remember_token); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('jenis_identitas')); ?>:</b>
	<?php echo CHtml::encode($data->jenis_identitas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_identitas')); ?>:</b>
	<?php echo CHtml::encode($data->no_identitas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('umur')); ?>:</b>
	<?php echo CHtml::encode($data->umur); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jk')); ?>:</b>
	<?php echo CHtml::encode($data->jk); ?>
	<br />

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

	<b><?php echo CHtml::encode($data->getAttributeLabel('instansi_pekerjaan')); ?>:</b>
	<?php echo CHtml::encode($data->instansi_pekerjaan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('seksi_id')); ?>:</b>
	<?php echo CHtml::encode($data->seksi_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('role_id')); ?>:</b>
	<?php echo CHtml::encode($data->role_id); ?>
	<br />

	*/ ?>

</div>