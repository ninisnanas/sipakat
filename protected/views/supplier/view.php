<?php
/* @var $this SupplierController */
/* @var $model Supplier */

$this->breadcrumbs=array(
	'Suppliers'=>array('index'),
	$model->id_supplier,
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

<h1 class="tableheading">Detail Supplier</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_supplier',
		'nama',
		'telepon',
		'alamat',
	),
)); ?>
