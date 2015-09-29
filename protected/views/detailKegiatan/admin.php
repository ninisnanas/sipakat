<?php
/* @var $this DetailKegiatanController */
/* @var $model DetailKegiatan */

$this->breadcrumbs=array(
	'Detail Kegiatans'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List DetailKegiatan', 'url'=>array('index')),
	array('label'=>'Create DetailKegiatan', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#detail-kegiatan-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Detail Kegiatans</h1>

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
	'id'=>'detail-kegiatan-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'id_kegiatan',
		'nama',
		'kode',
		'anggaran',
		'persen_anggaran',
		/*
		'waktu',
		'persen_waktu',
		'w11',
		'w12',
		'w13',
		'w14',
		'w21',
		'w22',
		'w23',
		'w24',
		'w31',
		'w32',
		'w33',
		'w34',
		'w41',
		'w42',
		'w43',
		'w44',
		'w51',
		'w52',
		'w53',
		'w54',
		'w61',
		'w62',
		'w63',
		'w64',
		'w71',
		'w72',
		'w73',
		'w74',
		'w81',
		'w82',
		'w83',
		'w84',
		'w91',
		'w92',
		'w93',
		'w94',
		'w101',
		'w102',
		'w103',
		'w104',
		'w111',
		'w112',
		'w113',
		'w114',
		'w121',
		'w122',
		'w123',
		'w124',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
