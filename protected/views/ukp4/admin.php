<?php
/* @var $this Ukp4Controller */
/* @var $model Ukp4 */

$this->breadcrumbs=array(
	'Ukp4s'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Ukp4', 'url'=>array('index')),
	array('label'=>'Create Ukp4', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#ukp4-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Ukp4s</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ukp4-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'kode_lap',
		'kode_prop',
		'kode_kab',
		'triwulan',
		'tahun',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
