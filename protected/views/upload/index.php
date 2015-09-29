<?php
/* @var $this UploadController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Uploads',
);

?>
<?php if(sizeof($dataProvider) != 0): ?>
  <div class="large-7 column right">    
    <h1 class="tableheading">Riwayat Unggah</h1>
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
        <th>Tahun</th>
        <th>Jam</th>
        <th>Status</th>
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
          echo   "<td class=\"text-left\">".date_format(new DateTime($data['waktu']), 'Y-m-d')."</td>";
          echo   "<td class=\"text-left\">".date_format(new DateTime($data['waktu']), 'H:i:s')."</td>";
          echo   "<td class=\"text-left\">".$data->getStatus()."</td>";
          echo "</tr>";
        } ?>
      </tbody>
    </table>
  </div>
<?php else: ?>
  <h1 class="tableheading">Riwayat Unggah</h1>
  <h2> Anda belum memiliki riwayat unggah. </h2>
<?php endif; ?>

