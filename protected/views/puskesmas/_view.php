<?php
/* @var $this PuskesmasController */
/* @var $data Puskesmas */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('kode')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Kode), array('view', 'id'=>$data->Kode)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kode_prov')); ?>:</b>
	<?php echo CHtml::encode($data->Kode_prov); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kode_kabkot')); ?>:</b>
	<?php echo CHtml::encode($data->Kode_kabkot); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama')); ?>:</b>
	<?php echo CHtml::encode($data->Nama); ?>
	<br />


</div>