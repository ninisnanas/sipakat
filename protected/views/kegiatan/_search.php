<?php
/* @var $this KegiatanController */
/* @var $model Kegiatan */
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
		<?php echo $form->label($model,'nama'); ?>
		<?php echo $form->textField($model,'nama',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_bidang'); ?>
		<?php echo $form->textField($model,'id_bidang'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'anggaran'); ?>
		<?php echo $form->textField($model,'anggaran'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'persen_anggaran'); ?>
		<?php echo $form->textField($model,'persen_anggaran'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'waktu'); ?>
		<?php echo $form->textField($model,'waktu',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'persen_waktu'); ?>
		<?php echo $form->textField($model,'persen_waktu'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->