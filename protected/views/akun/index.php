<?php $tableid = "htmlgrid";?>
<?php if(Yii::app()->user->hasFlash('successDelete')):?>
    <div class="msg-info green">
        <?php echo Yii::app()->user->getFlash('successDelete'); ?>
    </div>
<?php endif; ?>
<div>
  <h1 class="tableheading">Daftar Akun</h1>
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
    <col class="odd"></col>
    <col class="odd"></col>
    </colgroup>
    <thead>
      <th class="th-odd">No</th>
      <th class="th-even">Nama</th>
      <th class="th-odd">NIP</th>
      <th class="th-even">Username</th>
      <th class="th-odd">Email</th>
      <th class="th-even">Telepon</th>
      <th class="th-odd">Role</th>
      <th class="th-even">Provinsi</th>
      <th class="th-odd">Kab./Kota</th>
      <th class="th-even">Tindakan</th>
    </the class="th-even"ad>
    <tfoot>
      <tr>
      </tr>
    </tfoot>
    <tbody>
      <?php
	      $ii = 1;
	      foreach ($dataProvider as $data) {
	        echo "<tr>";
	        echo "<td>".$ii++."</td>";
	        echo "<td class=\"text-left\">".$data['nama']."</td>";
	        echo "<td class=\"text-left\">".$data['nip']."</td>";
	        echo "<td class=\"text-left\">".$data['username']."</td>";
	        echo "<td class=\"text-left\">".$data['email']."</td>";
          echo "<td class=\"text-left\">".$data['telp']."</td>";
	        echo "<td class=\"text-left\">".Akun::model()->getRole($data['kode_role'])."</td>";
	        if ($data['prop']!=null) {
	        	echo "<td class=\"text-left\">".$data['prop']."</td>";
	        } else {
	        	echo "<td class=\"text-left\">-</td>";
	        }
	        if ($data['kab']!=null) {
	        	echo "<td class=\"text-left\">".$data['kab']."</td>";
	        } else {
	        	echo "<td class=\"text-left\">-</td>";
	        }
	        echo "<td class=\"text-left\">".CHtml::link('Ubah',array('Akun/update','id'=>$data['username']))."|"
	        .CHtml::link('Hapus',array('Akun/delete','id'=>$data['username']),array(
	        'submit'=>array('Akun/delete', 'id'=>$data['username']),
	        'class' => 'delete','confirm'=>'Akun ini akan dihapus. Apa Anda yakin?'
	        ))."</td>";
	        echo "</tr>";
	      }
	    ?>
    </tbody>
  </table>
</div>

<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/datatable/jquery.dataTables.css"/>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/datatable/jquery.dataTables.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#<?php echo $tableid;?>').dataTable({
    "sPaginationType": "full_numbers",
    "bAutoWidth": false,
  } );
});
</script>