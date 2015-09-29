<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - Unggah';
$this->breadcrumbs=array(
	'',
);
?>
      <div class="large-8 column left">
        <div class="r-row">
          <div>
            <form class="form-inline" action="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/reviewunggahukp4" method="post">
              <fieldset>
                <div class="form-row large-2 column left">
                  <label for="periode" class="required" style="display: none;">Periode</label>
                  <select name="periode" class="" data-placeholder="Select Periode ..." style="display: inline-block; vertical-align: bottom; width: auto;">
                    <option value="">-- Pilih Periode --</option>
                    <option value="B0">B0</option>
                    <option value="B3">B3</option>
                    <option value="B6">B6</option>
                    <option value="B9">B9</option>
                    <option value="B12">B12</option>
                  </select>
                </div>
                <div class="form-row large-2 column left">
                  <button class="btn green" type="submit" style="display: inline-block; vertical-align: bottom; width: auto;">Tampilkan</button>
                </div>
              </fieldset>
            </form>
          </div> <!-- FORM END -->
        </div>
        <div class="r-row">
        <div class="overflow">
          <!-- <p class="subtitle">UKP4</p> -->
          <h1 class="tableheading">UKP4 Periode B03 2013<br/></h1>
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
              <tr>
                <th class="th-odd">No</th>
                <th class="th-even">Nama Obat</th>  
                <th class="th-odd">Kemasan</th>
                <th class="th-even">Kebutuhan <br/>Tahun 2013</th>  
                <th class="th-odd">Total Penggunaan <br/>Des '12 s.d. Mei '13</th>  
                <th class="th-even">Sisa Stok <br/>per 31 Mei '13</th>
                <th class="th-odd">Jumlah Obat <br/>dan Vaksin</th>
                <th class="th-even">% <br/>Ketersediaan</th>
              </tr>
            </thead>
            <tbody>
              <tr class="sup-row" id="">
                <td class="th-odd text-center">1</td>
                <td class="th-even text-center">2</td>
                <td class="th-odd text-center">3</td>
                <td class="th-even text-center">4</td>
                <td class="th-odd text-center">5</td>
                <td class="th-even text-center">6</td>
                <td class="th-odd text-center">7 = 5+6</td>
                <td class="th-even text-center">8 = 7/4</td>
              </tr>
              <?php for ($ii = 1; $ii <= 20; $ii++) {
                echo "<tr id=\"\">";
                echo   "<td>".$ii."</td>";
                echo   "<td class=\"text-left\">Paracetamol</td>";
                echo   "<td class=\"text-left\">Tablet</td>";
                echo   "<td>200</td>";
                echo   "<td>50</td>";
                echo   "<td>50</td>";
                echo   "<td>100</td>";
                echo   "<td>50</td>";
                echo "</tr>";
              } ?>
            </tbody>
            <tfoot class="keterangan">
              <tr id="R10">
                <td colspan="9">Keterangan :
                  <p>Laporan di atas adalah laporan periode Desember 2012 - Mei 2013</p>
                </td>
              </tr>
            </tfoot>
          </table>
        </div>
        </div>
      </div>
      <div class="large-4 column right">
        
        <h1 class="tableheading">Status UKP Kabupaten/Kota<br/>Periode Juli 2013</h1>
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
            <th>Kab./Kota</th>
            <th>Status</th>
          </thead>
          <tfoot>
            <tr>
            </tr>
          </tfoot>
          <tbody>
            <?php for ($ii = 1; $ii <= 8; $ii++) {
              echo "<tr id=\"\">";
              echo   "<td>".$ii."</td>";
              echo   "<td class=\"text-left\">Jakarta Selatan</td>";
              echo   "<td class=\"status green\">OK</td>";
              echo "</tr>";
            } ?>
          </tbody>
        </table>
      </div>

      <!-- FORM END -->
      
