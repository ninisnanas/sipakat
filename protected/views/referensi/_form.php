<?php
/* @var $this ReferensiController */
/* @var $model Referensi */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'referensi-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'puskaji'); ?>
		<?php echo $form->dropDownList($model, 'puskaji', Puskaji::model()->getPuskajiList(),
			array('empty' => 'Pilih Puskaji',
				'ajax' => array(
					'type' => 'POST',
					'url' => CController::createUrl('personil/dinamisForm'),
					'data' => array('puskaji' => 'js:this.value'),
					'update' => '#'.CHtml::activeId($model, 'bidang'),
					))); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bidang'); ?>
		<?php
			if($model->puskaji!='') {
				echo $form->dropDownList($model, 'bidang', Bidang::getListBidangByPuskaji($model->puskaji), array('empty' => 'Pilih Bidang'));
			} else {
				echo $form->dropDownList($model, 'bidang', array(), array('empty' => 'Pilih Bidang'));
			}
		?>
		<?php echo $form->error($model,'bidang'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'nama'); ?>
		<?php echo $form->textField($model,'nama',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'nama'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tahun'); ?>
		<?php echo $form->textField($model,'tahun',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'tahun'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'file');
		echo $form->fileField($model, 'file', array('style'=>'margin-left:310px;'));
		echo $form->error($model, 'file'); ?>
	</div>

	<?php 
		$model->timestamp = new CDbExpression('NOW()');
		echo $form->hiddenField($model,'timestamp');
	?>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Selesai' : 'Simpan', array('style'=>'width:100px; margin-left:360px; margin-top:10px;')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->