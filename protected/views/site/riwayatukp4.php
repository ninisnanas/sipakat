<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - ';
$this->breadcrumbs=array(
  '',
);
?>

      <div>
        <h1 class="tableheading">Riwayat Unggah UKP4</h1>
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
            <th>Periode</th>
            <th>Status</th>
            <th>Tindakan</th>
          </thead>
          <tfoot>
            <tr>
            </tr>
          </tfoot>
          <tbody>
            <?php for ($ii = 1; $ii <= 8; $ii++) {
              echo "<tr id=\"\">";
              echo   "<td>".$ii."</td>";
              echo   "<td class=\"text-left\">Juli 2013</td>";
              echo   "<td class=\"status green\">OK</td>";
              echo   "<td class=\"text-left\"><a href=\"\">lihat</a></td>";
              echo "</tr>";
            } ?>  
          </tbody>
        </table>
      </div>