<?php
/* @var $this AkunController */
/* @var $model Akun */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'akun-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

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
								'url' => CController::createUrl('personil/dinamisFormAkun'),
								'data' => array('bidang' => 'js:this.value'),			
								'update' => '#'.CHtml::activeId($model, 'id_personil'),
								)));;
				}
		?>
		<?php echo $form->error($model,'kode_bidang'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'personil'); ?>
		<?php
			if($model->id_personil!='') {
				//$data = KabupatenController::getListKab($model->kode_prov);
				//echo var_dump($data);
				//die();
				$bidang = Personil::model()->findByAttributes(array('bidang' => $bidang));
				echo $form->dropDownList($model, 'id_personil', array(Personil::getPersonilByBidang($bidang)), array('empty' => 'Pilih Personil'));
			} else {
				echo $form->dropDownList($model, 'id_personil', array(), array('empty' => 'Pilih Personil'));
			}
		?>
		<?php echo $form->error($model,'id_personil'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kode_role'); ?>
		<?php echo $form->dropDownList($model,'kode_role', Akun::getRoleList(),array('empty' => 'Pilih Role')); ?>
		<?php echo $form->error($model,'kode_role'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Selesai' : 'Simpan', array('style'=>'width:100px; margin-left:360px; margin-top:10px;')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->