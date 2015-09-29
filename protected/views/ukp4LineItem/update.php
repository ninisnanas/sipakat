<?php
/* @var $this Ukp4LineItemController */
/* @var $model Ukp4LineItem */

$this->breadcrumbs=array(
	'Ukp4 Line Items'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

?>

<h1>Update</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>