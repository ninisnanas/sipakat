<?php
/* @var $this KegiatanPersonilController */
/* @var $model KegiatanPersonil */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'kegiatan-personil-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); $bidang=0; ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Bidang'); ?>
		<?php echo CHtml::dropDownList($bidang, 'bidang', Bidang::model()->getBidangList(),
			array('empty' => 'Pilih Bidang',
				'ajax' => array(
					'type' => 'POST',
					'url' => CController::createUrl('kegiatanPersonil/dinamis'),
					'data' => array('bidang' => 'js:this.value'),			
					'update' => '#'.CHtml::activeId($model, 'id_personil'),
					))); 
		?>
		<?php echo $form->error($model,'kode_bidang'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_personil'); ?>
		<?php
			if($bidang!='') {
				//$data = KabupatenController::getListKab($model->kode_prov);
				//echo var_dump($data);
				//die();
				echo $form->dropDownList($model, 'id_personil', array(PersonilController::getNamaPersonilByBidang($model->bidang)), array('empty' => 'Pilih Personil'));
			} else {
				echo $form->dropDownList($model, 'id_personil', array(), array('empty' => 'Pilih Personil'));
			}
		?>
		<?php echo $form->error($model,'id_personil'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_detail_kegiatan'); ?>
		<?php echo $form->textField($model,'id_detail_kegiatan'); ?>
		<?php echo $form->error($model,'id_detail_kegiatan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tahun'); ?>
		<?php echo $form->textField($model,'tahun',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'tahun'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->