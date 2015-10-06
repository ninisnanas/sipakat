<?php
/* @var $this DetailKegiatanPersonilController */
/* @var $model DetailKegiatanPersonil */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'detail-kegiatan-personil-form',
	'method'=>'get',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Nama Personil'); ?>
		<?php 
		$namapersonil = Personil::model()->findByPk($model->id_personil);
		echo CHtml::textField('namapersonil',$namapersonil['nama'], array('disabled'=>'disabled','class'=>'no-margin')); 
		?>
		<?php echo $form->error($model,'id_personil'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Puskaji'); $bidang = 0; ?>
		<?php echo CHtml::dropDownList($bidang, 'bidang', Bidang::model()->getBidangList(),
			array('empty' => 'Pilih Puskaji',
				'ajax' => array(
					'type' => 'POST',
					'url' => CController::createUrl('detailKegiatanPersonil/dinamis'),
					'data' => array('bidang' => 'js:this.value'),			
					'update' => '#id_detail_kegiatan',
					))); 
		?>
		<?php echo $form->error($model,'kode_bidang'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Nama Kegiatan'); ?>
		<?php
			if($bidang!='') {
				//$data = KabupatenController::getListKab($model->kode_prov);
				//echo var_dump($data);
				//die();
				echo CHtml::dropDownList('id_detail_kegiatan', 'id_detail_kegiatan', array(DetailKegiatan::getDetailKegiatanByBidang($bidang)), array('empty' => 'Pilih Detail Kegiatan'));
			} else {
				echo CHtml::dropDownList('id_detail_kegiatan', 'id_detail_kegiatan', array(), array('empty' => 'Pilih Detail Kegiatan'));
			}
		?>
		<?php echo $form->error($model,'id_personil'); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton('Tambah', array('class'=>'btn green')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->