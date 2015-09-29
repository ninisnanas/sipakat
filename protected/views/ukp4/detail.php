<div>
  <div>
    <p class="subtitle">Detail UKP4</p>
    <?php if($detailType == 1)
        echo '<h1 class="tableheading">Detail Obat '.$model['nama'].' Per Propinsi<br/></h1>'; 
      else if($detailType == 2)
        echo '<h1 class="tableheading">Detail Obat '.$model['nama'].' Per Kabupaten/Kota<br/></h1>';
    ?>
  </div>
  <?php 
    echo $this->renderPartial('_detail', array('model'=>$model,'dataProvider'=>$dataProvider,'triwulan'=>$triwulan,'tahun'=>$tahun,'type'=>$detailType));
  ?>
</div>