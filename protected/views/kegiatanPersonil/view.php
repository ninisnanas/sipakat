<?php
/* @var $this KegiatanPersonilController */
/* @var $model KegiatanPersonil */

$this->breadcrumbs=array(
	'Kegiatan Personils'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List KegiatanPersonil', 'url'=>array('index')),
	array('label'=>'Create KegiatanPersonil', 'url'=>array('create')),
	array('label'=>'Update KegiatanPersonil', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete KegiatanPersonil', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage KegiatanPersonil', 'url'=>array('admin')),
);
?>

<h1>View KegiatanPersonil #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_personil',
		'id_detail_kegiatan',
	),
)); ?>
