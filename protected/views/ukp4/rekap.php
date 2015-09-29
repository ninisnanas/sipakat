<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - ';
$this->breadcrumbs=array(
	'',
);
?>
<?php echo $this->renderPartial('_form', array('model'=>$model,'tahun'=>$tahun, 'ketersediaan'=>$ketersediaan)); ?>

<?php 
  if($dataProvider !== null)
    if(sizeof($dataProvider) > 0)
      echo $this->renderPartial('_view', array('model'=>$model,'dataProvider'=>$dataProvider,'hasAction'=>$hasAction,'type'=>$type, 'tahun_ukp'=>$tahun_ukp, 'triwulan'=>$triwulan)); 
    else 
      echo "Tidak terdapat UKP4 yang sesuai";
  else 
    echo "Silahkan pilih spesifikasi UKP4 yang akan direkapitulasi";
?>