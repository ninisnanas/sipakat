<?php
/* @var $this SupplierController */
/* @var $model Supplier */

$this->breadcrumbs=array(
	'Suppliers'=>array('index'),
	$model->id_supplier=>array('view','id'=>$model->id_supplier),
	'Update',
);
?>

<h1>Update Supplier <?php echo $model->nama; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>