<?php
/* @var $this DetailKegiatanController */
/* @var $model DetailKegiatan */

$this->breadcrumbs=array(
	'Detail Kegiatans'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List DetailKegiatan', 'url'=>array('index')),
	array('label'=>'Create DetailKegiatan', 'url'=>array('create')),
	array('label'=>'Update DetailKegiatan', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete DetailKegiatan', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DetailKegiatan', 'url'=>array('admin')),
);
?>

<h1>View DetailKegiatan #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_kegiatan',
		'nama',
		'kode',
		'anggaran',
		'persen_anggaran',
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
	),
)); ?>
