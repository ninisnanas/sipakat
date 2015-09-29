<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>
<div class="login-form form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'errorMessageCssClass' => 'errorMsgStd',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
	'validateOnSubmit'=>true,
	),
)); ?>
	<h1>Login</h1>

	<div class="form-row row">
		<?php echo $form->textField($model,'username',array('placeholder'=>'username')); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="form-row row">
		<?php echo $form->passwordField($model,'password',array('placeholder'=>'password')); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="form-row">
		<?php echo CHtml::submitButton('Login',array('class'=>'btn green')); ?>
	</div>

	

<?php $this->endWidget(); ?>
</div><!-- form -->
