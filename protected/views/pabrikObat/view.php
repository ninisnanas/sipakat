<?php
/* @var $this PabrikObatController */
/* @var $model PabrikObat */

$this->breadcrumbs=array(
	'Pabrik Obats'=>array('index'),
	$model->kode_pabrik,
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

<h1>Detail Pabrik Obat</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'kode_pabrik',
		'nama',
	),
)); ?>
