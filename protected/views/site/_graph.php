<?php
$label=array();
$nilai=array();

if ($dataProvider != '') {
  foreach($dataProvider as $data){
  }
  $this->Widget('ext.highcharts.HighchartsWidget', array(
       'options'=>array(
          'chart' => array('type' => 'column'),
          'title' => array('text' => 'Fruit Consumption'),
          'xAxis' => array(
             'title' => array('text' => 'Name')
          ),
          'yAxis' => array(
             'title' => array('text' => 'Fruit eaten')
          ),
          'series' => $dataProvider
       )
    ));
}
?>