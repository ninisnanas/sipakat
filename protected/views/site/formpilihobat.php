<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - ';
$this->breadcrumbs=array(
  '',
);
?>
<?php $tableid = "tabelku";?>
      <div>
        <h1 class="tableheading">Pilih Obat</h1>
        <form action="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/ukp4" method="post">
          <table id="<?php echo $tableid;?>" class="table testgrid tablesorter">
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
              <th>Pabrik</th>
            </thead>
            <tfoot>
              <tr>
              </tr>
            </tfoot>
            <tbody>
              <?php for ($ii = 10; $ii <= 20; $ii++) {
                echo "<tr id=\"\">";
                echo   "<td>".$ii."</td>";
                echo   "<td class=\"pilih\"><input type=\"checkbox\" name=\"pilihan\" value=".$ii." /></td>";
                echo   "<td>854".$ii."</td>";
                echo   "<td class=\"text-left\">Paracetamol</td>";
                echo   "<td class=\"text-left\">Tablet</td>";
                echo   "<td class=\"text-left\">Bekasi</td>";
                echo "</tr>";
              } ?>
            </tbody>
          </table>

          <div class="form-row">
            <button class="btn green" type="submit" formaction="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/pilihobat">Simpan</button>
            <button class="btn green" type="submit">Lanjutkan</button>
          </div>
        </form>
      </div>
      <!-- Table Sorter -->
      <!-- 
      <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/tablesorter/style.css"/>
      <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.9.1.min.js"></script>
      <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/tablesorter/jquery.tablesorter.min.js"></script>
      <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/tablesorter/jquery.metadata.js"></script>
      <script type="text/javascript">
        $(document).ready(function() 
            { 
                $("#<?php echo $tableid;?>").tablesorter(); 
            } 
        ); 
      </script> 
      -->
      <!-- Data Table -->
      <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/datatable/jquery.dataTables.css"/>
      <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.9.1.min.js"></script>
      <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/datatable/jquery.dataTables.min.js"></script>
      <script type="text/javascript">
      $(document).ready(function(){
          $('#<?php echo $tableid;?>').dataTable();
      });
      </script>