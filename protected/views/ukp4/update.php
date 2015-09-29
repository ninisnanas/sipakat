<?php
/* @var $this Ukp4Controller */
/* @var $model Ukp4 */

$this->breadcrumbs=array(
	'Ukp4s'=>array('index'),
	$model->kode_lap=>array('view','id'=>$model->kode_lap),
	'Update',
);

$this->menu=array(
	array('label'=>'List Ukp4', 'url'=>array('index')),
	array('label'=>'Create Ukp4', 'url'=>array('create')),
	array('label'=>'View Ukp4', 'url'=>array('view', 'id'=>$model->kode_lap)),
	array('label'=>'Manage Ukp4', 'url'=>array('admin')),
);
?>

<h1>Update Ukp4 <?php echo $model->kode_lap; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>