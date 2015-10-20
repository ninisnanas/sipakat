<?php
/* @var $this DetailKegiatanController */
/* @var $model DetailKegiatan */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'detail-kegiatan-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Field dengan <span class="required">*</span> harus diisi.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nama'); ?>
		<?php echo $form->textField($model,'nama',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'nama'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Warna'); ?>
		<?php $listwarna = WarnaKegiatan::model()->getListWarna();
				$items = $listwarna['items'];
				$options = $listwarna['options']; ?>
		<?php echo $form->dropDownList($model, 'kode', $items, $options); ?>
		<?php echo $form->error($model,'kode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'anggaran'); ?>
		<?php echo $form->textField($model,'anggaran',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'anggaran'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'persen_anggaran'); ?>
		<?php echo $form->textField($model,'persen_anggaran'); ?>
		<?php echo $form->error($model,'persen_anggaran'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'waktu'); ?>
		<?php echo $form->textField($model,'waktu',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'waktu'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'persen_waktu'); ?>
		<?php echo $form->textField($model,'persen_waktu'); ?>
		<?php echo $form->error($model,'persen_waktu'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Jan M1'); ?>
		<?php echo $form->textField($model,'w11'); ?>
		<?php echo $form->error($model,'w11'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Jan M2'); ?>
		<?php echo $form->textField($model,'w12'); ?>
		<?php echo $form->error($model,'w12'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Jan M3'); ?>
		<?php echo $form->textField($model,'w13'); ?>
		<?php echo $form->error($model,'w13'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Jan M4'); ?>
		<?php echo $form->textField($model,'w14'); ?>
		<?php echo $form->error($model,'w14'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Feb M1'); ?>
		<?php echo $form->textField($model,'w21'); ?>
		<?php echo $form->error($model,'w21'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Feb M2'); ?>
		<?php echo $form->textField($model,'w22'); ?>
		<?php echo $form->error($model,'w22'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Feb M3'); ?>
		<?php echo $form->textField($model,'w23'); ?>
		<?php echo $form->error($model,'w23'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Feb M4'); ?>
		<?php echo $form->textField($model,'w24'); ?>
		<?php echo $form->error($model,'w24'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Mar M1'); ?>
		<?php echo $form->textField($model,'w31'); ?>
		<?php echo $form->error($model,'w31'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Mar M2'); ?>
		<?php echo $form->textField($model,'w32'); ?>
		<?php echo $form->error($model,'w32'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Mar M3'); ?>
		<?php echo $form->textField($model,'w33'); ?>
		<?php echo $form->error($model,'w33'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Mar M4'); ?>
		<?php echo $form->textField($model,'w34'); ?>
		<?php echo $form->error($model,'w34'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Apr M1'); ?>
		<?php echo $form->textField($model,'w41'); ?>
		<?php echo $form->error($model,'w41'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Apr M2'); ?>
		<?php echo $form->textField($model,'w42'); ?>
		<?php echo $form->error($model,'w42'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Apr M3'); ?>
		<?php echo $form->textField($model,'w43'); ?>
		<?php echo $form->error($model,'w43'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Apr M4'); ?>
		<?php echo $form->textField($model,'w44'); ?>
		<?php echo $form->error($model,'w44'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Mei M1'); ?>
		<?php echo $form->textField($model,'w51'); ?>
		<?php echo $form->error($model,'w51'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Mei M2'); ?>
		<?php echo $form->textField($model,'w52'); ?>
		<?php echo $form->error($model,'w52'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Mei M3'); ?>
		<?php echo $form->textField($model,'w53'); ?>
		<?php echo $form->error($model,'w53'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Mei M4'); ?>
		<?php echo $form->textField($model,'w54'); ?>
		<?php echo $form->error($model,'w54'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Jun M1'); ?>
		<?php echo $form->textField($model,'w61'); ?>
		<?php echo $form->error($model,'w61'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Jun M2'); ?>
		<?php echo $form->textField($model,'w62'); ?>
		<?php echo $form->error($model,'w62'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Jun M3'); ?>
		<?php echo $form->textField($model,'w63'); ?>
		<?php echo $form->error($model,'w63'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Jun M4'); ?>
		<?php echo $form->textField($model,'w64'); ?>
		<?php echo $form->error($model,'w64'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Jul M1'); ?>
		<?php echo $form->textField($model,'w71'); ?>
		<?php echo $form->error($model,'w71'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Jul M2'); ?>
		<?php echo $form->textField($model,'w72'); ?>
		<?php echo $form->error($model,'w72'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Jul M3'); ?>
		<?php echo $form->textField($model,'w73'); ?>
		<?php echo $form->error($model,'w73'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Jul M4'); ?>
		<?php echo $form->textField($model,'w74'); ?>
		<?php echo $form->error($model,'w74'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Agu M1'); ?>
		<?php echo $form->textField($model,'w81'); ?>
		<?php echo $form->error($model,'w81'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Agu M2'); ?>
		<?php echo $form->textField($model,'w82'); ?>
		<?php echo $form->error($model,'w82'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Agu M3'); ?>
		<?php echo $form->textField($model,'w83'); ?>
		<?php echo $form->error($model,'w83'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Agu M4'); ?>
		<?php echo $form->textField($model,'w84'); ?>
		<?php echo $form->error($model,'w84'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Sep M1'); ?>
		<?php echo $form->textField($model,'w91'); ?>
		<?php echo $form->error($model,'w91'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Sep M2'); ?>
		<?php echo $form->textField($model,'w92'); ?>
		<?php echo $form->error($model,'w92'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Sep M3'); ?>
		<?php echo $form->textField($model,'w93'); ?>
		<?php echo $form->error($model,'w93'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Sep M4'); ?>
		<?php echo $form->textField($model,'w94'); ?>
		<?php echo $form->error($model,'w94'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Okt M1'); ?>
		<?php echo $form->textField($model,'w101'); ?>
		<?php echo $form->error($model,'w101'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Okt M2'); ?>
		<?php echo $form->textField($model,'w102'); ?>
		<?php echo $form->error($model,'w102'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Okt M3'); ?>
		<?php echo $form->textField($model,'w103'); ?>
		<?php echo $form->error($model,'w103'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Okt M4'); ?>
		<?php echo $form->textField($model,'w104'); ?>
		<?php echo $form->error($model,'w104'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Nov M1'); ?>
		<?php echo $form->textField($model,'w111'); ?>
		<?php echo $form->error($model,'w111'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Nov M2'); ?>
		<?php echo $form->textField($model,'w112'); ?>
		<?php echo $form->error($model,'w112'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Nov M3'); ?>
		<?php echo $form->textField($model,'w113'); ?>
		<?php echo $form->error($model,'w113'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Nov M4'); ?>
		<?php echo $form->textField($model,'w114'); ?>
		<?php echo $form->error($model,'w114'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Des M1'); ?>
		<?php echo $form->textField($model,'w121'); ?>
		<?php echo $form->error($model,'w121'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Des M2'); ?>
		<?php echo $form->textField($model,'w122'); ?>
		<?php echo $form->error($model,'w122'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Des M3'); ?>
		<?php echo $form->textField($model,'w123'); ?>
		<?php echo $form->error($model,'w123'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Des M4'); ?>
		<?php echo $form->textField($model,'w124'); ?>
		<?php echo $form->error($model,'w124'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Selesai' : 'Simpan', array('style'=>'width:100px; margin-left:360px; margin-top:10px;')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->