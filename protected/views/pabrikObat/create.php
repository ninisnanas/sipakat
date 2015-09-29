<?php
/* @var $this PabrikObatController */
/* @var $model PabrikObat */

$this->breadcrumbs=array(
	'Pabrik Obats'=>array('index'),
	'Create',
);

?>

<h1>Formulir Pembuatan Pabrik Obat</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>