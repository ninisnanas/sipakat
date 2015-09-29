<?php
/* @var $this DetailKegiatanController */
/* @var $model DetailKegiatan */
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
		<?php echo $form->label($model,'id_kegiatan'); ?>
		<?php echo $form->textField($model,'id_kegiatan'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nama'); ?>
		<?php echo $form->textField($model,'nama',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'kode'); ?>
		<?php echo $form->textField($model,'kode',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'anggaran'); ?>
		<?php echo $form->textField($model,'anggaran',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'persen_anggaran'); ?>
		<?php echo $form->textField($model,'persen_anggaran'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'waktu'); ?>
		<?php echo $form->textField($model,'waktu',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'persen_waktu'); ?>
		<?php echo $form->textField($model,'persen_waktu'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'w11'); ?>
		<?php echo $form->textField($model,'w11'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'w12'); ?>
		<?php echo $form->textField($model,'w12'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'w13'); ?>
		<?php echo $form->textField($model,'w13'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'w14'); ?>
		<?php echo $form->textField($model,'w14'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'w21'); ?>
		<?php echo $form->textField($model,'w21'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'w22'); ?>
		<?php echo $form->textField($model,'w22'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'w23'); ?>
		<?php echo $form->textField($model,'w23'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'w24'); ?>
		<?php echo $form->textField($model,'w24'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'w31'); ?>
		<?php echo $form->textField($model,'w31'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'w32'); ?>
		<?php echo $form->textField($model,'w32'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'w33'); ?>
		<?php echo $form->textField($model,'w33'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'w34'); ?>
		<?php echo $form->textField($model,'w34'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'w41'); ?>
		<?php echo $form->textField($model,'w41'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'w42'); ?>
		<?php echo $form->textField($model,'w42'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'w43'); ?>
		<?php echo $form->textField($model,'w43'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'w44'); ?>
		<?php echo $form->textField($model,'w44'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'w51'); ?>
		<?php echo $form->textField($model,'w51'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'w52'); ?>
		<?php echo $form->textField($model,'w52'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'w53'); ?>
		<?php echo $form->textField($model,'w53'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'w54'); ?>
		<?php echo $form->textField($model,'w54'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'w61'); ?>
		<?php echo $form->textField($model,'w61'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'w62'); ?>
		<?php echo $form->textField($model,'w62'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'w63'); ?>
		<?php echo $form->textField($model,'w63'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'w64'); ?>
		<?php echo $form->textField($model,'w64'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'w71'); ?>
		<?php echo $form->textField($model,'w71'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'w72'); ?>
		<?php echo $form->textField($model,'w72'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'w73'); ?>
		<?php echo $form->textField($model,'w73'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'w74'); ?>
		<?php echo $form->textField($model,'w74'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'w81'); ?>
		<?php echo $form->textField($model,'w81'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'w82'); ?>
		<?php echo $form->textField($model,'w82'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'w83'); ?>
		<?php echo $form->textField($model,'w83'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'w84'); ?>
		<?php echo $form->textField($model,'w84'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'w91'); ?>
		<?php echo $form->textField($model,'w91'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'w92'); ?>
		<?php echo $form->textField($model,'w92'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'w93'); ?>
		<?php echo $form->textField($model,'w93'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'w94'); ?>
		<?php echo $form->textField($model,'w94'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'w101'); ?>
		<?php echo $form->textField($model,'w101'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'w102'); ?>
		<?php echo $form->textField($model,'w102'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'w103'); ?>
		<?php echo $form->textField($model,'w103'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'w104'); ?>
		<?php echo $form->textField($model,'w104'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'w111'); ?>
		<?php echo $form->textField($model,'w111'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'w112'); ?>
		<?php echo $form->textField($model,'w112'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'w113'); ?>
		<?php echo $form->textField($model,'w113'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'w114'); ?>
		<?php echo $form->textField($model,'w114'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'w121'); ?>
		<?php echo $form->textField($model,'w121'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'w122'); ?>
		<?php echo $form->textField($model,'w122'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'w123'); ?>
		<?php echo $form->textField($model,'w123'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'w124'); ?>
		<?php echo $form->textField($model,'w124'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->