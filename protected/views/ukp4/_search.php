<?php
/* @var $this Ukp4Controller */
/* @var $model Ukp4 */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'kode_lap'); ?>
		<?php echo $form->textField($model,'kode_lap'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'kode_prop'); ?>
		<?php echo $form->textField($model,'kode_prop'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'kode_kab'); ?>
		<?php echo $form->textField($model,'kode_kab'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'triwulan'); ?>
		<?php echo $form->textField($model,'triwulan'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tahun'); ?>
		<?php echo $form->textField($model,'tahun'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->