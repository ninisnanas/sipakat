<?php
/* @var $this PuskesmasController */
/* @var $model Puskesmas */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'puskesmas-form',
	'enableAjaxValidation'=>true,
)); ?>

	<div class="form-row">
	  <span class="text red push170">* wajib diisi</span>
	</div>

	<div class="form-row row">
		<?php echo $form->labelEx($model,'kode_prov'); ?>
		<?php echo $form->dropDownList($model, 'kode_prov', Propinsi::model()->getProvinsiList(),
			array('empty' => 'Pilih Provinsi',
				'ajax' => array(
					'type' => 'POST',
					'url' => CController::createUrl('kabupaten/dinamis'),
					'data' => array('kode_provinsi' => 'js:this.value'),
					'update' => '#'.CHtml::activeId($model, 'kode_kabkot'),
					))); ?>
		<?php echo $form->error($model,'kode_prov'); ?>
	</div>

	<div class="form-row row">
		<?php echo $form->labelEx($model,'kode_kabkot'); ?>
		<?php
			if($model->kode_prov!='') {
				//$data = KabupatenController::getListKab($model->kode_prov);
				//echo var_dump($data);
				//die();
				echo $form->dropDownList($model, 'kode_kabkot', array(KabupatenController::getListKab($model->kode_prov)), array('empty' => 'Pilih Kabupaten'));
			} else {
				echo $form->dropDownList($model, 'kode_kabkot', array(), array('empty' => 'Pilih Kabupaten'));
			}
		?>
		<?php echo $form->error($model,'kode_kabkot'); ?>
	</div>

	<div class="form-row row">
		<?php echo $form->labelEx($model,'nama'); ?>
		<?php echo $form->textField($model,'nama',array('size'=>20,'maxlength'=>20, 'class'=>'long')); ?>
		<?php echo $form->error($model,'nama'); ?>
	</div>

	<div class="form-row row">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Buat Puskesmas' : 'Save', array('class'=>'btn green push170')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->