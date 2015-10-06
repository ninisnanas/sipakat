<?php
/* @var $this PersonilController */
/* @var $model Personil */

$this->breadcrumbs=array(
	'Personils'=>array('index'),
	$model->id,
);

?>

<div class="box">
<h1>Detil Personil <?php echo $model->nama; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nama',
		'jabatan',
		'nip',
		'pangkat',
		'bidang',
		'background',
		'training',
		'status',
	),
)); ?>
</div>