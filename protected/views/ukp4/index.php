<?php
/* @var $this Ukp4Controller */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ukp4s',
);

$this->menu=array(
	array('label'=>'Create Ukp4', 'url'=>array('create')),
	array('label'=>'Manage Ukp4', 'url'=>array('admin')),
);
?>

<h1>Ukp4s</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
