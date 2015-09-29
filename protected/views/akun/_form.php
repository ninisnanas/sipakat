<?php
/* @var $this AkunController */
/* @var $model Akun */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'akun-form',
	'enableAjaxValidation'=>true,
)); ?>

	<div class="form-row">
    <span class="text red push170">* wajib diisi</span>
  </div>

	<div class="form-row row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>30,'maxlength'=>30, 'class'=>'long')); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="form-row row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>64,'maxlength'=>64, 'class'=>'long')); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="form-row row">
		<?php echo $form->labelEx($model,'nama'); ?>
		<?php echo $form->textField($model,'nama',array('size'=>50,'maxlength'=>50, 'class'=>'long')); ?>
		<?php echo $form->error($model,'nama'); ?>
	</div>

	<div class="form-row row">
		<?php echo $form->labelEx($model,'nip'); ?>
		<?php echo $form->textField($model,'nip',array('size'=>18,'maxlength'=>18, 'class'=>'long')); ?>
		<?php echo $form->error($model,'nip'); ?>
	</div>

	<div class="form-row row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>30,'maxlength'=>30, 'class'=>'long')); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="form-row row">
		<?php echo $form->labelEx($model,'telp'); ?>
		<?php echo $form->textField($model,'telp',array('size'=>30,'maxlength'=>30, 'class'=>'long')); ?>
		<?php echo $form->error($model,'telp'); ?>
	</div>
	
	<div class="form-row row">
		<?php echo $form->labelEx($model,'kode_role'); ?>
		<?php echo $form->dropDownList($model,'kode_role', Akun::getRoleList(),array('empty' => 'Pilih Role')); ?>
		<?php echo $form->error($model,'kode_role'); ?>
	</div>

	<div class="form-row row">
		<?php echo $form->labelEx($model,'kode_provinsi'); ?>
		<?php echo $form->dropDownList($model, 'kode_provinsi', Propinsi::model()->getProvinsiList(),
			array('empty' => 'Pilih Provinsi',
				'ajax' => array(
					'type' => 'POST',
					'url' => CController::createUrl('kabupaten/dinamis'),
					'data' => array('kode_provinsi' => 'js:this.value'),
					'update' => '#'.CHtml::activeId($model, 'kode_kabkot'),
					))); ?>
		<?php echo $form->error($model,'kode_provinsi'); ?>
	</div>

	<div class="form-row row">
		<?php echo $form->labelEx($model,'kode_kabkot'); ?>
		<?php
			if($model->kode_provinsi!='') {
				echo $form->dropDownList($model, 'kode_kabkot', KabupatenController::getListKab($model->kode_provinsi), array('empty' => 'Pilih Kabupaten'));
			} else {
				echo $form->dropDownList($model, 'kode_kabkot', array(), array('empty' => 'Pilih Kabupaten'));
			}
		?>
		<?php echo $form->error($model,'kode_kabkot'); ?>
	</div>

	<div class="form-row row">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Buat Akun' : 'Save', array('class'=>'btn green push170')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->