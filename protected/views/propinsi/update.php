<?php
/* @var $this PropinsiController */
/* @var $model Propinsi */

$this->breadcrumbs=array(
	'Propinsis'=>array('index'),
	$model->kode_prop=>array('view','id'=>$model->kode_prop),
	'Update',
);
?>

<h1>Update Propinsi <?php echo $model->nama; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>