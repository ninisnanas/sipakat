<?php
/* @var $this Ukp4LineItemController */
/* @var $model Ukp4LineItem */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'kode_lap'); ?>
		<?php echo $form->textField($model,'kode_lap'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'kode_obat'); ?>
		<?php echo $form->textField($model,'kode_obat'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'kebutuhan'); ?>
		<?php echo $form->textField($model,'kebutuhan'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'total_penggunaan'); ?>
		<?php echo $form->textField($model,'total_penggunaan'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sisa_stok'); ?>
		<?php echo $form->textField($model,'sisa_stok'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->