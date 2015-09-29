<?php

/**
 * This is the model class for table "ukp4_line_item".
 *
 * The followings are the available columns in table 'ukp4_line_item':
 * @property integer $id
 * @property integer $kode_lap
 * @property integer $kode_obat
 * @property integer $kebutuhan
 * @property integer $total_penggunaan
 * @property integer $sisa_stok
 *
 * The followings are the available model relations:
 * @property Ukp4 $kodeLap
 * @property Obat $kodeObat
 */
class Ukp4LineItem extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Ukp4LineItem the static model class
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
		return 'ukp4_line_item';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kode_lap, kode_obat, kebutuhan, total_penggunaan, sisa_stok, jumlah, ketersediaan', 'required'),
			array('kode_lap, kode_obat, kebutuhan, total_penggunaan, sisa_stok, jumlah', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, kode_lap, kode_obat, kebutuhan, total_penggunaan, sisa_stok, jumlah, ketersediaan', 'safe', 'on'=>'search'),
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
			'kodeLap' => array(self::BELONGS_TO, 'ukp4', 'kode_lap'),
			'kodeObat' => array(self::BELONGS_TO, 'obat', 'kode_obat'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'kode_lap' => 'Kode Lap',
			'kode_obat' => 'Kode Obat',
			'kebutuhan' => 'Kebutuhan',
			'total_penggunaan' => 'Total Penggunaan',
			'sisa_stok' => 'Sisa Stok',
			'jumlah' => 'Jumlah',
			'ketersediaan' => 'Ketersediaan'
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
		$criteria->compare('kode_lap',$this->Kode_lap);
		$criteria->compare('kode_obat',$this->Kode_obat);
		$criteria->compare('kebutuhan',$this->Kebutuhan);
		$criteria->compare('total_penggunaan',$this->Total_penggunaan);
		$criteria->compare('sisa_stok',$this->Sisa_stok);
		$criteria->compare('jumlah',$this->Jumlah);
		$criteria->compare('ketersediaan',$this->Ketersediaan);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function onUpdate(){
		$this->jumlah = $this->total_penggunaan + $this->sisa_stok;
		$this->ketersediaan = $this->jumlah/$this->kebutuhan;
		$this->save();
	}
}