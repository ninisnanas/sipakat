<?php
/* @var $this ReferensiController */
/* @var $model Referensi */

$this->breadcrumbs=array(
	'Referensis'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

?>

<div class="box">
<h1>Update Referensi <?php echo $model->nama; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>