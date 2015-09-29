<?php
/* @var $this BidangController */
/* @var $model Bidang */

$this->breadcrumbs=array(
	'Bidangs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Bidang', 'url'=>array('index')),
	array('label'=>'Create Bidang', 'url'=>array('create')),
	array('label'=>'View Bidang', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Bidang', 'url'=>array('admin')),
);
?>

<h1>Update Bidang <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>