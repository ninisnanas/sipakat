<?php
/* @var $this KegiatanController */
/* @var $model Kegiatan */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'kegiatan-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nama'); ?>
		<?php echo $form->textField($model,'nama',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'nama'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_bidang'); ?>
		<?php echo $form->dropDownList($model, 'id_bidang', Bidang::model()->getBidangList(),
			array('empty' => 'Pilih Bidang')); ?>
		<?php echo $form->error($model,'id_bidang'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tahun'); ?>
		<?php echo $form->textField($model,'tahun',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'tahun'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'anggaran'); ?>
		<?php echo $form->textField($model,'anggaran'); ?>
		<?php echo $form->error($model,'anggaran'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'persen_anggaran'); ?>
		<?php echo $form->textField($model,'persen_anggaran'); ?>
		<?php echo $form->error($model,'persen_anggaran'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'waktu'); ?>
		<?php echo $form->textField($model,'waktu',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'waktu'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'persen_waktu'); ?>
		<?php echo $form->textField($model,'persen_waktu'); ?>
		<?php echo $form->error($model,'persen_waktu'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->