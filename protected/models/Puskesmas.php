<?php

/**
 * This is the model class for table "Puskesmas".
 *
 * The followings are the available columns in table 'Puskesmas':
 * @property integer $kode_prov
 * @property integer $kode_kabkot
 * @property integer $kode
 * @property string $nama
 *
 * The followings are the available model relations:
 * @property Propinsi $kodeProv
 * @property Kabupaten $kodeKabkot
 */
class Puskesmas extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Puskesmas the static model class
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
		return 'puskesmas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kode_prov, kode_kabkot, nama', 'required'),
			array('kode_prov, kode_kabkot', 'numerical', 'integerOnly'=>true),
			array('nama', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('kode_prov, kode_kabkot, kode, nama', 'safe', 'on'=>'search'),
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
			'kodeProv' => array(self::BELONGS_TO, 'propinsi', 'kode_prov'),
			'kodeKabkot' => array(self::BELONGS_TO, 'kabupaten', 'kode_kabkot'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'kode_prov' => 'Kode Prov',
			'kode_kabkot' => 'Kode Kabkot',
			'kode' => 'Kode',
			'nama' => 'Nama',
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

		$criteria->compare('kode_prov',$this->kode_prov);
		$criteria->compare('kode_kabkot',$this->kode_kabkot);
		$criteria->compare('kode',$this->kode);
		$criteria->compare('nama',$this->nama,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getListProvKab()
	{
		return $this->doStandardQuery(
			"SELECT
			propinsi.nama as prop,
			kabupaten.nama as kab,
			puskesmas.nama,
			puskesmas.kode
			FROM
			(puskesmas join kabupaten on puskesmas.kode_kabkot = kabupaten.kode_kab)join propinsi on puskesmas.kode_prov = propinsi.kode_prop;"
		);
	}

	public function getListPuskesmas($kode_kab) {  
    	return $this->doStandardQuery(
			"SELECT
			propinsi.nama as prop,
			kabupaten.nama as kab,
			puskesmas.nama,
			puskesmas.kode
			FROM
			(puskesmas join kabupaten on puskesmas.kode_kabkot = kabupaten.kode_kab)join propinsi on puskesmas.kode_prov = propinsi.kode_prop
			WHERE
			puskesmas.kode_kabkot=".$kode_kab
		);
	}

	public function getListPuskesmasProp($kode_prop) {  
    	return $this->doStandardQuery(
			"SELECT
			propinsi.nama as prop,
			kabupaten.nama as kab,
			puskesmas.nama,
			puskesmas.kode
			FROM
			(puskesmas join kabupaten on puskesmas.kode_kabkot = kabupaten.kode_kab)join propinsi on puskesmas.kode_prov = propinsi.kode_prop
			WHERE
			puskesmas.kode_prov=".$kode_prop
		);
	}

	private function doStandardQuery($queryString)
	{
		return Yii::app()->db->createCommand($queryString)->queryAll();
	}
}