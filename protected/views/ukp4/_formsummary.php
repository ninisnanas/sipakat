<?php
/* @var $this Ukp4Controller */
/* @var $model Ukp4 */
/* @var $form CActiveForm */
?>
<div class="r-row">
	<div class="form-inline">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'ukp4-form',
		'method' => 'get',
		'enableAjaxValidation'=>true,
	)); ?>
	
	<div class="form-row column left">
		<?php echo $form->dropDownList($model,'tahun',CHtml::listData($tahun,'tahun','tahun'),array('empty' => 'Pilih Tahun', 'class' => 'no-margin')); ?><?php echo CHtml::submitButton('Search',array('class'=>'btn green')); ?>
	</div>

	<?php $this->endWidget(); ?>

	</div><!-- form -->
</div>