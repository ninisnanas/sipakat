<?php
/* @var $this PuskesmasController */
/* @var $model Puskesmas */

$this->breadcrumbs=array(
	'Puskesmases'=>array('index'),
	$model->kode,
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

<h1>Detail Puskesmas</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'kode_prov',
		'kode_kabkot',
		'kode',
		'nama',
	),
)); ?>
