<?php
/* @var $this DetailKegiatanController */
/* @var $model DetailKegiatan */

$this->breadcrumbs=array(
	'Detail Kegiatans'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

?>

<div class="box">
<h1>Update Detail Kegiatan <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>