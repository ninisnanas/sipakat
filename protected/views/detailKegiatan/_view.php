<?php
/* @var $this DetailKegiatanController */
/* @var $data DetailKegiatan */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_kegiatan')); ?>:</b>
	<?php echo CHtml::encode($data->id_kegiatan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama')); ?>:</b>
	<?php echo CHtml::encode($data->nama); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kode')); ?>:</b>
	<?php echo CHtml::encode($data->kode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('anggaran')); ?>:</b>
	<?php echo CHtml::encode($data->anggaran); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('persen_anggaran')); ?>:</b>
	<?php echo CHtml::encode($data->persen_anggaran); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('waktu')); ?>:</b>
	<?php echo CHtml::encode($data->waktu); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('persen_waktu')); ?>:</b>
	<?php echo CHtml::encode($data->persen_waktu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('w11')); ?>:</b>
	<?php echo CHtml::encode($data->w11); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('w12')); ?>:</b>
	<?php echo CHtml::encode($data->w12); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('w13')); ?>:</b>
	<?php echo CHtml::encode($data->w13); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('w14')); ?>:</b>
	<?php echo CHtml::encode($data->w14); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('w21')); ?>:</b>
	<?php echo CHtml::encode($data->w21); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('w22')); ?>:</b>
	<?php echo CHtml::encode($data->w22); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('w23')); ?>:</b>
	<?php echo CHtml::encode($data->w23); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('w24')); ?>:</b>
	<?php echo CHtml::encode($data->w24); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('w31')); ?>:</b>
	<?php echo CHtml::encode($data->w31); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('w32')); ?>:</b>
	<?php echo CHtml::encode($data->w32); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('w33')); ?>:</b>
	<?php echo CHtml::encode($data->w33); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('w34')); ?>:</b>
	<?php echo CHtml::encode($data->w34); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('w41')); ?>:</b>
	<?php echo CHtml::encode($data->w41); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('w42')); ?>:</b>
	<?php echo CHtml::encode($data->w42); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('w43')); ?>:</b>
	<?php echo CHtml::encode($data->w43); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('w44')); ?>:</b>
	<?php echo CHtml::encode($data->w44); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('w51')); ?>:</b>
	<?php echo CHtml::encode($data->w51); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('w52')); ?>:</b>
	<?php echo CHtml::encode($data->w52); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('w53')); ?>:</b>
	<?php echo CHtml::encode($data->w53); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('w54')); ?>:</b>
	<?php echo CHtml::encode($data->w54); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('w61')); ?>:</b>
	<?php echo CHtml::encode($data->w61); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('w62')); ?>:</b>
	<?php echo CHtml::encode($data->w62); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('w63')); ?>:</b>
	<?php echo CHtml::encode($data->w63); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('w64')); ?>:</b>
	<?php echo CHtml::encode($data->w64); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('w71')); ?>:</b>
	<?php echo CHtml::encode($data->w71); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('w72')); ?>:</b>
	<?php echo CHtml::encode($data->w72); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('w73')); ?>:</b>
	<?php echo CHtml::encode($data->w73); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('w74')); ?>:</b>
	<?php echo CHtml::encode($data->w74); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('w81')); ?>:</b>
	<?php echo CHtml::encode($data->w81); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('w82')); ?>:</b>
	<?php echo CHtml::encode($data->w82); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('w83')); ?>:</b>
	<?php echo CHtml::encode($data->w83); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('w84')); ?>:</b>
	<?php echo CHtml::encode($data->w84); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('w91')); ?>:</b>
	<?php echo CHtml::encode($data->w91); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('w92')); ?>:</b>
	<?php echo CHtml::encode($data->w92); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('w93')); ?>:</b>
	<?php echo CHtml::encode($data->w93); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('w94')); ?>:</b>
	<?php echo CHtml::encode($data->w94); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('w101')); ?>:</b>
	<?php echo CHtml::encode($data->w101); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('w102')); ?>:</b>
	<?php echo CHtml::encode($data->w102); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('w103')); ?>:</b>
	<?php echo CHtml::encode($data->w103); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('w104')); ?>:</b>
	<?php echo CHtml::encode($data->w104); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('w111')); ?>:</b>
	<?php echo CHtml::encode($data->w111); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('w112')); ?>:</b>
	<?php echo CHtml::encode($data->w112); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('w113')); ?>:</b>
	<?php echo CHtml::encode($data->w113); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('w114')); ?>:</b>
	<?php echo CHtml::encode($data->w114); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('w121')); ?>:</b>
	<?php echo CHtml::encode($data->w121); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('w122')); ?>:</b>
	<?php echo CHtml::encode($data->w122); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('w123')); ?>:</b>
	<?php echo CHtml::encode($data->w123); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('w124')); ?>:</b>
	<?php echo CHtml::encode($data->w124); ?>
	<br />

	*/ ?>

</div>