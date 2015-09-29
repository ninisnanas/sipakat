<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - UKP4';
?>

<div class="large-5 column left">
  <div class="r-row">
  	<h1>Unggah Laporan</h1>
  	<hr class="green"/>
  	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
	</div>
</div>
<div class="large-7 column right">
	<?php echo $this->renderPartial('_history', array('dataProvider'=>$dataProvider,'pages'=>$pages)); ?>
</div>