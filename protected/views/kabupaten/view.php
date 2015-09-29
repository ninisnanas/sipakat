<?php
/* @var $this KabupatenController */
/* @var $model Kabupaten */

$this->breadcrumbs=array(
	'Kabupatens'=>array('index'),
	$model->kode_kab,
);

?>
<?php if(Yii::app()->user->hasFlash('success')):?>
    <p class="msg-info green">
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </p>
<?php elseif (Yii::app()->user->hasFlash('successUpdate')) :?>
		<div class="msg-info green">
        <?php echo Yii::app()->user->getFlash('successUpdate'); ?>
    </div>
<?php endif; ?>
<h1 class="tableheading">Detail Kabupaten</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'kode_kab',
		'nama',
		'alamat',
		'telp1',
		'kode_prop',
	),
)); ?>
