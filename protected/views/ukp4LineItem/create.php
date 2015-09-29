<?php
/* @var $this Ukp4LineItemController */
/* @var $model Ukp4LineItem */

$this->breadcrumbs=array(
	'Ukp4 Line Items'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Ukp4LineItem', 'url'=>array('index')),
	array('label'=>'Manage Ukp4LineItem', 'url'=>array('admin')),
);
?>

<h1>Create Ukp4LineItem</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>