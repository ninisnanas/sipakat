<?php
/* @var $this KegiatanController */
/* @var $model Kegiatan */

$this->breadcrumbs=array(
	'Kegiatans'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);
?>

<div class="box">
<h1>Update Kegiatan <?php echo $model->nama; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>