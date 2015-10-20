<?php
/* @var $this AkunController */
/* @var $model Akun */

$this->breadcrumbs=array(
	'Akuns'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

?>

<div class="box">

<?php if(Yii::app()->user->hasFlash('notice')):?>
    <div class="msg-info green">
        <?php echo Yii::app()->user->getFlash('notice'); ?>
    </div>
<?php elseif(Yii::app()->user->hasFlash('successPass')):?>
    <div class="msg-info green">
        <?php echo Yii::app()->user->getFlash('successPass'); ?>
    </div> 
<?php endif; ?>

<?php
if($pass) {
	echo "<h1>Ubah Password ".$model->username."</h1>";
	echo "<div class=\"login-form form\">";
	echo $this->renderPartial('_formpass', array('model'=>$model)); 
	echo "</div>";
} else {
	echo "<h1>Update Akun ".$model->username."</h1>";
	echo $this->renderPartial('_form', array('model'=>$model));
}
?>
</div>