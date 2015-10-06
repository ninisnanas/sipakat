<?php $tableid = "htmlgrid";?>
<?php if(Yii::app()->user->hasFlash('successDelete')):?>
    <div class="msg-info green">
        <?php echo Yii::app()->user->getFlash('successDelete'); ?>
    </div>
<?php endif; ?>
<div class="row">
  <div class="box">
  <div class="col-lg-12 text-center">
      <h2 class="section-heading">Rangkuman</h2>
      <h3 class="section-subheading text-muted">Bidang XYZ</h3>
  </div>
  <div class="col-lg-12 text-center">
    <?php
    $bidang = 0; 
      echo CHtml::dropDownList('bidang', $bidang, Bidang::model()->getBidangList(), array('empty' => 'Pilih Bidang')); 
      echo CHtml::ajaxButton(
          'Get Graph',
          array('Site/getChart'),
          array(
              'data'=>array('bidang'=>'js:$("#bidang").val()', 'tahun'=>'2015'),
              'type'=>'POST'
            )
        );
    ?>
  </div>
  <div id = "graph" class="col-lg-12 text-center">
    <?php 
      if($isNew != '1') {
        echo "string";
        $this->renderPartial('_graph', array('dataProvider'=>$dataProvider)); 
      } else {
        $this->renderPartial('_graph', array('dataProvider'=>'')); 
      }
    ?>
  </div>

</div>
</div>

<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.js"></script>
</script>