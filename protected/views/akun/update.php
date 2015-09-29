<?php
/* @var $this AkunController */
/* @var $model Akun */

$this->breadcrumbs=array(
	'Akuns'=>array('index'),
	$model->username=>array('view','id'=>$model->username),
	'Update',
);
?>

<h1>Update Akun <?php echo $model->nama; ?></h1>

<?php 
	if ($pass==1) {
		echo $this->renderPartial('_formpass', array('model'=>$model)); 
	} else if ($pass==null) {
		echo $this->renderPartial('_formprofile', array('model'=>$model)); 
	} else {
		echo $this->renderPartial('_form', array('model'=>$model)); 
	}
?>