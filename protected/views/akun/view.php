<?php
/* @var $this AkunController */
/* @var $model Akun */

$this->breadcrumbs=array(
	'Akuns'=>array('index'),
	$model->id,
);

?>
<div class="box">
<h1>Akun <?php echo $model->username; ?> Telah Berhasil Diubah.</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_personil',
		'username',
		'password',
		'kode_role',
		'email',
	),
)); ?>
</div>