<?php
/* @var $this AkunController */
/* @var $data Akun */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->username), array('view', 'id'=>$data->username)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telp')); ?>:</b>
	<?php echo CHtml::encode($data->telp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kode_role')); ?>:</b>
	<?php echo Akun::model()->getRole($data['kode_role']); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kode_provinsi')); ?>:</b>
	<?php echo CHtml::encode($data->kode_provinsi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kode_kabkot')); ?>:</b>
	<?php echo CHtml::encode($data->kode_kabkot); ?>
	<br />


</div>