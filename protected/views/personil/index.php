<?php $tableid = "htmlgrid";?>
<?php if(Yii::app()->user->hasFlash('successDelete')):?>
    <div class="msg-info green">
        <?php echo Yii::app()->user->getFlash('successDelete'); ?>
    </div>
<?php endif; ?>
<div class="row">
  <div class="box">
  <div class="col-lg-12 text-center">
      <h2 class="section-heading">Data Personil</h2>
      <?php //echo $this->renderPartial('_formSelect', array('model'=>$model, 'bidang'=>$tahun_selected)); ?>
      <h3 class="section-subheading text-muted">Bidang XYZ</h3>
      <?php
        echo CHtml::link('Tambah Personil',array('Personil/create'));
      ?>
  </div>
  <table id="<?php echo $tableid;?>" class="display compact cell-border nowrap">
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
      <th>No.</th>
      <th>Nama</th>      
      <th>Jabatan</th>
      <th>NIP</th>
      <th>Pangkat/Golongan</th>
      <th>Background<br>Pendidikan</th>
      <th>Training<br>yang Diikuti</th>
      <?php 
        $role=Yii::app()->user->getState('role');
        if ($role==1) {
          echo "<th>Aksi</th>";
        }
      ?>
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
        echo   "<td>".$data->nama."</td>";
        echo   "<td class=\"text-left\">".$data->jabatan."</td>";
        echo   "<td class=\"text-left\">".$data->nip."</td>";
        echo   "<td class=\"text-left\">".$data->pangkat."</td>";
        echo   "<td class=\"text-left\">".$data->background."</td>";
        echo   "<td class=\"text-left\">".$data->training."</td>";
        if ($role==1) {
          echo "<td class=\"text-left\">".CHtml::link('Ubah',array('Personil/update','id'=>$data->id))." |"
          .CHtml::link('Hapus',array('Personil/delete','id'=>$data->id),array(
          'submit'=>array('Personil/delete', 'id'=>$data->id),
          'class' => 'delete','confirm'=>'Anda yakin untuk menghapus personil?'
          ))."</td>";
        }
        echo "</tr>";
      } ?>
    </tbody>
  </table>
</div>
</div>

<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/datatable/jquery.dataTables.css"/>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/datatable/jquery.dataTables.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#<?php echo $tableid;?>').dataTable({
    "sPaginationType": "full_numbers",
    "bAutoWidth": true,
  } );
});
</script>