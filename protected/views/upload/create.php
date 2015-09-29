<?php
/* @var $this UploadController */
/* @var $model Upload */

$this->breadcrumbs=array(
	'Uploads'=>array('index'),
	'Create',
);
?>
<div class="large-5 column left">
<h1>Unggah Laporan</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>