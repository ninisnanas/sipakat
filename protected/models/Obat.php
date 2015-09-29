<?php

/**
 * This is the model class for table "obat".
 *
 * The followings are the available columns in table 'obat':
 * @property string $kode_obat
 * @property string $nama
 * @property string $klp_obat
 * @property string $satuan
 */
class Obat extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Obat the static model class
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
		return 'obat';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kode_obat, nama, klp_obat, satuan', 'required'),
			array('kode_obat, satuan', 'length', 'max'=>10),
			array('nama', 'length', 'max'=>50),
			array('klp_obat', 'length', 'max'=>15),
			
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('kode_obat, nama, klp_obat, satuan', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'kode_obat' => 'Kode Obat',
			'nama' => 'Nama',
			'klp_obat' => 'Kelompok Obat',
			'satuan' => 'Satuan',
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

		$criteria->compare('kode_obat',$this->kode_obat,true);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('klp_obat',$this->klp_obat,true);
		$criteria->compare('satuan',$this->satuan,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}