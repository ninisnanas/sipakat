<?php
/* @var $this AkunController */
/* @var $model Akun */

$this->breadcrumbs=array(
	'Akuns'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

?>

<div class="box">
<h1>Update Akun <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>