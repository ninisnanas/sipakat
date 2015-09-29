<?php
/* @var $this UploadController */
/* @var $model Upload */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'upload-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<div class="form-row hide">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>30	,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="form-row hide">
		<?php echo $form->labelEx($model,'waktu'); ?>
		<?php echo $form->textField($model,'waktu'); ?>
		<?php echo $form->error($model,'waktu'); ?>
	</div>

	<div class="form-row hide">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="form-row">
		<?php echo $form->labelEx($model,'triwulan'); ?>
		<?php echo $form->dropDownList($model, 'triwulan', array(1=>'B03', 2=>'B06',3=>'B09',4=>'B12'));?>
		<?php echo $form->error($model,'triwulan'); ?>
	</div> 

	<div class="form-row">
		<?php echo $form->labelEx($model,'tahun'); ?>
		<?php echo $form->textField($model,'tahun'); ?>
		<?php echo $form->error($model,'tahun'); ?>
	</div>

	<div class="form-row">
		<?php echo $form->labelEx($model, 'file');
		echo $form->fileField($model, 'file');
		echo $form->error($model, 'file'); ?>
	</div>

	<?php 
		$model->username = Yii::app()->user->getName();
		echo $form->hiddenField($model,'username');
		$model->status = 0;
		echo $form->hiddenField($model,'status');
		$model->waktu = date("Y-m-d\TH:i:s\Z", time());
		echo $form->hiddenField($model,'waktu');
	?>

	<div class="form-row">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Unggah Laporan' : 'Save', array('class'=>'btn green push170')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->