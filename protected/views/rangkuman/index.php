<div class="row">
  <div class="box">
    <div class="col-lg-12 text-center">
        <h2 class="section-heading">Rangkuman</h2>
    
  <?php echo $this->renderPartial('_form', array('model'=>$model, 'puskaji' =>$puskaji, 'tahun'=>$tahun, 'bidang'=>$bidang, 'kategori'=>$kategori, 'tahun_selected'=>$tahun_selected));

  if($dataProvider !== null)
    {
      $ii = 0;
      $series = array();
      $series1 = array();
      $series2 = array();
      foreach ($dataProvider as $data) {
        if ($kategori == 3) {
          $namapersonil = Personil::model()->getNamaPersonil($data['id']);
          $nama = $namapersonil->nama;
        } else if ($kategori == 2) {
          $nama = $data['nama_kegiatan']."<br />".$data['nama'];
        } else {
          $nama = $data->nama;
        }
        if($kategori != 3) {
          $series[$ii] = array('name'=>$nama, 'data'=>array((int) $data['persen_anggaran']));
          $series1[$ii] = array('name'=>$nama, 'data'=>array((int) $data['persen_waktu']));
        } else {
          $series2[$ii] = array('name'=>$nama, 'data'=>array((int) $data['jumlah']));
        }
        $ii++;
      }

      if($kategori != 3) {
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
            'title' => array('text' => 'Rangkuman % Kinerja'),
            'xAxis' => array(
               'categories' => array('Nama Kegiatan')
            ),
            'yAxis' => array(
               'title' => array('text' => '%')
            ),
            'series' => $series1
         )
      ));
      } else {
        $this->Widget('ext.highcharts.HighchartsWidget', array(
           'options'=>array(
              'chart' => array('type' => 'column'),
              'title' => array('text' => 'Kesibukan Personil'),
              'xAxis' => array(
                 'categories' => array('Nama Personil')
              ),
              'yAxis' => array(
                 'title' => array('text' => 'Jumlah Kegiatan')
              ),
              'series' => $series2
           )
        ));
      }
    }
    else echo "Pilih kriteria rangkuman dan tahun terlebih dahulu";
    ?>
  </div>
  </div>
</div>

<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/datatable/jquery.dataTables.css"/>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.js"></script>

</script>