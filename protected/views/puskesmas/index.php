<?php $tableid = "htmlgrid";?>
<?php if(Yii::app()->user->hasFlash('successDelete')):?>
    <div class="msg-info green">
        <?php echo Yii::app()->user->getFlash('successDelete'); ?>
    </div>
<?php endif; ?>
<h1 class="tableheading">Daftar Puskesmas</h1>
  <table id="<?php echo $tableid;?>" class="table testgrid">
    <colgroup>
    <col class="odd"></col>
    <col class="even"></col>
    <col class="odd"></col>
    <col class="even"></col>
    <col class="odd"></col>
    <col class="even"></col>
    </colgroup>
    <thead>
      <th>No</th>
      <th>Provinsi</th>
      <th>Nama Kab/Kota</th>
      <th>Nama Puskesmas</th>
      <?php 
        $role=Yii::app()->user->getState('role');
        if ($role==2) {
          echo "<th>Tindakan</th>";
        }
      ?>
    </thead>
    <tfoot>
      <tr>
      </tr>
    </tfoot>
    <tbody>
      <?php
	      $ii = 1;
       // echo $itemCount;
	      foreach ($dataProvider as $data) {
	        echo "<tr>";
		        echo "<td>".$ii++."</td>";
		        echo "<td class=\"text-left\">".$data['prop']."</td>";
		        echo "<td class=\"text-left\">".$data['kab']."</td>";
		        echo "<td class=\"text-left\">".$data['nama']."</td>";
		        if ($role==2) {
              echo "<td class=\"text-left\">".CHtml::link('Lihat',array('Puskesmas/view','id'=>$data['kode']))."|" 
              .CHtml::link('Ubah',array('Puskesmas/update','id'=>$data['kode']))."|"
              .CHtml::link('Hapus',array('Puskesmas/delete','id'=>$data['kode']),array(
              'submit'=>array('Puskesmas/delete', 'id'=>$data['kode']),
              'class' => 'delete','confirm'=>'This will remove the image. Are you sure?'
              ))."</td>";
            }
	        echo "</tr>";
	      }
	    ?>
    </tbody>
  </table>

<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/datatable/jquery.dataTables.css"/>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/datatable/jquery.dataTables.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#<?php echo $tableid;?>').dataTable({
    "sPaginationType": "full_numbers",
    "bAutoWidth": false,
  } );
});
</script>