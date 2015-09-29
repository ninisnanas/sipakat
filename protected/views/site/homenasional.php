<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - Unggah';
$this->breadcrumbs=array(
	'',
);
?>
<?php $tableid = "tabelku";?>
      <div class="r-row">
        <div>
          <form class="form-inline" action="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/reviewunggahukp4" method="post">
            <fieldset>
              <legend>Nyam</legend>
              <div class="form-row large-2 column left">
                <label for="periode" class="required" style="display: none">Periode</label>
                <select name="periode" class="" data-placeholder="Select Periode ...">
                  <option value="">-- Pilih Periode --</option>
                  <option value="B02013">B0 2013</option>
                  <option value="B32013">B3 2013</option>
                  <option value="B62013">B6 2013</option>
                  <option value="B92013">B9 2013</option>
                  <option value="B122013">B1 20132</option>
                </select>
              </div>
              <div class="form-row large-2 column left">
                <button class="btn green" type="submit">Tampilkan</button>
              </div>
              <div class="form-row">
                
              </div>
            </fieldset>
          </form>
        </div> <!-- FORM END -->
      </div>
      <div class="r-row">
        <div class="overflow">
          <!-- <p class="subtitle">UKP4</p> -->
          <h1 class="tableheading">UKP4 Periode B06 2013<br/></h1>
          <table id="<?php echo $tableid;?>" class="table testgrid">
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
      <div class="r-row">
        <h1 class="tableheading">Status UKP Kabupaten/Kota Periode Juli 2013</h1>
        <div>
          <form class="form-inline" action="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/" method="post">
            <fieldset>
              <legend>Nyam</legend>
              <div class="form-row large-2 column left">
                <label for="periode" class="required" style="display: none">Periode</label>
                <select name="periode" class="" data-placeholder="Select Periode ...">
                  <option value="">-- Pilih Periode --</option>
                  <option value="B02013">B0 2013</option>
                  <option value="B32013">B3 2013</option>
                  <option value="B62013">B6 2013</option>
                  <option value="B92013">B9 2013</option>
                  <option value="B122013">B1 20132</option>
                </select>
              </div>
              <div class="form-row large-2 column left">
                <label for="provinsi" class="required" style="display: none">Provinsi</label>
                <select name="provinsi" class="" data-placeholder="Select Provinsi ...">
                  <option value="">-- Pilih Provinsi --</option>
                  <option>DKI Jakarta</option>
                  <option>Banten</option>
                  <option>Jawa Barat</option>
                </select>
              </div>
              <div class="form-row large-2 column left">
                <button class="btn green" type="submit">Tampilkan</button>
              </div>
              <div class="form-row">
                
              </div>
            </fieldset>
          </form>
        </div> <!-- FORM END -->
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
            <?php $provlist = array("Jakarta Utara","Jakarta Timur","Jakarta Selatan", "Jakarta Barat","Jakarta Pusat","Kep. Seribu");
              for ($ii = 1; $ii <= 6; $ii++) {
              echo "<tr id=\"\">";
              echo   "<td>".$ii."</td>";
              echo   "<td class=\"text-left\">".$provlist[$ii-1]."</td>";
              echo   "<td class=\"status green\">OK</td>";
              echo "</tr>";
            } ?>
          </tbody>
        </table>
      </div>

      <!-- FORM END -->
      

<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/datatable/jquery.dataTables.css"/>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/datatable/jquery.dataTables.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#<?php echo $tableid;?>').dataTable({
    "sPaginationType": "full_numbers"
  } );
});
</script>