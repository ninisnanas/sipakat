<?php
/* @var $this RangkumanController */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'rangkuman-form',
	'method'=>'get',
	'enableAjaxValidation'=>false,
)); ?>

<div class="form-row large-2 column left">
	<?php
		echo CHtml::dropDownList('bidang', $bidang, Bidang::model()->getBidangList(), array('empty' => 'Seluruh Bidang'));
		
		// cek role
		// if(Yii::app()->user->getState('role') == Akun::PUSAT){
		echo CHtml::dropDownList('kategori', $kategori, 
			array('1' => 'Seluruh Kegiatan',
				'2' => 'Per Kegiatan',
				'3' => 'Kesibukan Personil'), array('empty' => 'Pilih Kategori'));
		
		echo CHtml::dropDownList('tahun_selected', $tahun_selected, CHtml::listData($tahun,'tahun','tahun'), array('empty' => 'Pilih Tahun'));
	?>
	<?php echo CHtml::submitButton('Search', array('class'=>'btn green')); ?>
</div>

<?php $this->endWidget(); ?>

</div><!-- form -->