<?php $tableid = "htmlgrid";?>
<?php if(Yii::app()->user->hasFlash('successDelete')):?>
    <div class="msg-info green">
        <?php echo Yii::app()->user->getFlash('successDelete'); ?>
    </div>
<?php endif; ?>
<div class="row">
  <div class="box">
  <div class="col-lg-12 text-center">
      <h2 class="section-heading">Detil Kegiatan Personil</h2>
  </div>

  <?php echo $this->renderPartial('_formdropdown', array('puskaji' => $puskaji, 'bidang' => $bidang, 'tahun_selected' => $tahun_selected, 'tahun' => $tahun));

  if($dataProvider != null) {
  echo "<table id=\""; echo $tableid; echo "\" class=\"display compact cell-border nowrap\">
    <colgroup>
    <col class=\"odd\"></col>
    <col class=\"even\"></col>
    <col class=\"odd\"></col>
    <col class=\"even\"></col>
    <col class=\"odd\"></col>
    <col class=\"even\"></col>
    <col class=\"odd\"></col>
    <col class=\"even\"></col>
    </colgroup>
    <thead>
      <tr>
        <th class=\"dt-head-center\" rowspan=\"3\">No.</th>
        <th class=\"dt-head-center\" rowspan=\"3\">Nama Personil</th>
        <th class=\"dt-head-center\" colspan=\"48\">Periode</th>";
        
		if (Yii::app()->user->getState('role') == Akun::ADMIN) {
		  echo "<th class=\"dt-head-center\" rowspan=\"3\">Aksi</th>";
		}
		
        echo "
      </tr>
      <tr>
        <th class=\"dt-head-center\" colspan=\"4\">Januari</th>
        <th class=\"dt-head-center\" colspan=\"4\">Februari</th>
        <th class=\"dt-head-center\" colspan=\"4\">Maret</th>
        <th class=\"dt-head-center\" colspan=\"4\">April</th>
        <th class=\"dt-head-center\" colspan=\"4\">Mei</th>
        <th class=\"dt-head-center\" colspan=\"4\">Juni</th>
        <th class=\"dt-head-center\" colspan=\"4\">Juli</th>
        <th class=\"dt-head-center\" colspan=\"4\">Agustus</th>
        <th class=\"dt-head-center\" colspan=\"4\">September</th>
        <th class=\"dt-head-center\" colspan=\"4\">Oktober</th>
        <th class=\"dt-head-center\" colspan=\"4\">November</th>
        <th class=\"dt-head-center\" colspan=\"4\">Desember</th>
      </tr>

      <tr>
        <th>1</th>
        <th>2</th>
        <th>3</th>
        <th>4</th>
        <th>1</th>
        <th>2</th>
        <th>3</th>
        <th>4</th>
        <th>1</th>
        <th>2</th>
        <th>3</th>
        <th>4</th>
        <th>1</th>
        <th>2</th>
        <th>3</th>
        <th>4</th>
        <th>1</th>
        <th>2</th>
        <th>3</th>
        <th>4</th>
        <th>1</th>
        <th>2</th>
        <th>3</th>
        <th>4</th>
        <th>1</th>
        <th>2</th>
        <th>3</th>
        <th>4</th>
        <th>1</th>
        <th>2</th>
        <th>3</th>
        <th>4</th>
        <th>1</th>
        <th>2</th>
        <th>3</th>
        <th>4</th>
        <th>1</th>
        <th>2</th>
        <th>3</th>
        <th>4</th>
        <th>1</th>
        <th>2</th>
        <th>3</th>
        <th>4</th>
        <th>1</th>
        <th>2</th>
        <th>3</th>
        <th>4</th>
      </tr>
    </thead>
    <tfoot>
      <tr>
      </tr>
    </tfoot>
    <tbody>";
      
        $ii = 1;
        foreach($dataProvider as $data){
        echo "<tr id=\"\">";
        echo   "<td>".$ii++."</td>";
        echo   "<td>".$data['nama']."</td>";
        for($a=1; $a<=12; $a++) {
        	for($b=1; $b<=4; $b++) {
        		$val = "w".$a.$b;
        		if($data[$val] != NULL) {
        			$detail=DetailKegiatan::model()->getKodeKegiatan($data[$val]);
        			$bgcolor = WarnaKegiatan::model()->findByPk($detail['kode']);
                    echo "<td bgcolor=\"#".$bgcolor['kode']."\">".chr(64+$bgcolor['id']).$detail['id_kegiatan']."</td>";
        		} else {
        			echo "<td></td>";
        		}
        	}
        }
        if (Yii::app()->user->getState('role') == Akun::ADMIN) {
          echo "<td class=\"text-left\">".CHtml::link('Tambah',array('DetailKegiatanPersonil/addKegiatan','id'=>$data['id'], 'id_personil'=>$data['id_personil']))." |"
          .CHtml::link('Hapus',array('DetailKegiatanPersonil/deleteKegiatan','id'=>$data['id']))."</td>";
        }
        echo "</tr>";
      }
    echo "
    </tbody>
  </table>";
    } ?>
</div>
</div>

<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/datatable/jquery.dataTables.css"/>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/datatable/jquery.dataTables.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#<?php echo $tableid;?>').dataTable({
    "scrollX": true,
    "paging":   true,
    "ordering": true,
    "info":     true
  } );
});
</script>