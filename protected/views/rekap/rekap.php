<?php
/* @var $this UploadController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Uploads',
);

?>

<div class="large-7 column right">
        
        <h1 class="tableheading">Coba</h1>
        <table id="htmlgrid" class="table testgrid">
          <colgroup>
          <col class="odd"></col>
          <col class="even"></col>
          <col class="odd"></col>
          <col class="even"></col>
          <col class="odd"></col>
          <col class="even"></col>
          <col class="odd"></col>
          <col class="even"></col>
          <col class="odd"></col>
          </colgroup>
          <thead>
            <th>No</th>
            <th>Nama Obat</th>
            <th>Kemasan</th>
            <th>Kebutuhan</th>
            <th>Total Penggunaan</th>
            <th>Sisa Stok</th>
            <th>Jumlah</th> 
            <th>Ketersediaan</th>
            <th></th>
          </thead>
          <tfoot>
            <tr>
            </tr>
          </tfoot>
          <tbody>
            <?php 
              $ii = 1;
              foreach($line_item as $data){
              echo "<tr id=\"\">";
              echo   "<td>".$ii++."</td>";
              echo   "<td class=\"text-left\">".$data['nama']."</td>";
              echo   "<td class=\"text-left\">".$data['satuan']."</td>";
              echo   "<td class=\"text-left\">".$data['kebutuhan']."</td>";
              echo   "<td class=\"text-left\">".$data['total_penggunaan']."</td>";
              echo   "<td class=\"text-left\">".$data['sisa_stok']."</td>";
              echo   "<td class=\"text-left\">".($data['total_penggunaan']+$data['sisa_stok'])."</td>";
              echo   "<td class=\"text-left\">".round(($data['total_penggunaan']+$data['sisa_stok'])*100/$data['kebutuhan'],2)."%"."</td>";
              echo "</tr>";
            } ?>
          </tbody>
        </table>
         <?php
            if($level == 0){
              echo CHtml::link('Lihat Detail Provinsi',array('listprovinsi'));
            }
            else if($level == 1){
              echo CHtml::link('Lihat Detail Kabupaten',array('listkabupaten','kode_prop'=>$kode_prop));
            }
          ?>
      </div>