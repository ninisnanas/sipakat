<?php
/* @var $this Ukp4Controller */
/* @var $model Ukp4 */
/* @var $form CActiveForm */
?>
<div class="r-row">
	<div class="form-inline">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'ukp4-form',
		'method'=>'get',
		'enableAjaxValidation'=>true,
	)); ?>
		
		<?php 


		?>
			<div class="form-row large-1 column left">
				<?php 
					if(Yii::app()->user->getState('role') == Akun::PUSAT){
						echo $form->dropDownList($model, 'kode_prop', Propinsi::model()->getProvinsiList(),
						array('empty' => 'Rekap Nasional',
							'class'=>'no-margin',
							'ajax' => array(
								'type' => 'POST',
								'url' => CController::createUrl('kabupaten/dinamis'),
								'data' => array('kode_prop' => 'js:this.value'),
								'update' => '#'.CHtml::activeId($model, 'kode_kab'),
								))); 
					} else {
						$prop = Propinsi::model()->findByPk($model['kode_prop']);
						echo CHtml::textField('kode_prop', $prop['nama'] ,array('disabled'=>'disabled','class'=>'no-margin'));
						echo $form->textField($model,'kode_prop',array('class'=>'hide'));
					}
				?>
				<?php echo $form->error($model,'kode_prop'); ?>
			</div>

		<div class="form-row large-1 column left">
			<?php
				if(Yii::app()->user->getState('role') == Akun::KABUPATEN)
				{
					$kab = Kabupaten::model()->findByPk($model['kode_kab']);
					echo CHtml::textField('kode_kab', $kab['nama'] ,array('disabled'=>'disabled','class'=>'no-margin'));
					echo $form->textField($model,'kode_kab',array('class'=>'hide'));
				}else {
					if($model->kode_prop!='') {
						echo $form->dropDownList($model, 'kode_kab', KabupatenController::getListKab($model->kode_prop), array('empty' => 'Rekap Provinsi','class'=>'no-margin'));
					} else {
						echo $form->dropDownList($model, 'kode_kab', array(), array('empty' => 'Rekap Provinsi','class'=>'no-margin'));
					}
				}
			?>
		</div>

		<div class="form-row large-1 column left">
			<?php echo $form->dropDownList($model,'triwulan', array(1=>'B03', 2=>'B06',3=>'B09',4=>'B12'), array('class'=>'no-margin'));?>
		</div>

		<div class="form-row large-1 column left">
			<?php echo $form->dropDownList($model,'tahun',CHtml::listData($tahun,'tahun','tahun'),array('empty' => 'Pilih Tahun','class'=>'no-margin')); ?>
		</div>

		<div class="form-row large-1 column left">
			<?php echo $form->dropDownList($model, 'ketersediaan', array(0=> 'Semua', 1=>'<50%', 2=>'50-100%',3=>'>100%'), array('class'=>'no-margin'));?>
		</div> 

	</div><!-- form -->
	</div><!-- form --> 
<div class="r-row">
		<div class="form-row column left">
			<?php echo CHtml::submitButton('Search',array('class'=>'no-margin btn green')); ?>
			<?php echo CHtml::submitButton('Download',array('class'=>'no-margin btn green')); ?>
		</div>

	</div><!-- form -->
	<?php $this->endWidget(); ?>

</div>