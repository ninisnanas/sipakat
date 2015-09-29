<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - ';
$this->breadcrumbs=array(
  '',
);
?>

      <div>
        <h1>Daftar Ketersediaan Obat</h1>
        <form action="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/ketersediaanobat" method="post">
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
              <th>Pilih</th>
              <th>Kode Obat</th>
              <th>Nama Obat</th>
              <th>Satuan</th>
              <th>Kelompok Obat</th>
            </thead>
            <tfoot>
              <tr>
              </tr>
            </tfoot>
            <tbody>
              <?php for ($ii = 1; $ii <= 10; $ii++) {
                echo "<tr id=\"\">";
                echo   "<td>".$ii."</td>";
                echo   "<td class=\"pilih\"><input type=\"checkbox\" name=\"pilihan\" value=".$ii." /></td>";
                echo   "<td>85465</td>";
                echo   "<td class=\"text-left\">Paracetamol</td>";
                echo   "<td class=\"text-left\">Tablet</td>";
                echo   "<td class=\"text-left\">Paracetamol</td>";
                echo "</tr>";
              } ?>
            </tbody>
          </table>

          <div class="form-row">
            <button class="btn push170 green" type="submit">Daftar ketersediaan Obat</button>
          </div>
        </form>
      </div>