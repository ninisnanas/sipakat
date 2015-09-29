<?php
/* @var $this Ukp4MasterController */
/* @var $data Ukp4Master */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kode_obat')); ?>:</b>
	<?php echo CHtml::encode($data->kode_obat); ?>
	<br />


</div>