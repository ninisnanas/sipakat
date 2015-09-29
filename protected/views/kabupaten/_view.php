<?php
/* @var $this KabupatenController */
/* @var $data Kabupaten */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('kode_kab')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->kode_kab), array('view', 'id'=>$data->kode_kab)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama')); ?>:</b>
	<?php echo CHtml::encode($data->nama); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alamat')); ?>:</b>
	<?php echo CHtml::encode($data->alamat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telp1')); ?>:</b>
	<?php echo CHtml::encode($data->telp1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kode_prop')); ?>:</b>
	<?php echo CHtml::encode($data->kode_prop); ?>
	<br />


</div>