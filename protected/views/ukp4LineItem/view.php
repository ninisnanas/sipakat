<?php
/* @var $this Ukp4LineItemController */
/* @var $model Ukp4LineItem */

$this->breadcrumbs=array(
	'Ukp4 Line Items'=>array('index'),
	$model->id,
);

?>

<h1 class="tableheading">Detail UKP 4 Line Item</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'kode_lap',
		'kode_obat',
		'kebutuhan',
		'total_penggunaan',
		'sisa_stok',
	),
)); ?>
