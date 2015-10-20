<?php
/* @var $this PersonilController */
/* @var $model Personil */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'personil-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Field dengan <span class="required">*</span> harus diisi.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nama'); ?>
		<?php echo $form->textField($model,'nama',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'nama'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jabatan'); ?>
		<?php echo $form->textField($model,'jabatan',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'jabatan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nip'); ?>
		<?php echo $form->textField($model,'nip',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'nip'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Pangkat /Golongan'); ?>
		<?php echo $form->textField($model,'pangkat',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'pangkat'); ?>
	</div>

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
		<?php echo $form->error($model,'kode_kabkot'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'background'); ?>
		<?php echo $form->textField($model,'background',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'background'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'training'); ?>
		<?php echo $form->textField($model,'training',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'training'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php 
			$options=array(0=>'Tidak Aktif', 1=>'Aktif');
		echo $form->dropDownList($model, 'status', $options, array('empty' => 'Pilih Status')); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Selesai' : 'Simpan', array('style'=>'width:100px; margin-left:360px; margin-top:10px;')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->