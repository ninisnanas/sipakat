<?php
/* @var $this AkunController */
/* @var $model Akun */

$this->breadcrumbs=array(
	'Akuns'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Akun', 'url'=>array('index')),
	array('label'=>'Create Akun', 'url'=>array('create')),
	array('label'=>'Update Akun', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Akun', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Akun', 'url'=>array('admin')),
);
?>

<h1>View Akun #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_personil',
		'username',
		'password',
		'kode_role',
		'email',
	),
)); ?>
