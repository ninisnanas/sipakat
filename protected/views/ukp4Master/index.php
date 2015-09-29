<div>
  <h1 class="tableheading">Daftar Obat UKP4</h1>
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
      <th>Nama Obat</th>
      <th>Satuan</th>
      <th>Tindakan</th>
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
		    echo   "<td class=\"text-left\">".$data->kodeObat->nama."</td>";
		    echo   "<td class=\"text-left\">".$data->kodeObat->satuan."</td>";
		    echo "<td class=\"text-left\">"
	        .CHtml::link('Hapus',array('Ukp4Master/delete','id'=>$data->id),array(
	        'submit'=>array('Ukp4Master/delete', 'id'=>$data->id),
	        'class' => 'delete','confirm'=>'This will remove the image. Are you sure?'
	        ))."</td>";
		    echo "</tr>";
		  } ?>
    </tbody>
  </table>

  <div class="r-row">
    <hr class="green"/>
    <?php 
      echo "Unduh Template UKP4: ";
      echo CHtml::link('B03', array('Ukp4Master/download', 'id'=>1))." | ";
      echo CHtml::link('B06', array('Ukp4Master/download', 'id'=>2))." | ";
      echo CHtml::link('B09', array('Ukp4Master/download', 'id'=>3))." | ";
      echo CHtml::link('B12', array('Ukp4Master/download', 'id'=>4));  
    ?>
  </div>
  <p></p>
</div>