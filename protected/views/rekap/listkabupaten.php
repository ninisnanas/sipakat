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
            <th>Nama Kabupaten</th>
            <th>Action</th>
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
              echo   "<td class=\"text-left\">".CHtml::link('Lihat Detail',array('detailKabupaten','id_kabupaten'=>$data['kode_kab']));
              echo "</tr>";
            } ?>
          </tbody>
        </table>
      </div>