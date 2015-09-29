<?php
/* @var $this PersonilController */
/* @var $model Personil */

$this->breadcrumbs=array(
	'Personils'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

?>

<div class="box">
<h1>Update Personil <?php echo $model->nama; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>