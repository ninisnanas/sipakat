<?php
/* @var $this KegiatanController */
/* @var $model Kegiatan */

$this->breadcrumbs=array(
	'Kegiatans'=>array('index'),
	'Create',
);

?>

<div class="box">
<h1>Tambah Kegiatan</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>