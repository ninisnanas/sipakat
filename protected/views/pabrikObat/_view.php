<?php
/* @var $this PabrikObatController */
/* @var $data PabrikObat */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('kode_pabrik')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->kode_pabrik), array('view', 'id'=>$data->kode_pabrik)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama')); ?>:</b>
	<?php echo CHtml::encode($data->nama); ?>
	<br />


</div>