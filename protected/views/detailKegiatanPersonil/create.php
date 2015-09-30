<?php
/* @var $this DetailKegiatanPersonilController */
/* @var $model DetailKegiatanPersonil */

$this->breadcrumbs=array(
	'Detail Kegiatan Personils'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List DetailKegiatanPersonil', 'url'=>array('index')),
	array('label'=>'Manage DetailKegiatanPersonil', 'url'=>array('admin')),
);
?>

<h1>Create DetailKegiatanPersonil</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>