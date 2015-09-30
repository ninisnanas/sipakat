<?php
/* @var $this KegiatanPersonilController */
/* @var $model KegiatanPersonil */

$this->breadcrumbs=array(
	'Kegiatan Personils'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List KegiatanPersonil', 'url'=>array('index')),
	array('label'=>'Create KegiatanPersonil', 'url'=>array('create')),
	array('label'=>'View KegiatanPersonil', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage KegiatanPersonil', 'url'=>array('admin')),
);
?>

<h1>Update KegiatanPersonil <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>