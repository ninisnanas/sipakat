<?php
/* @var $this KegiatanPersonilController */
/* @var $model KegiatanPersonil */

$this->breadcrumbs=array(
	'Kegiatan Personils'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List KegiatanPersonil', 'url'=>array('index')),
	array('label'=>'Manage KegiatanPersonil', 'url'=>array('admin')),
);
?>

<div class="box">
<h1>Tambah Kegiatan Personil</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>