<?php
/* @var $this PropinsiController */
/* @var $data Propinsi */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('kode_prop')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->kode_prop), array('view', 'id'=>$data->kode_prop)); ?>
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


</div>