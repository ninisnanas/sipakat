<?php $tableid = "htmlgrid";?>
<?php if(Yii::app()->user->hasFlash('successDelete')):?>
    <div class="msg-info green">
        <?php echo Yii::app()->user->getFlash('successDelete'); ?>
    </div>
<?php endif; ?>
<div class="row">
  <div class="box">
  <div class="col-lg-12 text-center">
      <h2 class="section-heading">Daftar Kegiatan</h2>
      <h3 class="section-subheading text-muted">Bidang XYZ</h3>
      <?php
        echo CHtml::link('Tambah Kegiatan',array('Kegiatan/create'));
      ?>
  </div>
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
      <th>No.</th>
      <th>Nama Kegiatan</th>
      <?php 
        $role=Yii::app()->user->getState('role');
        if ($role==1) {
          echo "<th>Aksi</th>";
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
        foreach($dataProvider as $data){
        echo "<tr id=\"\">";
        echo   "<td>".$ii++."</td>";
        echo   "<td>".$data->nama."</td>";
        if ($role==1) {
          echo "<td class=\"text-left\">".CHtml::link('Lihat',array('DetailKegiatan/index','id'=>$data->id))." |"
          .CHtml::link('Ubah',array('Kegiatan/update','id'=>$data->id))." |"
          .CHtml::link('Hapus',array('Kegiatan/delete','id'=>$data->id),array(
          'submit'=>array('Kegiatan/delete', 'id'=>$data->id),
          'class' => 'delete','confirm'=>'Anda yakin untuk menghapus kegiatan?'
          ))."</td>";
        }
        echo "</tr>";
      } ?>
    </tbody>
  </table>
</div>
</div>

<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/datatable/jquery.dataTables.css"/>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/datatable/jquery.dataTables.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#<?php echo $tableid;?>').dataTable({
    "sPaginationType": "full_numbers",
    "bAutoWidth": true,
  } );
});
</script>