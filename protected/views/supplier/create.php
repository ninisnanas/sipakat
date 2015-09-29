<?php
/* @var $this SupplierController */
/* @var $model Supplier */

$this->breadcrumbs=array(
	'Suppliers'=>array('index'),
	'Create',
);

?>

<h1>Formulir Pembuatan Supplier</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>