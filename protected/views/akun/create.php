<?php
/* @var $this AkunController */
/* @var $model Akun */

$this->breadcrumbs=array(
	'Akuns'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Akun', 'url'=>array('index')),
	array('label'=>'Manage Akun', 'url'=>array('admin')),
);
?>

<h1>Create Akun</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>