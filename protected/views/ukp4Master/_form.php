<?php
/* @var $this Ukp4MasterController */
/* @var $model Ukp4Master */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ukp4-master-form',
	'enableAjaxValidation'=>false,
)); ?>
<?php $tableid = "htmlgrid";?>
	  <table id="<?php echo $tableid;?>" class="table testgrid">
    <colgroup>
    <col class="odd"></col>
    <col class="even"></col>
    <col class="odd"></col>
    <col class="even"></col>
    <col class="odd"></col>
    <col class="even"></col>
    <col class="odd"></col>
    <col class="even"></col>
    </colgroup>
    <thead>
      <th class="th-odd">No</th>
      <th class="th-even">Nama Obat</th>
      <th class="th-odd"></th>
    </thead>
    <tfoot>
      <tr>
      </tr>
    </tfoot>
    <tbody>
    	<?php $i = 1; $j = 0; ?>
    	<?php foreach($daftar_obat as $obat): ?>
			<tr class="<?php if($i % 2 == 0) echo "even"; else echo "odd"; ?>">
				<td><?php echo $i++ ?> </td>
				<td class="text-left"><?php echo $obat['nama'] ?></td>
				<td><?php echo CHtml::checkBox('Ukp4Master['.$obat['kode_obat'].']',$temp_master[$j++], array('value'=>$obat['kode_obat'])); ?> </td>
			</tr> 
			<?php endforeach; ?> 
    </tbody>
  </table>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Save',array('class'=>'btn green')); ?>
	</div>
  <p></p>
<?php 
	$this->endWidget(); 
?>

</div><!-- form -->