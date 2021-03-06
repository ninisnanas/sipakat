<?php

/**
 * This is the model class for table "referensi".
 *
 * The followings are the available columns in table 'referensi':
 * @property integer $id
 * @property string $nama
 * @property integer $puskaji
 * @property integer $bidang
 * @property string $file
 * @property string $tahun
 * @property string $timestamp
 */
class Referensi extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Referensi the static model class
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
		return 'referensi';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama, puskaji, bidang, file, tahun, timestamp', 'required'),
			array('puskaji, bidang', 'numerical', 'integerOnly'=>true),
			array('nama', 'length', 'max'=>100),
			array('file', 'length', 'max'=>250),
			array('tahun', 'length', 'max'=>4),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nama, puskaji, bidang, file, tahun, timestamp', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'nama' => 'Nama',
			'puskaji' => 'Puskaji',
			'bidang' => 'Bidang',
			'file' => 'File',
			'tahun' => 'Tahun',
			'timestamp' => 'Timestamp',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('puskaji',$this->puskaji);
		$criteria->compare('bidang',$this->bidang);
		$criteria->compare('file',$this->file,true);
		$criteria->compare('tahun',$this->tahun,true);
		$criteria->compare('timestamp',$this->timestamp,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}