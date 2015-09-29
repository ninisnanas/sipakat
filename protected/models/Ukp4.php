<?php

/**
 * This is the model class for table "ukp4".
 *
 * The followings are the available columns in table 'ukp4':
 * @property integer $kode_lap
 * @property integer $kode_prop
 * @property integer $kode_kab
 * @property integer $triwulan
 * @property integer $tahun
 *
 * The followings are the available model relations:
 * @property Propinsi $kodeProp
 * @property Kabupaten $kodeKab
 */
class Ukp4 extends CActiveRecord
{
	const COLUMN_SIZE = 9;
	const NASIONAL = 1;
	const PROVINSI = 2;
	const KABUPATEN = 3;

	public $ketersediaan;

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Ukp4 the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ukp4';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kode_prop, kode_kab, triwulan, tahun', 'required'),
			array('kode_prop, kode_kab, triwulan, tahun', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('kode_lap, kode_prop, kode_kab, triwulan, tahun, ketersediaan', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'kodeProp' => array(self::BELONGS_TO, 'propinsi', 'kode_prop'),
			'kodeKab' => array(self::BELONGS_TO, 'kabupaten', 'kode_kab'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'kode_lap' => 'Kode Lap',
			'kode_prop' => 'Kode Prop',
			'kode_kab' => 'Kode Kab',
			'triwulan' => 'Triwulan',
			'tahun' => 'Tahun',
			'ketersediaan' => 'Ketersediaan',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('kode_lap',$this->kode_lap);
		$criteria->compare('kode_prop',$this->kode_prop);
		$criteria->compare('kode_kab',$this->kode_kab);
		$criteria->compare('triwulan',$this->triwulan);
		$criteria->compare('tahun',$this->tahun);
		$criteria->compare('ketersediaan',$this->ketersediaan);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function addLineItem($array)
	{
		$line = new Ukp4LineItem;
		$line->attributes = $array;
		return $line->save();
	}

	public function getRekapitulasi($type, $array, $ketersediaan)
	{
		$res = Yii::app()->db->createCommand()
						->select('obat.kode_obat as kode_obat, nama, satuan, sum(kebutuhan) as kebutuhan, sum(total_penggunaan) as total_penggunaan, sum(sisa_stok) as sisa_stok, sum(total_penggunaan + sisa_stok) as jumlah, round((sum(total_penggunaan + sisa_stok)*100)/sum(kebutuhan),2) as ketersediaan')
        		->from('ukp4_line_item, ukp4, obat');
    if($type == self::NASIONAL)
    {
    	$res = $res->where('ukp4_line_item.kode_obat = obat.kode_obat and ukp4_line_item.kode_lap = ukp4.kode_lap
    					and ukp4.triwulan =:triwulan and ukp4.tahun =:tahun',
    					array(':triwulan' => $array['triwulan'],':tahun' => $array['tahun']))
    					->group('kode_obat');
    }else if($type == self::PROVINSI){
    	$res = $res->where('ukp4_line_item.kode_obat = obat.kode_obat and ukp4_line_item.kode_lap = ukp4.kode_lap 
    					and ukp4.triwulan =:triwulan and ukp4.tahun =:tahun and ukp4.kode_prop=:prop',
    					array(':triwulan' => $array['triwulan'],':tahun' => $array['tahun'],':prop' => $array['kode_prop']))
    					->group('kode_obat');
    }else{
    	$res = Yii::app()->db->createCommand()
							->select('id, nama, satuan, sum(kebutuhan) as kebutuhan, sum(total_penggunaan) as total_penggunaan, sum(sisa_stok) as sisa_stok, sum(total_penggunaan + sisa_stok) as jumlah, round((sum(total_penggunaan + sisa_stok)*100)/sum(kebutuhan),2) as ketersediaan')
        			->from('ukp4_line_item, ukp4, obat')
        			->where('ukp4_line_item.kode_obat = obat.kode_obat and ukp4_line_item.kode_lap = ukp4.kode_lap 
    					and ukp4.triwulan =:triwulan and ukp4.tahun =:tahun and ukp4.kode_prop=:prop and ukp4.kode_kab=:kab',
    					array(':triwulan' => $array['triwulan'],':tahun' => $array['tahun'],':prop' => $array['kode_prop'],':kab' => $array['kode_kab']))
    					->group('id');
    }
    //return $res->group('nama')->queryAll();;
    $temp = '';
		if ($ketersediaan == 1) {
			return $res->having('round((sum(total_penggunaan + sisa_stok)*100)/sum(kebutuhan),2) < 50')->queryAll();;
		} elseif ($ketersediaan == 2) {
			return $res->having('round((sum(total_penggunaan + sisa_stok)*100)/sum(kebutuhan),2) >= 50 and round((sum(total_penggunaan + sisa_stok)*100)/sum(kebutuhan),2) <= 100' )->queryAll();;
		} elseif ($ketersediaan == 3) {
			return $res->having('round((sum(total_penggunaan + sisa_stok)*100)/sum(kebutuhan),2) > 100')->queryAll();;
		} else {
			return $res->queryAll();
		}
	}

	public function getListUpload($kode_prop)
	{
		return $this->doStandardQuery(
			"SELECT
			kabupaten.kode_kab,
			kabupaten.nama,
			ukp4.kode_lap,
			ukp4.triwulan,
			ukp4.tahun,
			ukp4.ketersediaan
			FROM
			kabupaten left outer join ukp4 on (kabupaten.kode_prop=ukp4.kode_prop and kabupaten.kode_kab=ukp4.kode_kab)
			WHERE
			kabupaten.kode_prop=".$kode_prop
		);
	}

	public function getAllListUpload($tahun)
	{
		return $this->doStandardQuery(
			"SELECT propinsi.kode_prop, propinsi.nama, triwulan, tahun, jumlah
			FROM propinsi
			LEFT OUTER JOIN (
				SELECT propinsi.nama , triwulan, tahun, ukp4.kode_prop, COUNT( * ) AS jumlah
				FROM propinsi, ukp4
				WHERE propinsi.kode_prop = ukp4.kode_prop AND tahun=".$tahun."
				GROUP BY nama, triwulan, tahun
				) AS jumlahan ON propinsi.kode_prop = jumlahan.kode_prop"
		);
	}

	public function getDetailObatByKodeObat($kode_obat, $triwulan, $tahun)
	{
		return $this->doStandardQuery(
			"SELECT nama , ukp4.kode_prop, SUM(kebutuhan) AS kebutuhan , SUM(total_penggunaan) AS total_penggunaan, 
			SUM(sisa_stok) AS sisa, SUM(total_penggunaan + sisa_stok) as jumlah, round((sum(total_penggunaan + sisa_stok)*100)/sum(kebutuhan),2) as ketersediaan
			FROM ukp4, ukp4_line_item, propinsi 
			WHERE ukp4.kode_prop = propinsi.kode_prop AND ukp4_line_item.kode_lap = ukp4.kode_lap AND ukp4_line_item.kode_obat =".$kode_obat." AND triwulan = ".$triwulan." AND tahun = ".$tahun."
			GROUP BY ukp4.kode_prop"
		);	
	}

	public function getDetailObatByProvinsi($kode_obat, $triwulan, $tahun, $kode_prop)
	{
		return $this->doStandardQuery(
			"SELECT nama , ukp4.kode_kab , ukp4.kode_prop, kebutuhan , total_penggunaan, 
			sisa_stok AS sisa, (total_penggunaan + sisa_stok) as jumlah, round(((total_penggunaan + sisa_stok)*100)/(kebutuhan),2) as ketersediaan
			FROM ukp4, ukp4_line_item, kabupaten
			WHERE ukp4.kode_prop = ".$kode_prop." AND ukp4_line_item.kode_lap = ukp4.kode_lap AND ukp4.kode_kab = kabupaten.kode_kab AND ukp4_line_item.kode_obat =".$kode_obat." AND triwulan = ".$triwulan." AND tahun = ".$tahun."
			GROUP BY ukp4.kode_kab, ukp4.kode_prop"
		);	
	}

	public function getDetailObat($kode_obat, $triwulan, $tahun, $kode_prop = null , $kode_kab = null)
	{
		if($kode_prop == null && $kode_kab == null)
		{
			return $this->getDetailObatByKodeObat($kode_obat, $triwulan, $tahun);
		} else if($kode_kab == null)
		{
			return $this->getDetailObatByProvinsi($kode_obat, $triwulan, $tahun, $kode_prop);
		} 
	}

	private function doStandardQuery($queryString)
	{
		$wawa = Yii::app()->db->createCommand($queryString)->queryAll();
		return $wawa;
	}

	public function getDataByUkp4($kode_lap)
	{
		$line_item = Yii::app()->db->createCommand()
								->select('id, nama, satuan, kebutuhan, total_penggunaan, sisa_stok')
        				->from('ukp4_line_item, obat')
        				->where('ukp4_line_item.kode_lap =:kode_lap and ukp4_line_item.kode_obat = obat.kode_obat',
        				  array(':kode_lap'=>$kode_lap))->queryAll();

    return $line_item;
	}

	public function setKetersediaan(){
		$a = Yii::app()->db->createCommand()
		->select('avg(ketersediaan)')
		->from('ukp4_line_item')
		->where('kode_lap =:id', array(':id'=>$this->kode_lap))->queryRow();

		$this->ketersediaan = $a['avg(ketersediaan)'];

		$this->save();
	}

	public function getAllYears()
	{
		$criteria=new CDbCriteria();
		$criteria->select = 'tahun';
		$criteria->distinct = true;
		$criteria->order = 'tahun ASC';
		$tahun = Ukp4::model()->findAll($criteria);
		return $tahun;
	}
}