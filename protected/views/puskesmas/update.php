<?php
/* @var $this PuskesmasController */
/* @var $model Puskesmas */

$this->breadcrumbs=array(
	'Puskesmases'=>array('index'),
	$model->kode=>array('view','id'=>$model->kode),
	'Update',
);
?>

<h1>Update Puskesmas <?php echo $model->nama; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>