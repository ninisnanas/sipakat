<?php $tableid = "htmlgrid";?>
<?php if(Yii::app()->user->hasFlash('successDelete')):?>
    <div class="msg-info green">
        <?php echo Yii::app()->user->getFlash('successDelete'); ?>
    </div>
<?php endif; ?>
<div class="row">
  <div class="box">
  <div class="col-lg-12 text-center">
      <h2 class="section-heading">Daftar Akun</h2>
      <?php
      if(Yii::app()->user->getState('role') == Akun::ADMIN)
        echo CHtml::link('Tambah',array('Akun/create'));
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
    </colgroup>
    <thead>
      <th>No.</th>
      <th>Nama Personil</th>      
      <th>Username</th>
      <th>Role</th>
      <?php if(Yii::app()->user->getState('role') == Akun::ADMIN) {
		      echo "<th>Aksi</th>";
	  		}?>
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
        $pers = Personil::model()->findByPk($data->id_personil);
        echo   "<td>".$pers['nama']."</td>";
        echo   "<td class=\"text-left\">".$data->username."</td>";
        $role = Akun::model()->getRole($data->kode_role);
        echo   "<td class=\"text-left\">".$role."</td>";
        if (Yii::app()->user->getState('role') == Akun::ADMIN) {
            echo "<td class=\"text-left\">".CHtml::link('Ubah',array('Akun/update','id'=>$data->id))." |"
            .CHtml::link('Hapus',array('Akun/delete','id'=>$data->id),array(
            'submit'=>array('Akun/delete', 'id'=>$data->id),
            'class' => 'delete','confirm'=>'Anda yakin untuk menghapus akun?'
            ))."</td>";
          }
        echo "</tr>";
        }
        ?>
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
    "scrollX": true,
    "sInfo" : false,
    "bAutoWidth": true,
  } );
});
</script>