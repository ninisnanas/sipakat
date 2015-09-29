<?php

/**
 * This is the model class for table "propinsi".
 *
 * The followings are the available columns in table 'propinsi':
 * @property integer $kode_prop
 * @property string $nama
 * @property string $alamat
 * @property string $telp1
 *
 * The followings are the available model relations:
 * @property Akun[] $akuns
 * @property Kabupaten[] $kabupatens
 * @property Puskesmas[] $puskesmases
 */
class Propinsi extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Propinsi the static model class
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
		return 'propinsi';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama, alamat, telp1', 'required'),
			array('nama', 'length', 'max'=>30),
			array('telp1', 'length', 'max'=>12),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('kode_prop, nama, alamat, telp1', 'safe', 'on'=>'search'),
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
			'akuns' => array(self::HAS_MANY, 'akun', 'kode_provinsi'),
			'kabupatens' => array(self::HAS_MANY, 'kabupaten', 'kode_prop'),
			'puskesmases' => array(self::HAS_MANY, 'puskesmas', 'kode_prov'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'kode_prop' => 'Kode Provinsi',
			'nama' => 'Nama Provinsi',
			'alamat' => 'Alamat Dinas Kesehatan',
			'telp1' => 'Nomor Telepon',
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

		$criteria->compare('kode_prop',$this->kode_prop);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('telp1',$this->telp1,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getProvinsiList() {  
	    $provinsi = self::model()->findAll();  
	  
	    $provinsiArray = CHtml::listData($provinsi, 'kode_prop', 'nama');  
	    return $provinsiArray;  
	}

	private function doStandardQuery($queryString)
	{
		return Yii::app()->db->createCommand($queryString)->queryAll();
	}

	public function getNamaProvinsi($kode_prop)
	{
		return $this->doStandardQuery(
			"SELECT
			*
			FROM
			propinsi
			WHERE kode_prop=".$kode_prop
		);
	}
}