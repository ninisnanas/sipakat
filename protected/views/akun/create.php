<?php
/* @var $this AkunController */
/* @var $model Akun */

$this->breadcrumbs=array(
	'Akuns'=>array('index'),
	'Create',
);

?>

<div class="box">
<h1>Buat Akun</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>