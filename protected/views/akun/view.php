<?php
/* @var $this AkunController */
/* @var $model Akun */

/*$this->breadcrumbs=array(
	'Akuns'=>array('index'),
	$model->username,
);*/
?>

<?php if(Yii::app()->user->hasFlash('success')):?>
    <div class="msg-info green">
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
<?php elseif (Yii::app()->user->hasFlash('successUpdate')) :?>
		<div class="msg-info green">
        <?php echo Yii::app()->user->getFlash('successUpdate'); ?>
    </div>
<?php elseif (Yii::app()->user->hasFlash('successPass')) :?>
		<div class="msg-info green">
        <?php echo Yii::app()->user->getFlash('successPass'); ?>
    </div>
<?php endif; ?>

<h1 class="tableheading">Detail Akun</h1>

<div class="view">
	<table>
	<tr>
		<td><b>Username</b></td>
		<td><b>:</b></td>
		<td><?php echo $model[0]['username']; ?></td>
	</tr>

	<tr>
		<td><b>Nama</b></td>
		<td><b>:</b></td>
		<td><?php echo $model[0]['nama']; ?></td>
	</tr>

	<tr>
		<td><b>NIP</b></td>
		<td><b>:</b></td>
		<td><?php echo $model[0]['nip']; ?></td>
	</tr>
	
	<tr>
		<td><b>E-Mail</b></td>
		<td><b>:</b></td>
		<td><?php echo $model[0]['email']; ?></td>
	</tr>
	
	<tr>
		<td><b>Nomor Telepon</b></td>
		<td><b>:</b></td>
		<td><?php echo $model[0]['telp']; ?></td>
	</tr>
	
	<tr>
		<td><b>Role</b></td>
		<td><b>:</b></td>
		<td><?php echo Akun::model()->getRole($model[0]['kode_role']); ?></td>
	</tr>
	
	<?php if ($model[0]['prop'] != null)
	{
		echo "<tr>
				<td><b>Provinsi</b></td>
				<td><b>:</b></td>
				<td>";
				echo $model[0]['prop'];
				echo "</td>
			</tr>";
	} ?>
		
	<?php if (($model[0]['kode_role'] == 5))
	{
		echo "<tr>
				<td><b>Kabupaten</b></td>
				<td><b>:</b></td>
				<td>";
				echo $model[0]['kab'];
				echo "</td>
			</tr>";
	} ?>
</table>

</div>
