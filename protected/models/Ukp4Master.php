<?php

/**
 * This is the model class for table "ukp4_master".
 *
 * The followings are the available columns in table 'ukp4_master':
 * @property integer $id
 * @property integer $kode_obat
 */
class Ukp4Master extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Ukp4Master the static model class
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
		return 'ukp4_master';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kode_obat', 'required'),
			array('kode_obat', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, kode_obat', 'safe', 'on'=>'search'),
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
      'kodeObat' => array(self::BELONGS_TO, 'Obat', 'kode_obat'),
    );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'kode_obat' => 'Kode Obat',
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
		$criteria->compare('kode_obat',$this->kode_obat);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getListNamaObat()
	{
		return $this->doStandardQuery(
			"SELECT
			obat.nama,
			ukp4_master.kode_obat
			FROM
			ukp4_master left outer join obat on ukp4_master.kode_obat=obat.kode_obat"
		);
	}

	private function doStandardQuery($queryString)
	{
		return Yii::app()->db->createCommand($queryString)->queryAll();
	}
}