<?php
/* @var $this PuskesmasController */
/* @var $model Puskesmas */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'kode_prov'); ?>
		<?php echo $form->textField($model,'kode_prov'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'kode_kabkot'); ?>
		<?php echo $form->textField($model,'kode_kabkot'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'kode'); ?>
		<?php echo $form->textField($model,'kode'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nama'); ?>
		<?php echo $form->textField($model,'nama',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->