<?php $tableid = "tabelku";?>
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
      <tr>
        <th class="th-odd">No</th>
        <?php
          if($type == 1) {
            echo "<th class=\"th-even\">Nama Provinsi</th>";
          } else if($type == 2){
            echo "<th class=\"th-even\">Nama Kabupaten</th>";        
          }
        ?>
        <th class="th-odd">Kebutuhan Tahun <?php echo $tahun; ?></th>  
        <?php 
          if ($triwulan==1) {
            echo "<th class=\"th-even\">Total Penggunaan Bulan Jan 2013 s/d Bulan Maret 2013</th>";
            echo "<th class=\"th-odd\">Sisa Stok per 31 Mei 2013</th>";
          } else if ($triwulan==2) {
            echo "<th class=\"th-even\">Total Penggunaan Bulan April 2013 s/d Bulan Juni 2013</th>";
            echo "<th class=\"th-odd\">Sisa Stok per 31 Agustus 2013</th>";
          } else if ($triwulan==3) {
            echo "<th class=\"th-even\">Total Penggunaan Bulan Juli 2013 s/d Bulan September 2013</th>";
            echo "<th class=\"th-odd\">Sisa Stok per 31 November 2013</th>";
          } else {
            echo "<th class=\"th-even\">Total Penggunaan Bulan Oktober 2013 s/d Bulan Desember 2013</th>";
            echo "<th class=\"th-odd\">Sisa Stok per 31 Februari 2014</th>";
          }
        ?>
        <th class="th-even">Jumlah Obat <br/>dan Vaksin</th>
        <th class="th-odd">% <br/>Ketersediaan</th>
      </tr>
    </thead>
  <tbody>
    <?php 
      $ii = 1;
      foreach($dataProvider as $data){
      echo "<tr id=\"\">";
      echo   "<td>".$ii++."</td>";
      if($type == 1) {
        echo "<td class=\"text-left\">".CHtml::link($data['nama'],array('Ukp4/detail','kode_obat'=>$model['kode_obat'],'triwulan'=>$triwulan,'tahun'=>$tahun,'kode_prop'=>$data['kode_prop']))."</td>";
      } else if($type == 2)
      {
        echo "<td class=\"text-left\">".CHtml::link($data['nama'],array('Ukp4/detail','kode_obat'=>$model['kode_obat'],'triwulan'=>$triwulan,'tahun'=>$tahun,'kode_prop'=>$data['kode_prop'],'kode_kab'=>$data['kode_kab']))."</td>";        
      }
      echo   "<td class=\"text-left\">".$data['kebutuhan']."</td>";
      echo   "<td class=\"text-left\">".$data['total_penggunaan']."</td>";
      echo   "<td class=\"text-left\">".$data['sisa']."</td>";
      echo   "<td class=\"text-left\">".$data['jumlah']."</td>";
      echo   "<td class=\"text-left\">".$data['ketersediaan']."%"."</td>";
      echo "</tr>";
    } ?>
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
