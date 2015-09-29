<?php $tableid = "htmlgrid";?>
<?php if(Yii::app()->user->hasFlash('successDelete')):?>
    <div class="msg-info green">
        <?php echo Yii::app()->user->getFlash('successDelete'); ?>
    </div>
<?php endif; ?>
<div>
  <h1 class="tableheading">Daftar Provinsi</h1>
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
      <th>No</th>
      <th>Nama Provinsi</th>
      <th>Alamat Dinas Kesehatan</th>
      <th>No Telepon</th>
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
        foreach ($dataProvider as $data) {
          echo "<tr>";
          echo "<td>".$ii++."</td>";
          echo "<td class=\"text-left\">".$data->nama."</td>";
          echo "<td class=\"text-left\">".$data->alamat."</td>";
          echo "<td>".$data->telp1."</td>";
          if ($role==2) {
            echo "<td class=\"text-left\">".CHtml::link('Lihat',array('Propinsi/view','id'=>$data->kode_prop))."|" 
            .CHtml::link('Ubah',array('Propinsi/update','id'=>$data->kode_prop))."|"
            .CHtml::link('Hapus',array('Propinsi/delete','id'=>$data->kode_prop),array(
            'submit'=>array('Propinsi/delete', 'id'=>$data->kode_prop),
            'class' => 'delete','confirm'=>'This will remove the image. Are you sure?'
            ))."</td>";
          }
          echo "</tr>";
        }
      ?>
    </tbody>
  </table>
</div>

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