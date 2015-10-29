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
		$role = Yii::app()->user->getState('role');
		if($role == Akun::ADMIN || $role == Akun::DEPUTI){
			echo CHtml::dropDownList('puskaji', $puskaji, Puskaji::model()->getPuskajiList(),
					array('empty' => 'Pilih Puskaji',
						'ajax' => array(
							'type' => 'POST',
							'url' => CController::createUrl('personil/dinamis'),
							'data' => array('puskaji' => 'js:this.value'),			
							'update' => '#bidang',
							))); 
		} else {
			$puskaji = Yii::app()->user->getState('puskaji');
			$nama_puskaji = Puskaji::model()->findAllByPk($puskaji);
			echo CHtml::textField('puskaji', $nama_puskaji[0]['nama'] ,array('disabled'=>'disabled'));
		}
		
		if(Yii::app()->user->getState('role') == Akun::STAF)
		{
			// get berdasarkan bidangnya si staf!!!
			$bidang = Yii::app()->user->getState('bidang');
			$nama_bidang = Bidang::model()->findAllByPk($bidang);
			echo CHtml::textField('bidang', $nama_bidang[0]['nama'] ,array('disabled'=>'disabled'));
		} else {
			if($puskaji!='') {
				echo CHtml::dropDownList('bidang', $bidang, Bidang::getListBidangByPuskaji($puskaji), array('empty' => 'Pilih Bidang'));
			} else {
				echo CHtml::dropDownList('bidang', $bidang, array(), array('empty' => 'Pilih Bidang'));
			}
		}
		
		// cek role
		// if(Yii::app()->user->getState('role') == Akun::PUSAT){
		echo CHtml::dropDownList('kategori', $kategori, 
			array('1' => 'Seluruh Kegiatan',
				'2' => 'Per Kegiatan',
				'3' => 'Kesibukan Personil'), array('empty' => 'Pilih Kategori'));
		
		echo CHtml::dropDownList('tahun_selected', $tahun_selected, CHtml::listData($tahun,'tahun','tahun'), array('empty' => 'Pilih Tahun'));
	?>
	<div style="margin-top:10px;">
		<?php echo CHtml::submitButton('Tampilkan', array('class'=>'btn green')); ?>
	</div>
</div>

<?php $this->endWidget(); ?>

</div><!-- form -->