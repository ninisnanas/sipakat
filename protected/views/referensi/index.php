<?php $tableid = "htmlgrid";?>
<?php if(Yii::app()->user->hasFlash('successDelete')):?>
    <div class="msg-info green">
        <?php echo Yii::app()->user->getFlash('successDelete'); ?>
    </div>
<?php endif; ?>
<div class="row">
  <div class="box">
  <div class="col-lg-12 text-center">
      <h2 class="section-heading">Daftar Layanan</h2>
      <?php
      if (Yii::app()->user->getState('role') != Akun::TAMU)
        echo CHtml::link('Tambah',array('Referensi/create'));
      ?>
  </div>
   <div class="col-xs-10 col-xs-offset-1">
  <table id="<?php echo $tableid;?>" class="display compact cell-border nowrap">
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
      <th>Puskaji</th>
      <th>Bidang</th>
      <th>Nama File</th>
      <th>Aksi</th>
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
        $puskaji = Puskaji::model()->findByPk($data->puskaji);
        echo   "<td>".$puskaji->nama."</td>";
        $bidang = Bidang::model()->findByPk($data->bidang);
        echo   "<td>".$bidang->nama."</td>";
        echo   "<td>".$data->nama."</td>";
        echo "<td class=\"text-left\">".CHtml::link('Unduh',array('Site/download','id'=>$data->id));
        $role=Yii::app()->user->getState('role');
        if ($role==1) {
          echo " |"
          .CHtml::link('Hapus',array('Referensi/delete','id'=>$data->id),array(
          'submit'=>array('Referensi/delete', 'id'=>$data->id),
          'class' => 'delete','confirm'=>'Anda yakin untuk menghapus layanan?'
          ))."</td>";
        }
        echo "</tr>";
      } ?>
    </tbody>
  </table>
</div>
</div>
</div>

<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/datatable/jquery.dataTables.css"/>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/datatable/jquery.dataTables.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#<?php echo $tableid;?>').dataTable({
    "sPaginationType": "full_numbers",
    "bAutoWidth": true,
  } );
});
</script>