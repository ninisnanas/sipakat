<?php

/**
 * This is the model class for table "personil".
 *
 * The followings are the available columns in table 'personil':
 * @property integer $id
 * @property string $nama
 * @property string $jabatan
 * @property string $nip
 * @property string $pangkat
 * @property integer $bidang
 * @property string $background
 * @property string $training
 * @property integer $status
 */
class Personil extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Personil the static model class
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
		return 'personil';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('bidang, status', 'numerical', 'integerOnly'=>true),
			array('nama, jabatan, nip, pangkat, background', 'length', 'max'=>250),
			array('training', 'length', 'max'=>500),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nama, jabatan, nip, pangkat, bidang, background, training, status', 'safe', 'on'=>'search'),
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
			'jabatan' => 'Jabatan',
			'nip' => 'Nip',
			'pangkat' => 'Pangkat',
			'bidang' => 'Bidang',
			'background' => 'Background',
			'training' => 'Training',
			'status' => 'Status',
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
		$criteria->compare('jabatan',$this->jabatan,true);
		$criteria->compare('nip',$this->nip,true);
		$criteria->compare('pangkat',$this->pangkat,true);
		$criteria->compare('bidang',$this->bidang);
		$criteria->compare('background',$this->background,true);
		$criteria->compare('training',$this->training,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}