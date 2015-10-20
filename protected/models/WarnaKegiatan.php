<?php

/**
 * This is the model class for table "warna_kegiatan".
 *
 * The followings are the available columns in table 'warna_kegiatan':
 * @property integer $id
 * @property string $kode
 */
class WarnaKegiatan extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return WarnaKegiatan the static model class
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
		return 'warna_kegiatan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, kode', 'required'),
			array('id', 'numerical', 'integerOnly'=>true),
			array('kode', 'length', 'max'=>6),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, kode', 'safe', 'on'=>'search'),
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
			'kode' => 'Kode',
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
		$criteria->compare('kode',$this->kode,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function getListWarna()
	{
		$listwarna = WarnaKegiatan::model()->findAll();
		$items = array();
		$options["options"] = array();
		$ii = 1;
		foreach ($listwarna as $data) {
			$items[$ii] = $data->kode;
			$options["options"][$ii] = array("style" => "color:#".$items[$ii]."");
			$ii++;
		}
		return array("items" => $items, "options"=>$options);
	}
}