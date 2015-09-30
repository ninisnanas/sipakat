<?php
/* @var $this KegiatanPersonilController */
/* @var $data KegiatanPersonil */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_personil')); ?>:</b>
	<?php echo CHtml::encode($data->id_personil); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_detail_kegiatan')); ?>:</b>
	<?php echo CHtml::encode($data->id_detail_kegiatan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tahun')); ?>:</b>
	<?php echo CHtml::encode($data->tahun); ?>
	<br />


</div>