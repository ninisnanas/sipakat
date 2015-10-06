<?php
/* @var $this DetailKegiatanPersonilController */
/* @var $model DetailKegiatanPersonil */

$this->breadcrumbs=array(
	'Detail Kegiatan Personils'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List DetailKegiatanPersonil', 'url'=>array('index')),
	array('label'=>'Create DetailKegiatanPersonil', 'url'=>array('create')),
	array('label'=>'View DetailKegiatanPersonil', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage DetailKegiatanPersonil', 'url'=>array('admin')),
);
?>
<div class = "box">
<h1>Update DetailKegiatanPersonil <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>