<?php
/* @var $this KabupatenController */
/* @var $model Kabupaten */

$this->breadcrumbs=array(
	'Kabupatens'=>array('index'),
	$model->kode_kab=>array('view','id'=>$model->kode_kab),
	'Update',
);
?>

<h1>Update Kabupaten <?php echo $model->nama; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>