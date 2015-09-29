<?php
/* @var $this UploadController */
/* @var $data Upload */
?>

<div class="view">

	<tr>
		<td>
			<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->waktu); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->status); ?>
		</td>
		<td>
			
		</td>
	</tr>
</div>