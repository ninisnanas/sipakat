<h1 class="tableheading">Riwayat Unggah Terakhir</h1>
<?php if (sizeof($dataProvider) !== 0): ?>
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
      $ii =($pages->getCurrentPage()*$pages->getPageSize()) + 1;
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
<?php else: ?>
  <h2> Anda belum memiliki riwayat unggah. </h2>
<?php endif; ?>