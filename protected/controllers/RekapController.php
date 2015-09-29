<?php

class RekapController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionRekapNasional()
	{
		$line_item = Yii::app()->db->createCommand()
		->select('nama, satuan, sum(kebutuhan) as kebutuhan, sum(total_penggunaan) as total_penggunaan, sum(sisa_stok) as sisa_stok')
        ->from('ukp4_line_item, obat')
        ->where('ukp4_line_item.kode_obat = obat.kode_obat')
        ->group('nama')
    	->queryAll();

		$this->render('rekap',array(
			'line_item'=>$line_item,
			'level'=>0,
		));

	}

	public function actionListProvinsi()
	{
		$line_item = Yii::app()->db->createCommand()
		->select('kode_prop, nama')
        ->from('propinsi')
    	->queryAll();

		$this->render('listprovinsi',array(
			'line_item'=>$line_item,
		));
	}

	//Ini jadi home si Provinsi pas ngeliat rekap
	public function actionRekapProvinsi()
	{
		//Harusnya ini otomatis di get dari loginan, gw males nyarinya
		$kode_prop = 1;

		$line_item = Yii::app()->db->createCommand()
		->select('nama, satuan, sum(kebutuhan) as kebutuhan, sum(total_penggunaan) as total_penggunaan, sum(sisa_stok) as sisa_stok')
        ->from('ukp4_line_item, ukp4, obat')
        ->where('ukp4_line_item.kode_obat = obat.kode_obat and ukp4_line_item.kode_lap = ukp4.kode_lap and kode_prop=:id', array(':id'=>$kode_prop))
        ->group('nama')
    	->queryAll();

		$this->render('rekap',array(
			'kode_prop'=>$kode_prop,
			'line_item'=>$line_item,
			'level'=>1,
		));

	}

	//Ini buat yang dilihat sama pusat
	public function actionRekapProvinsi2($kode_prop)
	{
		$line_item = Yii::app()->db->createCommand()
		->select('nama, satuan, sum(kebutuhan) as kebutuhan, sum(total_penggunaan) as total_penggunaan, sum(sisa_stok) as sisa_stok')
        ->from('ukp4_line_item, ukp4, obat')
        ->where('ukp4_line_item.kode_obat = obat.kode_obat and ukp4_line_item.kode_lap = ukp4.kode_lap and kode_prop=:id', array(':id'=>$kode_prop))
        ->group('nama')
    	->queryAll();

		$this->render('rekap',array(
			'kode_prop'=>$kode_prop,
			'line_item'=>$line_item,
			'level'=>1,
		));

	}

	public function actionListKabupaten($kode_prop)
	{
		$line_item = Yii::app()->db->createCommand()
		->select('kode_kab, nama')
        ->from('kabupaten')
        ->where('kode_prop=:id', array(':id'=>$kode_prop))
        ->group('nama')
    	->queryAll();

		$this->render('listkabupaten',array(
			'line_item'=>$line_item,
		));
	}

	public function actionDetailKabupaten($id_kabupaten)
	{
		$line_item = Yii::app()->db->createCommand()
		->select('id, nama, satuan, kebutuhan, total_penggunaan, sisa_stok')
        ->from('ukp4_line_item, obat, ukp4')
        ->where('ukp4_line_item.kode_lap = ukp4.kode_lap and ukp4_line_item.kode_obat = obat.kode_obat and ukp4.kode_kab=:id', array(':id'=>$id_kabupaten))
    	->queryAll();

		$this->render('rekap',array(
			'line_item'=>$line_item,
			'level'=>2,
		));
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}