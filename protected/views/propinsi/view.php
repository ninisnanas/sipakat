<?php
/* @var $this PropinsiController */
/* @var $model Propinsi */

$this->breadcrumbs=array(
	'Propinsis'=>array('index'),
	$model->kode_prop,
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

<h1 class="tableheading">Detail Propinsi</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'kode_prop',
		'nama',
		'alamat',
		'telp1',
	),
)); ?>
