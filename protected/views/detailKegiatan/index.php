<?php $tableid = "htmlgrid";?>
<?php if(Yii::app()->user->hasFlash('successDelete')):?>
    <div class="msg-info green">
        <?php echo Yii::app()->user->getFlash('successDelete'); ?>
    </div>
<?php endif; ?>
<div class="row">
  <div class="box">
  <div class="col-lg-12 text-center">
      <h2 class="section-heading">Detil Kegiatan</h2>
      <h3 class="section-subheading text-muted">Bidang XYZ</h3>
      <?php
        echo CHtml::link('Tambah Detail Kegiatan',array('DetailKegiatan/create'));
      ?>
  </div>
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
      <tr>
        <th class="dt-head-center" rowspan="3">No.</th>
        <th class="dt-head-center" rowspan="3">Nama Kegiatan</th>
        <th class="dt-head-center" rowspan="3">Anggaran</th>
        <th class="dt-head-center" rowspan="3">% Anggaran</th>
        <th class="dt-head-center" rowspan="3">Waktu</th>
        <th class="dt-head-center" rowspan="3">% Administrasi</th>
		<?php 
		$role=Yii::app()->user->getState('role');
		if ($role==1) {
		echo "<th class=\"dt-head-center\" rowspan=\"3\">Aksi</th>";
		}
		?>

        <th class="dt-head-center" colspan="144">Periode</th>
      </tr>
      <tr>
        <th class="dt-head-center" colspan="4">Januari</th>
        <th class="dt-head-center" colspan="4">Februari</th>
        <th class="dt-head-center" colspan="4">Maret</th>
        <th class="dt-head-center" colspan="4">April</th>
        <th class="dt-head-center" colspan="4">Mei</th>
        <th class="dt-head-center" colspan="4">Juni</th>
        <th class="dt-head-center" colspan="4">Juli</th>
        <th class="dt-head-center" colspan="4">Agustus</th>
        <th class="dt-head-center" colspan="4">September</th>
        <th class="dt-head-center" colspan="4">Oktober</th>
        <th class="dt-head-center" colspan="4">November</th>
        <th class="dt-head-center" colspan="4">Desember</th>
      </tr>

      <tr>
        <th>1</th>
        <th>2</th>
        <th>3</th>
        <th>4</th>
        <th>1</th>
        <th>2</th>
        <th>3</th>
        <th>4</th>
        <th>1</th>
        <th>2</th>
        <th>3</th>
        <th>4</th>
        <th>1</th>
        <th>2</th>
        <th>3</th>
        <th>4</th>
        <th>1</th>
        <th>2</th>
        <th>3</th>
        <th>4</th>
        <th>1</th>
        <th>2</th>
        <th>3</th>
        <th>4</th>
        <th>1</th>
        <th>2</th>
        <th>3</th>
        <th>4</th>
        <th>1</th>
        <th>2</th>
        <th>3</th>
        <th>4</th>
        <th>1</th>
        <th>2</th>
        <th>3</th>
        <th>4</th>
        <th>1</th>
        <th>2</th>
        <th>3</th>
        <th>4</th>
        <th>1</th>
        <th>2</th>
        <th>3</th>
        <th>4</th>
        <th>1</th>
        <th>2</th>
        <th>3</th>
        <th>4</th>
      </tr>
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
        echo   "<td class=\"text-left\">".$data->anggaran."</td>";
        echo   "<td class=\"text-left\">".$data->persen_anggaran."%</td>";
        echo   "<td class=\"text-left\">".$data->waktu."</td>";
        echo   "<td class=\"text-left\">".$data->persen_waktu."%</td>";
        if ($role==1) {
          echo "<td class=\"text-left\">".CHtml::link('Ubah',array('DetailKegiatan/update','id'=>$data->id))." |"
          .CHtml::link('Hapus',array('DetailKegiatan/delete','id'=>$data->id),array(
          'submit'=>array('DetailKegiatan/delete', 'id'=>$data->id),
          'class' => 'delete','confirm'=>'Anda yakin untuk menghapus detil kegiatan?'
          ))."</td>";
        }
        for($a=1; $a<=12; $a++) {
        	for($b=1; $b<=4; $b++) {
        		$val = "w".$a.$b;
        		if($data->$val == 1) {
        			if($data->kode == 'A') {
        				echo "<td bgcolor=\"#FF0000\">A".$data->id_kegiatan."</td>";
        			} else if ($data->kode == 'B') {
        				echo "<td bgcolor=\"#00FF00\">B".$data->id_kegiatan."</td>";
        			} else if ($data->kode == 'C') {
        				echo "<td bgcolor=\"#FFFF00\">C".$data->id_kegiatan."</td>";
        			} else {
        				echo "<td bgcolor=\"#0000FF\">D".$data->id_kegiatan."</td>";
        			}
        		} else {
        			echo "<td></td>";
        		}
        	}
        }
        echo "</tr>";
      } ?>
    </tbody>
  </table>
</div>
</div>

<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/datatable/jquery.dataTables.css"/>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/datatable/jquery.dataTables.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#<?php echo $tableid;?>').dataTable({
    "scrollX": true,
    "paging":   false,
    "ordering": false,
    "info":     false
  } );
});
</script>