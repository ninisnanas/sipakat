<?php
/* @var $this DetailKegiatanPersonilController */
/* @var $model DetailKegiatanPersonil */

$this->breadcrumbs=array(
	'Detail Kegiatan Personils'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List DetailKegiatanPersonil', 'url'=>array('index')),
	array('label'=>'Create DetailKegiatanPersonil', 'url'=>array('create')),
	array('label'=>'Update DetailKegiatanPersonil', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete DetailKegiatanPersonil', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DetailKegiatanPersonil', 'url'=>array('admin')),
);
?>

<h1>View DetailKegiatanPersonil #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_personil',
		'tahun',
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
	),
)); ?>
