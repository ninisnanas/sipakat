<?php
/* @var $this Ukp4MasterController */
/* @var $model Ukp4Master */

$this->breadcrumbs=array(
	'Ukp4 Masters'=>array('index'),
	'Create',
);
?>

<h1 class="tableheading">Pilih Obat UKP4</h1>

<?php echo $this->renderPartial('_form', array('daftar_obat' => $daftar_obat , 'temp_master' => $temp_master)); ?>