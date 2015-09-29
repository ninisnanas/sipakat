<?php
/* @var $this Ukp4Controller */
/* @var $model Ukp4 */
/* @var $form CActiveForm */
?>
<div class="r-row">
	<div class="form-inline">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'ukp4-form',
		'enableAjaxValidation'=>true,
	)); ?>
	
	<div class="form-row large-2 column left">
		<?php 
			if(Yii::app()->user->getState('role') == Akun::PUSAT){
				echo $form->dropDownList($model, 'kode_prop', Propinsi::model()->getProvinsiList());
			} else {
				$prop = Propinsi::model()->findByPk($model['kode_prop']);
				echo CHtml::textField('kode_prop', $prop['nama'] ,array('disabled'=>'disabled'));
				echo $form->textField($model,'kode_prop',array('class'=>'hide'));
			}
		?>
		<?php echo $form->error($model,'kode_prop'); ?>
	</div>
<!--
	<div class="form-row large-2 column left">
		<?php
			if(Yii::app()->user->getState('role') == Akun::KABUPATEN)
			{
				$kab = Kabupaten::model()->findByPk($model['kode_kab']);
				echo CHtml::textField('kode_kab', $kab['nama'] ,array('disabled'=>'disabled'));
				echo $form->textField($model,'kode_kab',array('class'=>'hide'));
			}else {
				if($model->kode_prop!='') {
					echo $form->dropDownList($model, 'kode_kab', KabupatenController::getListKab($model->kode_prop), array('empty' => 'Pilih Kabupaten'));
				} else {
					echo $form->dropDownList($model, 'kode_kab', array(), array('empty' => 'Pilih Kabupaten'));
				}
			}
		?>
	</div> -->

	<div class="form-row large-2 column left">
		<?php echo $form->dropDownList($model,'tahun',CHtml::listData($tahun,'tahun','tahun'),array('empty' => 'Pilih Tahun')); ?>
	</div>

	<div class="form-row large-2 column left">
		<?php echo CHtml::submitButton('Search',array('class'=>'btn green')); ?>
	</div>

	<?php $this->endWidget(); ?>

	</div><!-- form -->
</div>