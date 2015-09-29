<?php
/* @var $this Ukp4LineItemController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ukp4 Line Items',
);

$this->menu=array(
	array('label'=>'Create Ukp4LineItem', 'url'=>array('create')),
	array('label'=>'Manage Ukp4LineItem', 'url'=>array('admin')),
);
?>

<h1>Ukp4 Line Items</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
