<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - ';
$this->breadcrumbs=array(
	'',
);
?>
      <div>
        <div>
          <p class="subtitle">UKP4</p>
          <h1 class="tableheading">Review<br/></h1>
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
              <tr id="" class="sup-row">
                <td class="text-center th-odd">1</td>
                <td class="text-center th-even">2</td>
                <td class="text-center th-odd">3</td>
                <td class="text-center th-even">4</td>
                <td class="text-center th-odd">5</td>
                <td class="text-center th-even">6</td>
                <td class="text-center th-odd">7 = 5+6</td>
                <td class="text-center th-even">8 = 7/4</td>
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
          <form>
            <div class="form-row">
              <button class="btn green" type="submit" formmethod="post" formaction="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/pilihobat">Ubah Pilihan Obat</button>
            </div>
          </form> 
        </div>
      </div>