<?php

/**
 * This is the model class for table "kabupaten".
 *
 * The followings are the available columns in table 'kabupaten':
 * @property integer $kode_kab
 * @property string $nama
 * @property string $alamat
 * @property string $telp1
 * @property integer $kode_prop
 *
 * The followings are the available model relations:
 * @property Akun[] $akuns
 * @property Propinsi $kodeProp
 * @property Puskesmas[] $puskesmases
 */
class Kabupaten extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Kabupaten the static model class
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
		return 'kabupaten';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama, alamat, telp1, kode_prop', 'required'),
			array('kode_prop', 'numerical', 'integerOnly'=>true),
			array('nama', 'length', 'max'=>30),
			array('telp1', 'length', 'max'=>12),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('kode_kab, nama, alamat, telp1, kode_prop', 'safe', 'on'=>'search'),
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
			'akuns' => array(self::HAS_MANY, 'akun', 'kode_kabkot'),
			'kodeProp' => array(self::BELONGS_TO, 'propinsi', 'kode_prop'),
			'puskesmases' => array(self::HAS_MANY, 'puskesmas', 'kode_kabkot'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'kode_kab' => 'Kode Kabupaten',
			'nama' => 'Nama Kabupaten',
			'alamat' => 'Alamat Dinas Kesehatan',
			'telp1' => 'Nomor Telepon',
			'kode_prop' => 'Nama Provinsi',
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

		$criteria->compare('kode_kab',$this->kode_kab);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('telp1',$this->telp1,true);
		$criteria->compare('kode_prop',$this->kode_prop);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getCityOptionsByState($stateid) {  
	    if(empty($stateid))  
	       $stateid = null;  
	      
	    	$city = self::model()->findAll('kode_prop=:kode_prop order by kode_kab',array('kode_prop'=>$stateid));  
	  
		    $cityArray = CHtml::listData($city, 'kode_kab', 'nama');  
		    return $cityArray;  
	}

	public function getListKabFromProp($kode_prop) {  
    	return $this->doStandardQuery(
			"SELECT
			propinsi.nama as prop,
			kabupaten.kode_kab,
			kabupaten.nama,
			kabupaten.alamat,
			kabupaten.telp1
			FROM
			kabupaten join propinsi on kabupaten.kode_prop=propinsi.kode_prop
			WHERE
			kabupaten.kode_prop=".$kode_prop
		);
	}

	public function getListProvKab()
	{
		return $this->doStandardQuery(
			"SELECT
			propinsi.nama as prop,
			kabupaten.kode_kab,
			kabupaten.nama,
			kabupaten.alamat,
			kabupaten.telp1
			FROM
			kabupaten join propinsi on kabupaten.kode_prop=propinsi.kode_prop "
		);
	}

	private function doStandardQuery($queryString)
	{
		return Yii::app()->db->createCommand($queryString)->queryAll();
	}

	public function getListKab($id)
	{
		return $this->doStandardQuery(
			"SELECT
			*
			FROM
			kabupaten
			WHERE kode_kab=".$id
		);
	}
}