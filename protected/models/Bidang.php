<?php

/**
 * This is the model class for table "bidang".
 *
 * The followings are the available columns in table 'bidang':
 * @property integer $id
 * @property integer $id_puskaji
 * @property string $nama
 */
class Bidang extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Bidang the static model class
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
		return 'bidang';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_puskaji, nama', 'required'),
			array('id_puskaji', 'numerical', 'integerOnly'=>true),
			array('nama', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_puskaji, nama', 'safe', 'on'=>'search'),
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
			'id_puskaji' => 'Id Puskaji',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('id_puskaji',$this->id_puskaji);
		$criteria->compare('nama',$this->nama,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getBidangList() {  
	    $bidang = self::model()->findAll();  
	  
	    $bidangArray = CHtml::listData($bidang, 'id', 'nama');  
	    return $bidangArray;  
	}

	public static function  getListBidangByPuskaji($puskaji) {
		$data = self::model()->findAll('id_puskaji=:id_puskaji',array(':id_puskaji' => (int) $puskaji));
		return CHtml::listData($data, 'id', 'nama');
	}

	public static function findPuskajiByBidang($id_personil) {
		$id_bidang = Personil::model()->findAllByPk($id_personil);
		$data = self::model()->findAllByPk($id_bidang[0]['bidang']);
		$nama_puskaji = Puskaji::model()->findByPk($data[0]['id_puskaji']);
		return $nama_puskaji;
	}

	public static function findBidangByPersonil($id_personil) {
		$bidang = Personil::model()->findAllByPk($id_personil);
		$data = self::model()->findAllByPk($bidang[0]['bidang']);
		return $data;
	}

	public function getNamaBidang($id) {  
	    $namaBidang = self::model()->findByPk($id);  
	    return $namaBidang;  
	}
}