<?php
/* @var $this PersonilController */
/* @var $model Personil */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'personil-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nama'); ?>
		<?php echo $form->textField($model,'nama',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'nama'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jabatan'); ?>
		<?php echo $form->textField($model,'jabatan',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'jabatan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nip'); ?>
		<?php echo $form->textField($model,'nip',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'nip'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pangkat'); ?>
		<?php echo $form->textField($model,'pangkat',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'pangkat'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bidang'); ?>
		<?php echo $form->textField($model,'bidang'); ?>
		<?php echo $form->error($model,'bidang'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'background'); ?>
		<?php echo $form->textField($model,'background',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'background'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'training'); ?>
		<?php echo $form->textField($model,'training',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'training'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->