<?php
/* @var $this ReferensiController */
/* @var $model Referensi */

$this->breadcrumbs=array(
	'Referensis'=>array('index'),
	'Create',
);

?>

<div class="box">
<h1>Tambah Referensi</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>