<div class="row">
  <div class="box">
    <div class="col-lg-12 text-center">
        <h2 class="section-heading">Rangkuman</h2>
    </div>
  <?php echo $this->renderPartial('_form', array('model'=>$model,'tahun'=>$tahun, 'bidang'=>$bidang, 'kategori'=>$kategori, 'tahun_selected'=>$tahun_selected));

  if($dataProvider !== null)
    {
      $ii = 0;
      $series = array();
      $series1 = array();
      foreach ($dataProvider as $data) {
        if ($kategori == 2) {
          $namakegiatan = Kegiatan::model()->getNamaKegiatan($data->id);
          foreach ($namakegiatan as $nama) {
            $nama = $nama->nama."<br />".$data->nama;
          }
        } else {
          $nama = $data->nama;
        }
        $series[$ii] = array('name'=>$nama, 'data'=>array((int) $data->persen_anggaran));
        $series1[$ii] = array('name'=>$nama, 'data'=>array((int) $data->persen_waktu));
        $ii++;
      }

      /*$this->Widget('ext.highcharts.HighchartsWidget', array(
         'options'=>array(
            'chart' => array('type' => 'column'),
            'title' => array('text' => 'Rangkuman'),
            'xAxis' => array(
               'categories' => array('$Waktu', '%Anggaran')
            ),
            'yAxis' => array(
               'title' => array('text' => '%')
            ),
            'series' => $series
         )
      ));*/

      $this->Widget('ext.highcharts.HighchartsWidget', array(
         'options'=>array(
            'chart' => array('type' => 'column'),
            'title' => array('text' => 'Rangkuman % Anggaran'),
            'xAxis' => array(
               'categories' => array('Nama Kegiatan')
            ),
            'yAxis' => array(
               'title' => array('text' => '%')
            ),
            'series' => $series
         )
      ));

      $this->Widget('ext.highcharts.HighchartsWidget', array(
         'options'=>array(
            'chart' => array('type' => 'column'),
            'title' => array('text' => 'Rangkuman % Waktu'),
            'xAxis' => array(
               'categories' => array('Nama Kegiatan')
            ),
            'yAxis' => array(
               'title' => array('text' => '%')
            ),
            'series' => $series1
         )
      ));
    }
    else echo "Pilih kriteria rangkuman dan tahun terlebih dahulu";
    ?>
  </div>
</div>

<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/datatable/jquery.dataTables.css"/>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.js"></script>

</script>