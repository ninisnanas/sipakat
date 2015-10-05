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
      /*echo CHtml::ajaxButton(
          'Get Graph',
          array('Site/getChart'),
          array(
              'data'=>array('bidang'=>'js:$("#bidang").val()', 'tahun'=>'2015'),
              'type'=>'POST'
            )
        );*/
    ?>
    <button id="button" class="autocompare">Set new data</button>
    <div id="container" style="width:100%; height:400px;"></div>
  </div>

</div>
</div>

<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/highcharts.js"></script>
<script type="text/javascript">
$(function () { 
    $('#container').highcharts({
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Fruit Consumption'
        },
        xAxis: {
            categories: ['Apples', 'Bananas', 'Oranges']
        },
        yAxis: {
            title: {
                text: 'Fruit eaten'
            }
        },
        series: [{
            name: 'Jane',
            data: [1, 0, 4]
        }, {
            name: 'John',
            data: [5, 7, 3]
        }]
    });

    $('#button').click(function () {
        var chart = $('#container').highcharts();
        chart.series[0].setData([129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4, 29.9, 71.5, 106.4]);
    });
});
</script>