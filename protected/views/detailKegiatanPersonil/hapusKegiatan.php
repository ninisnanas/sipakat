<?php
/* @var $this DetailKegiatanPersonilController */
/* @var $model DetailKegiatanPersonil */

$this->breadcrumbs=array(
	'Detail Kegiatan Personils'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

?>
<div class = "box">
<h1>Hapus Detail Kegiatan Personil</h1>

<?php echo $this->renderPartial('_formDelete', array('model'=>$model)); ?>
</div>