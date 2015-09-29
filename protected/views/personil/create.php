<?php
/* @var $this ObatController */
/* @var $model Obat */

$this->breadcrumbs=array(
	'Obats'=>array('index'),
	'Create',
);
?>
<?php if(Yii::app()->user->hasFlash('asd')):?>
    <div class="msg-info yellow">
        <?php echo Yii::app()->user->getFlash('asd'); ?>
    </div>
<?php endif; ?>
<div class="box">
<h1>Tambah Personil Baru</h1>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>