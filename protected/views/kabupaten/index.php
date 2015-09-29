<?php $tableid = "htmlgrid";?>
<?php if(Yii::app()->user->hasFlash('successDelete')):?>
    <div class="msg-info green">
        <?php echo Yii::app()->user->getFlash('successDelete'); ?>
    </div>
<?php endif; ?>
<div>
  <h1 class="tableheading">Daftar Kabupaten/Kota</h1>
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
      <th class="th-even">Provinsi</th>
      <th class="th-odd">Nama Kab/Kota</th>
      <th class="th-even">Alamat Dinas Kesehatan</th>
      <th class="th-odd">No Telepon</th>
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
          echo "<td class=\"text-left\">".$data['prop']."</td>";
          echo "<td class=\"text-left\">".$data['nama']."</td>";
          echo "<td class=\"text-left\">".$data['alamat']."</td>";
          echo "<td class=\"text-left\">".$data['telp1']."</td>";
          if ($role==2) {
            echo "<td class=\"text-left\">".CHtml::link('Lihat',array('Kabupaten/view','id'=>$data['kode_kab']))."|" 
            .CHtml::link('Ubah',array('Kabupaten/update','id'=>$data['kode_kab']))."|"
            .CHtml::link('Hapus',array('Kabupaten/delete','id'=>$data['kode_kab']),array(
            'submit'=>array('Kabupaten/delete', 'id'=>$data['kode_kab']),
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