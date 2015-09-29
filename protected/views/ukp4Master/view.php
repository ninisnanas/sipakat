<?php
/* @var $this Ukp4MasterController */
/* @var $model Ukp4Master */

$this->breadcrumbs=array(
	'Ukp4 Masters'=>array('index'),
	$model->ID,
);

?>

<h1 class="tableheading">Detail Ukp4Master</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'kode_obat',
	),
)); ?>
