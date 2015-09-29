<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - Rincian Pengumpulan Laporan UKP4';
$this->breadcrumbs=array(
	'',
);
?>

<?php 
  if ($prov)
    echo $this->renderPartial('_formhistory', array('model'=>$model,'tahun'=>$tahun));
?>

<?php
  if($dataProvider !== null)
    if(sizeof($dataProvider) > 0) 
    {
     // echo $this->renderPartial('_view', array('dataProvider'=>$dataProvider,'hasAction'=>$hasAction,'type'=>$type)); 
      echo "<div>
        <h1 class=\"tableheading\">Daftar Unggah Laporan UKP4 Provinsi ".$nama_prop[0]['nama']." Tahun ".$tahun_selected."</h1>
        <table id=\"htmlgrid\" class=\"table testgrid\">
          <colgroup>
            <col class=\"odd\"></col>
            <col class=\"even\"></col>
            <col class=\"odd\"></col>
            <col class=\"even\"></col>
            <col class=\"odd\"></col>
            <col class=\"even\"></col>
            <col class=\"odd\"></col>
            <col class=\"even\"></col>
          </colgroup>
          <tfoot>
            <tr>
            </tr>
          </tfoot>
          <thead>
            <th>No</th>
            <th>Kabupaten</th>
            <th>B03</th>
            <th>B06</th>
            <th>B09</th>
            <th>B12</th>
          </thead>
          <tbody>";
          $ii = 1;
          foreach ($dataProvider as $data) {
            echo "<tr id=\"\">
                  <td>".$ii."</td>
                  <td class=\"text-left\">".$data['nama']."</td>";
            if ($data['1'] == 1) {
                 echo "<td class=\"status green\">".round($data['val'])."%</td>";
            } else {
              echo "<td class=\"status red\">X</td>";
            }
            if ($data['2'] == 1) {
                 echo "<td class=\"status green\">".round($data['val'])."%</td>";
            } else {
              echo "<td class=\"status red\">X</td>";
            }
            if ($data['3'] == 1) {
                 echo "<td class=\"status green\">".round($data['val'])."%</td>";
            } else {
              echo "<td class=\"status red\">X</td>";
            }
            if ($data['4'] == 1) {
                 echo "<td class=\"status green\">".round($data['val'])."%</td>";
            } else {
              echo "<td class=\"status red\">X</td>";
            }
            echo "</tr>";
            $ii++;
          }            
          echo "  
          </tbody>
        </table>
      </div>";
    }
    else 
      echo "Tidak terdapat riwayat UKP4 yang sesuai";
    else echo "Pilih tahun terlebih dahulu";
?>
