<?php
/* @var $this AkunController */
/* @var $model Akun */
/* @var $form CActiveForm */
?>

<div>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'akun-form',
	'enableAjaxValidation'=>true,
)); ?>

	<div class="form-row">
    <p class="note">Field dengan <span class="required">*</span> harus diisi.</p>
  </div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>64,'maxlength'=>64, 'class'=>'long')); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'new_password'); ?>
		<?php echo $form->passwordField($model,'new_password',array('size'=>64,'maxlength'=>64, 'class'=>'long')); ?>
		<?php echo $form->error($model,'new_password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password_repeat'); ?>
		<?php echo $form->passwordField($model,'password_repeat',array('size'=>64,'maxlength'=>64, 'class'=>'long')); ?>
		<?php echo $form->error($model,'password_repeat'); ?>
	</div>

	<div class="form-row row" style="margin-top:20px; margin-left:130px;">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Buat Akun' : 'Simpan', array('class'=>'btn green push170')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->