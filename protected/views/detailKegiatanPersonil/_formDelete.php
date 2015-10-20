<?php
/* @var $this DetailKegiatanPersonilController */
/* @var $model DetailKegiatanPersonil */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'detail-kegiatan-personil-form',
	'method'=>'get',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Nama Personil'); ?>
		<?php 
		$namapersonil = Personil::model()->findByPk($model->id_personil);
		echo CHtml::textField('namapersonil',$namapersonil['nama'], array('disabled'=>'disabled','class'=>'no-margin')); 
		?>
		<?php echo $form->error($model,'id_personil'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Detail Kegiatan'); $dk = 0; ?>
		<?php echo CHtml::dropDownList('dk', $dk, DetailKegiatan::model()->getKegiatanById($model->id_personil),
			array('empty' => 'Pilih Detail Kegiatan')); 
		?>
		<?php echo $form->error($model,'kode_bidang'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Hapus', array('class'=>'btn green delete', 'confirm'=>'Anda yakin untuk menghapus kegiatan personil?')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->