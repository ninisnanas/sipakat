<?php
/* @var $this DetailKegiatanPersonilController */
/* @var $model DetailKegiatanPersonil */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'detail-kegiatan-personil-form',
	'method'=>'get',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Field dengan <span class="required">*</span> harus diisi.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Nama Personil'); ?>
		<?php 
		$namapersonil = Personil::model()->findByPk($model->id_personil);
		echo CHtml::textField('namapersonil',$namapersonil['nama'], array('disabled'=>'disabled')); 
		?>
		<?php echo $form->error($model,'id_personil'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Puskaji'); $puskaji = 0; ?>
		<?php echo CHtml::dropDownList('puskaji', $puskaji, Puskaji::model()->getPuskajiList(),
				array('empty' => 'Pilih Puskaji',
					'ajax' => array(
						'type' => 'POST',
						'url' => CController::createUrl('personil/dinamis'),
						'data' => array('puskaji' => 'js:this.value'),			
						'update' => '#bidang',
						))); 
		?>
		<?php echo $form->error($model,'kode_bidang'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Bidang'); $bidang = 0; ?>
		<?php if($puskaji!='') {
			echo var_dump("hhh");
					echo CHtml::dropDownList('bidang', $bidang, Bidang::model()->getBidangByPuskaji($puskaji),
						array('empty' => 'Pilih Bidang',
							'ajax' => array(
								'type' => 'POST',
								'url' => CController::createUrl('detailKegiatanPersonil/dinamis'),
								'data' => array('bidang' => 'js:this.value'),			
								'update' => '#id_detail_kegiatan',
								))); 
				} else {
					echo CHtml::dropDownList('bidang', $bidang, array(), array('empty' => 'Pilih Bidang',
							'ajax' => array(
								'type' => 'POST',
								'url' => CController::createUrl('detailKegiatanPersonil/dinamis'),
								'data' => array('bidang' => 'js:this.value'),			
								'update' => '#id_detail_kegiatan',
								)));;
				}
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
		<?php echo CHtml::submitButton('Tambah', array('class'=>'btn green', 'style'=>'margin-left:400px; margin-top:10px;')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->