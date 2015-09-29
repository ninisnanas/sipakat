<?php
/* @var $this DetailKegiatanController */
/* @var $model DetailKegiatan */

$this->breadcrumbs=array(
	'Detail Kegiatans'=>array('index'),
	'Create',
);

?>

<div class="box">
<h1>Tambah Detail Kegiatan</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>