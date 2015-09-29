<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - Daftar Pengumpulan Laporan UKP4';
$this->breadcrumbs=array(
	'',
);
?>

<?php $tableid = "tabel-summary";?>

<?php echo $this->renderPartial('_formsummary', array('model'=>$model,'tahun'=>$tahun)); ?>

<?php 
  if($dataProvider !== null)
    if(sizeof($dataProvider) > 0) 
    {
     // echo $this->renderPartial('_view', array('dataProvider'=>$dataProvider,'hasAction'=>$hasAction,'type'=>$type)); 
      echo "<div>
        <h1 class=\"tableheading\">Daftar Unggah Laporan UKP4 Nasional Tahun ".$model->tahun."</h1>
        <table id=\"".$tableid."\" class=\"table testgrid\">
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
          <tfoot>
            <tr>
            </tr>
          </tfoot>
          <thead>
            <th>No</th>
            <th>Provinsi</th>
            <th>B03</th>
            <th>B06</th>
            <th>B09</th>
            <th>B12</th>
            <th>Detail</th>
          </thead>
          <tbody>";
          $ii = 1;
          foreach ($dataProvider as $data) {
            echo "<tr id=\"\">
                  <td>".$ii."</td>
                  <td class=\"text-left\">".$data['nama']."</td>";
            if ($data['1'] != null) {
                 echo "<td class=\"status green\">".$data['1']."</td>";
            } else {
              echo "<td class=\"status red\">".$data['1']."</td>";
            }
            if ($data['2'] != null) {
                 echo "<td class=\"status green\">".$data['2']."</td>";
            } else {
              echo "<td class=\"status red\">".$data['2']."</td>";
            }
            if ($data['3'] != null) {
                 echo "<td class=\"status green\">".$data['3']."</td>";
            } else {
              echo "<td class=\"status red\">".$data['3']."</td>";
            }
            if ($data['4'] != null) {
                 echo "<td class=\"status green\">".$data['4']."</td>";
            } else {
              echo "<td class=\"status red\">".$data['4']."</td>";
            }
            echo "<td class=\"text-left\">".CHtml::link('Lihat',array('Ukp4/history','id'=>$data['kode_prop'],'tahun'=>$model->tahun))."</td>";
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

