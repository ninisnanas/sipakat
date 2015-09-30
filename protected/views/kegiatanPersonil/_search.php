<?php
/* @var $this KegiatanPersonilController */
/* @var $model KegiatanPersonil */
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
		<?php echo $form->label($model,'id_personil'); ?>
		<?php echo $form->textField($model,'id_personil'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_detail_kegiatan'); ?>
		<?php echo $form->textField($model,'id_detail_kegiatan'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->