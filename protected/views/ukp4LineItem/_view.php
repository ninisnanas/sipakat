<?php
/* @var $this Ukp4LineItemController */
/* @var $data Ukp4LineItem */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kode_lap')); ?>:</b>
	<?php echo CHtml::encode($data->kode_lap); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kode_obat')); ?>:</b>
	<?php echo CHtml::encode($data->kode_obat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kebutuhan')); ?>:</b>
	<?php echo CHtml::encode($data->kebutuhan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total_penggunaan')); ?>:</b>
	<?php echo CHtml::encode($data->total_penggunaan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sisa_stok')); ?>:</b>
	<?php echo CHtml::encode($data->sisa_stok); ?>
	<br />


</div>