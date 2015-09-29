<?php
/* @var $this PropinsiController */
/* @var $model Propinsi */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'propinsi-form',
	'enableAjaxValidation'=>true,
)); ?>

	<div class="form-row">
	  <span class="text red push170">* wajib diisi</span>
	</div>

	<div class="form-row">
		<?php echo $form->labelEx($model,'nama'); ?>
		<?php echo $form->textField($model,'nama',array('size'=>30,'maxlength'=>30,'class'=>'long')); ?>
		<?php echo $form->error($model,'nama'); ?>
	</div>

	<div class="form-row">
		<?php echo $form->labelEx($model,'alamat'); ?>
		<?php echo $form->textArea($model,'alamat',array('rows'=>6, 'cols'=>50,'class'=>'long')); ?>
		<?php echo $form->error($model,'alamat'); ?>
	</div>

	<div class="form-row">
		<?php echo $form->labelEx($model,'telp1'); ?>
		<?php echo $form->textField($model,'telp1',array('size'=>12,'maxlength'=>12,'class'=>'long')); ?>
		<?php echo $form->error($model,'telp1'); ?>
	</div>
	<!-- Ini testing buat dropdown list
	<div class="form-row row">
		<?php //echo $form->dropDownList($model,'telp1',array('adit','sangat','tampan')); ?>
	</div>
	!-->
	<div class="form-row row">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Buat Provinsi' : 'Save',array('class'=>'btn green push170')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->