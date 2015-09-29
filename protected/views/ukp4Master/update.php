<?php
/* @var $this Ukp4MasterController */
/* @var $model Ukp4Master */

$this->breadcrumbs=array(
	'Ukp4 Masters'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Ukp4Master', 'url'=>array('index')),
	array('label'=>'Create Ukp4Master', 'url'=>array('create')),
	array('label'=>'View Ukp4Master', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Ukp4Master', 'url'=>array('admin')),
);
?>

<h1>Update Ukp4Master <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>