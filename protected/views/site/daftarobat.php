<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - ';
$this->breadcrumbs=array(
  '',
);
?>

      <div>
        <h1 class="tableheading">Daftar Obat</h1>
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
          </colgroup>
          <thead>
            <th>No</th>
            <th>Kode Obat</th>
            <th>Nama Obat</th>
            <th>Satuan</th>
            <th>Kelompok Obat</th>
            <th>Tindakan</th>
          </thead>
          <tfoot>
            <tr>
            </tr>
          </tfoot>
          <tbody>
            <?php for ($ii = 1; $ii <= 20; $ii++) {
              echo "<tr id=\"\">";
              echo   "<td>".$ii."</td>";
              echo   "<td>85465</td>";
              echo   "<td class=\"text-left\">Paracetamol</td>";
              echo   "<td class=\"text-left\">Tablet</td>";
              echo   "<td class=\"text-left\">Paracetamol</td>";
              echo   "<td class=\"text-left\"><a href=\"\">lihat</a> | <a href=\"\">ubah</a> | <a href=\"\">hapus</a></td>";
              echo "</tr>";
            } ?>
          </tbody>
        </table>
      </div>