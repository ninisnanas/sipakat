<?php
/* @var $this UploadController */
/* @var $model Upload */

$this->breadcrumbs=array(
	'Uploads'=>array('index'),
	$model->ID,
);

// $this->menu=array(
// 	array('label'=>'List Upload', 'url'=>array('index')),
// 	array('label'=>'Create Upload', 'url'=>array('create')),
// 	array('label'=>'Update Upload', 'url'=>array('update', 'id'=>$model->id)),
// 	array('label'=>'Delete Upload', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
// 	array('label'=>'Manage Upload', 'url'=>array('admin')),
// );
?>

<h1 class="tableheading">Detail Upload</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'username',
		'waktu',
		'status',
		'file',
	),
)); ?>
