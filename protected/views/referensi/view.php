<?php
/* @var $this ReferensiController */
/* @var $model Referensi */

$this->breadcrumbs=array(
	'Referensis'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Referensi', 'url'=>array('index')),
	array('label'=>'Create Referensi', 'url'=>array('create')),
	array('label'=>'Update Referensi', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Referensi', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Referensi', 'url'=>array('admin')),
);
?>

<h1>View Referensi #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nama',
		'file',
		'tahun',
		'timestamp',
	),
)); ?>
