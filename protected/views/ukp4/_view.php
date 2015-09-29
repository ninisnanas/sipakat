<div>
  <?php $tableid = "tabelku";?>
  <div>
    <p class="subtitle">UKP4</p>
    <?php if($type == Ukp4::NASIONAL)
        echo '<h1 class="tableheading">Rekapitulasi Nasional<br/></h1>'; 
      else if($type == Ukp4::PROVINSI)
        echo '<h1 class="tableheading">Rekapitulasi Provinsi<br/></h1>';
      else if($type == Ukp4::KABUPATEN)
        echo '<h1 class="tableheading">Review Kabupaten<br/></h1>';
    ?>
    <table id="<?php echo $tableid;?>" class="table testgrid">
      <colgroup>
        <col class="odd"></col>
        <col class="even no-wrap"></col>
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
          <th class="th-even">Nama Obat</th> 
          <th class="th-odd">Kemasan</th>
          <th class="th-even">Kebutuhan <br/>Tahun <?php echo $tahun_ukp; ?></th>  
          <?php 
            if ($triwulan==1) {
              echo "<th class=\"th-odd\">Total Penggunaan <br/>Bulan Desember 2012 s/d <br/>Bulan Februari 2013</th>";
              echo "<th class=\"th-even\">Sisa Stok <br/>per 28 Februari 2013</th>";
            } else if ($triwulan==2) {
              echo "<th class=\"th-odd\">Total Penggunaan <br/>Bulan Desember 2012 s/d <br/>Bulan Mei 2013</th>";
              echo "<th class=\"th-even\">Sisa Stok <br/>per 31 Mei 2013</th>";
            } else if ($triwulan==3) {
              echo "<th class=\"th-odd\">Total Penggunaan <br/>Bulan Desember 2012 s/d <br/>Bulan Agustus 2013</th>";
              echo "<th class=\"th-even\">Sisa Stok <br/>per 31 Agustus 2013</th>";
            } else {
              echo "<th class=\"th-odd\">Total Penggunaan <br/>Bulan Desember 2012 s/d <br/>Bulan November 2013</th>";
              echo "<th class=\"th-even\">Sisa Stok <br/>per 30 November 2013</th>";
            }
          ?>
          <th class="th-odd">Jumlah Obat <br/>dan Vaksin</th>
          <th class="th-even">% <br/>Ketersediaan</th>
          <?php if(Yii::app()->user->getState('role') == 3 && $hasAction) {
          	echo "<th class=\"th-odd\">Fungsi</th>";
          }
          ?>
        </tr>
      </thead>
    <tbody>
      <?php 
        $ii = 1;
        $sum = 0;
        foreach($dataProvider as $data){
        echo "<tr id=\"\">";
        echo   "<td>".$ii++."</td>";
        if(Yii::app()->user->getState('role') == 3 && !$hasAction)
        {
          echo   "<td class=\"text-left\">".CHtml::link($data['nama'],array('Ukp4/detail','kode_obat'=>$data['kode_obat'],'triwulan'=>$model['triwulan'],'tahun'=>$model['tahun']))."</td>";          
        } else {
          echo   "<td class=\"text-left\">".$data['nama']."</td>";
        }
        echo   "<td class=\"text-left\">".$data['satuan']."</td>";
        echo   "<td class=\"text-left\">".$data['kebutuhan']."</td>";
        echo   "<td class=\"text-left\">".$data['total_penggunaan']."</td>";
        echo   "<td class=\"text-left\">".$data['sisa_stok']."</td>";
        echo   "<td class=\"text-left\">".$data['jumlah']."</td>";
        echo   "<td class=\"text-left\">".$data['ketersediaan']."%"."</td>";
        $sum+=$data['ketersediaan'];
        if(Yii::app()->user->getState('role') == 3 && $hasAction)
        {
          echo   "<td class=\"text-left\">".CHtml::link('Edit',array('ukp4lineitem/update','id'=>$data['id'])).'|'.
                  CHtml::link('Hapus',array('ukp4lineitem/delete','id'=>$data['id']),array(
                  'submit'=>array('ukp4lineitem/delete', 'id'=>$data['id']),
                  'class' => 'delete','confirm'=>'This will remove the image. Are you sure?'
          ));
        }
        echo "</tr>";
      } 
      echo "<h3>Persentase Ketersediaan: ".round($sum/($ii-1),2)."%</h3>";

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
