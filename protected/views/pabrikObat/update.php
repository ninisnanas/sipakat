<?php
/* @var $this PabrikObatController */
/* @var $model PabrikObat */

$this->breadcrumbs=array(
	'Pabrik Obats'=>array('index'),
	$model->kode_pabrik=>array('view','id'=>$model->kode_pabrik),
	'Update',
);
?>

<h1>Update Pabrik Obat <?php echo $model->nama; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>