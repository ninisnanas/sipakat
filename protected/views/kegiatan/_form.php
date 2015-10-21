<?php
/* @var $this KegiatanController */
/* @var $model Kegiatan */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'kegiatan-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Field dengan <span class="required">*</span> harus diisi.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nama'); ?>
		<?php echo $form->textField($model,'nama',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'nama'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'puskaji'); ?>
		<?php echo $form->dropDownList($model, 'puskaji', Puskaji::model()->getPuskajiList(),
			array('empty' => 'Pilih Puskaji',
				'ajax' => array(
					'type' => 'POST',
					'url' => CController::createUrl('personil/dinamisForm'),
					'data' => array('puskaji' => 'js:this.value'),
					'update' => '#'.CHtml::activeId($model, 'id_bidang'),
					))); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_bidang'); ?>
		<?php
			if($model->puskaji!='') {
				echo $form->dropDownList($model, 'id_bidang', Bidang::getListBidangByPuskaji($model->puskaji), array('empty' => 'Pilih Bidang'));
			} else {
				echo $form->dropDownList($model, 'id_bidang', array(), array('empty' => 'Pilih Bidang'));
			}
		?>
		<?php echo $form->error($model,'id_bidang'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tahun'); ?>
		<?php echo $form->textField($model,'tahun',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'tahun'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'waktu'); ?>
		<?php echo $form->textField($model,'waktu',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'waktu'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Nomor Surat Perintah'); ?>
		<?php echo $form->textField($model,'nomor_sp',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'nomor_sp'); ?>
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Selesai' : 'Simpan', array('style'=>'width:100px; margin-left:360px; margin-top:10px;')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->