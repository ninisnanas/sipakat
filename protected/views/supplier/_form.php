<?php
/* @var $this SupplierController */
/* @var $model Supplier */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'supplier-form',
	'enableAjaxValidation'=>true,
)); ?>

	<div class="form-row">
    <span class="text red push170">* wajib diisi</span>
  </div>

	<div class="form-row row">
		<?php echo $form->labelEx($model,'nama'); ?>
		<?php echo $form->textField($model,'nama',array('size'=>30,'maxlength'=>30, 'class'=>'long')); ?>
		<?php echo $form->error($model,'nama'); ?>
	</div>

	<div class="form-row row">
		<?php echo $form->labelEx($model,'telepon'); ?>
		<?php echo $form->textField($model,'telepon',array('size'=>12,'maxlength'=>12, 'class'=>'long')); ?>
		<?php echo $form->error($model,'telepon'); ?>
	</div>

	<div class="form-row row">
		<?php echo $form->labelEx($model,'alamat'); ?>
		<?php echo $form->textArea($model,'alamat',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'alamat'); ?>
	</div>

	<div class="form-row row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Buat Supplier' : 'Save',array('class'=>'btn green push170')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->