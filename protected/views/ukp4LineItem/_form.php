<?php
/* @var $this Ukp4LineItemController */
/* @var $model Ukp4LineItem */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ukp4-line-item-form',
	'enableAjaxValidation'=>false,
)); ?>

	<div class="form-row">
    <span class="text red push170">* wajib diisi</span>
  </div>

	<div class="form-row row">
		<?php echo $form->labelEx($model,'kode_lap'); ?>
		<?php echo $form->textField($model,'kode_lap', array('readonly' => true,)); ?>
		<?php echo $form->error($model,'kode_lap'); ?>
	</div>

	<div class="form-row row">
		<?php echo $form->labelEx($model,'kode_obat'); ?>
		<?php echo $form->textField($model,'kode_obat', array('readonly' => true,)); ?>
		<?php echo $form->error($model,'kode_obat'); ?>
	</div>

	<div class="form-row row">
		<?php echo $form->labelEx($model,'kebutuhan'); ?>
		<?php echo $form->textField($model,'kebutuhan'); ?>
		<?php echo $form->error($model,'kebutuhan'); ?>
	</div>

	<div class="form-row row">
		<?php echo $form->labelEx($model,'total_penggunaan'); ?>
		<?php echo $form->textField($model,'total_penggunaan'); ?>
		<?php echo $form->error($model,'total_penggunaan'); ?>
	</div>

	<div class="form-row row">
		<?php echo $form->labelEx($model,'sisa_stok'); ?>
		<?php echo $form->textField($model,'sisa_stok'); ?>
		<?php echo $form->error($model,'sisa_stok'); ?>
	</div>

	<div class="form-row row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn green push170')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->