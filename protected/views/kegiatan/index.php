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
      <?php
        if(Yii::app()->user->getState('role') == Akun::ADMIN)
          echo CHtml::link('Tambah',array('Kegiatan/create'));
          echo "<br></br>"
      ?>
  </div>
  <?php echo $this->renderPartial('_formdropdown', array('puskaji' => $puskaji, 'bidang' => $bidang, 'tahun_selected' => $tahun_selected, 'tahun' => $tahun));

  if($dataProvider != null) {
    echo "<table id=\""; echo $tableid; echo "\" class=\"display compact cell-border nowrap\">
      <colgroup>
      <col class=\"odd\"></col>
      <col class=\"even\"></col>
      <col class=\"odd\"></col>
      <col class=\"even\"></col>
      <col class=\"odd\"></col>
      <col class=\"even\"></col>
      <col class=\"odd\"></col>
      <col class=\"even\"></col>
      <col class=\"odd\"></col>
      </colgroup>
      <thead>
        <th>No.</th>
        <th>Nama Kegiatan</th>
        <th>Anggaran</th>
        <th>% Anggaran</th>
        <th>Waktu</th>
        <th>% Kinerja</th>
        <th>Nomor Surat Perintah</th>
        <th>Aksi</th>;
      </thead>
      <tfoot>
        <tr>
        </tr>
      </tfoot>
      <tbody>";

          $ii = 1;
          foreach($dataProvider as $data){
          echo "<tr id=\"\">";
          echo   "<td>".$ii++."</td>";
          echo   "<td>".$data->nama."</td>";
          echo   "<td>".$data->anggaran."</td>";
          echo   "<td>".$data->persen_anggaran."%</td>";
          echo   "<td>".$data->waktu."</td>";
          echo   "<td>".$data->persen_waktu."%</td>";
          echo   "<td>".$data->nomor_sp."</td>";
          echo "<td class=\"text-left\">".CHtml::link('Lihat',array('DetailKegiatan/index','id'=>$data->id, 'nama_kegiatan'=>$data->nama));
          if (Yii::app()->user->getState('role') == Akun::ADMIN) {
            echo " |".CHtml::link('Ubah',array('Kegiatan/update','id'=>$data->id))." |"
            .CHtml::link('Hapus',array('Kegiatan/delete','id'=>$data->id),array(
            'submit'=>array('Kegiatan/delete', 'id'=>$data->id),
            'class' => 'delete','confirm'=>'Anda yakin untuk menghapus kegiatan?'
            ));
          }
          echo "</td></tr>";
        }
      echo "</tbody>
    </table>";
  } else {
  echo "Silakan pilih Puskaji/Bidang terlebih dahulu.";
  } ?>
</div>
</div>

<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/datatable/jquery.dataTables.css"/>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/datatable/jquery.dataTables.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#<?php echo $tableid;?>').dataTable({
    "sPaginationType": "full_numbers",
    "scrollX": true,
    "bAutoWidth": true,
  } );
});
</script>