<?php
/* @var $this AkunController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Akuns',
);

$this->menu=array(
	array('label'=>'Create Akun', 'url'=>array('create')),
	array('label'=>'Manage Akun', 'url'=>array('admin')),
);
?>

<h1>Akuns</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
