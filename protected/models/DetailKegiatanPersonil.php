<?php

/**
 * This is the model class for table "detail_kegiatan_personil".
 *
 * The followings are the available columns in table 'detail_kegiatan_personil':
 * @property integer $id
 * @property integer $id_personil
 * @property string $tahun
 * @property integer $w11
 * @property integer $w12
 * @property integer $w13
 * @property integer $w14
 * @property integer $w21
 * @property integer $w22
 * @property integer $w23
 * @property integer $w24
 * @property integer $w31
 * @property integer $w32
 * @property integer $w33
 * @property integer $w34
 * @property integer $w41
 * @property integer $w42
 * @property integer $w43
 * @property integer $w44
 * @property integer $w51
 * @property integer $w52
 * @property integer $w53
 * @property integer $w54
 * @property integer $w61
 * @property integer $w62
 * @property integer $w63
 * @property integer $w64
 * @property integer $w71
 * @property integer $w72
 * @property integer $w73
 * @property integer $w74
 * @property integer $w81
 * @property integer $w82
 * @property integer $w83
 * @property integer $w84
 * @property integer $w91
 * @property integer $w92
 * @property integer $w93
 * @property integer $w94
 * @property integer $w101
 * @property integer $w102
 * @property integer $w103
 * @property integer $w104
 * @property integer $w111
 * @property integer $w112
 * @property integer $w113
 * @property integer $w114
 * @property integer $w121
 * @property integer $w122
 * @property integer $w123
 * @property integer $w124
 */
class DetailKegiatanPersonil extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DetailKegiatanPersonil the static model class
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
		return 'detail_kegiatan_personil';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_personil, tahun', 'required'),
			array('id_personil, w11, w12, w13, w14, w21, w22, w23, w24, w31, w32, w33, w34, w41, w42, w43, w44, w51, w52, w53, w54, w61, w62, w63, w64, w71, w72, w73, w74, w81, w82, w83, w84, w91, w92, w93, w94, w101, w102, w103, w104, w111, w112, w113, w114, w121, w122, w123, w124', 'numerical', 'integerOnly'=>true),
			array('tahun', 'length', 'max'=>4),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_personil, tahun, w11, w12, w13, w14, w21, w22, w23, w24, w31, w32, w33, w34, w41, w42, w43, w44, w51, w52, w53, w54, w61, w62, w63, w64, w71, w72, w73, w74, w81, w82, w83, w84, w91, w92, w93, w94, w101, w102, w103, w104, w111, w112, w113, w114, w121, w122, w123, w124', 'safe', 'on'=>'search'),
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
			'id_personil' => 'Id Personil',
			'tahun' => 'Tahun',
			'w11' => 'W11',
			'w12' => 'W12',
			'w13' => 'W13',
			'w14' => 'W14',
			'w21' => 'W21',
			'w22' => 'W22',
			'w23' => 'W23',
			'w24' => 'W24',
			'w31' => 'W31',
			'w32' => 'W32',
			'w33' => 'W33',
			'w34' => 'W34',
			'w41' => 'W41',
			'w42' => 'W42',
			'w43' => 'W43',
			'w44' => 'W44',
			'w51' => 'W51',
			'w52' => 'W52',
			'w53' => 'W53',
			'w54' => 'W54',
			'w61' => 'W61',
			'w62' => 'W62',
			'w63' => 'W63',
			'w64' => 'W64',
			'w71' => 'W71',
			'w72' => 'W72',
			'w73' => 'W73',
			'w74' => 'W74',
			'w81' => 'W81',
			'w82' => 'W82',
			'w83' => 'W83',
			'w84' => 'W84',
			'w91' => 'W91',
			'w92' => 'W92',
			'w93' => 'W93',
			'w94' => 'W94',
			'w101' => 'W101',
			'w102' => 'W102',
			'w103' => 'W103',
			'w104' => 'W104',
			'w111' => 'W111',
			'w112' => 'W112',
			'w113' => 'W113',
			'w114' => 'W114',
			'w121' => 'W121',
			'w122' => 'W122',
			'w123' => 'W123',
			'w124' => 'W124',
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
		$criteria->compare('id_personil',$this->id_personil);
		$criteria->compare('tahun',$this->tahun,true);
		$criteria->compare('w11',$this->w11);
		$criteria->compare('w12',$this->w12);
		$criteria->compare('w13',$this->w13);
		$criteria->compare('w14',$this->w14);
		$criteria->compare('w21',$this->w21);
		$criteria->compare('w22',$this->w22);
		$criteria->compare('w23',$this->w23);
		$criteria->compare('w24',$this->w24);
		$criteria->compare('w31',$this->w31);
		$criteria->compare('w32',$this->w32);
		$criteria->compare('w33',$this->w33);
		$criteria->compare('w34',$this->w34);
		$criteria->compare('w41',$this->w41);
		$criteria->compare('w42',$this->w42);
		$criteria->compare('w43',$this->w43);
		$criteria->compare('w44',$this->w44);
		$criteria->compare('w51',$this->w51);
		$criteria->compare('w52',$this->w52);
		$criteria->compare('w53',$this->w53);
		$criteria->compare('w54',$this->w54);
		$criteria->compare('w61',$this->w61);
		$criteria->compare('w62',$this->w62);
		$criteria->compare('w63',$this->w63);
		$criteria->compare('w64',$this->w64);
		$criteria->compare('w71',$this->w71);
		$criteria->compare('w72',$this->w72);
		$criteria->compare('w73',$this->w73);
		$criteria->compare('w74',$this->w74);
		$criteria->compare('w81',$this->w81);
		$criteria->compare('w82',$this->w82);
		$criteria->compare('w83',$this->w83);
		$criteria->compare('w84',$this->w84);
		$criteria->compare('w91',$this->w91);
		$criteria->compare('w92',$this->w92);
		$criteria->compare('w93',$this->w93);
		$criteria->compare('w94',$this->w94);
		$criteria->compare('w101',$this->w101);
		$criteria->compare('w102',$this->w102);
		$criteria->compare('w103',$this->w103);
		$criteria->compare('w104',$this->w104);
		$criteria->compare('w111',$this->w111);
		$criteria->compare('w112',$this->w112);
		$criteria->compare('w113',$this->w113);
		$criteria->compare('w114',$this->w114);
		$criteria->compare('w121',$this->w121);
		$criteria->compare('w122',$this->w122);
		$criteria->compare('w123',$this->w123);
		$criteria->compare('w124',$this->w124);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getDetailKegiatanPersonil()
	{
		return $this->doStandardQuery(
			"SELECT
			detail_kegiatan_personil.id,
			personil.id as id_personil,
			personil.nama,
			detail_kegiatan_personil.w11,
			detail_kegiatan_personil.w12,
			detail_kegiatan_personil.w13,
			detail_kegiatan_personil.w14,
			detail_kegiatan_personil.w21,
			detail_kegiatan_personil.w22,
			detail_kegiatan_personil.w23,
			detail_kegiatan_personil.w24,
			detail_kegiatan_personil.w31,
			detail_kegiatan_personil.w32,
			detail_kegiatan_personil.w33,
			detail_kegiatan_personil.w34,
			detail_kegiatan_personil.w41,
			detail_kegiatan_personil.w42,
			detail_kegiatan_personil.w43,
			detail_kegiatan_personil.w44,
			detail_kegiatan_personil.w51,
			detail_kegiatan_personil.w52,
			detail_kegiatan_personil.w53,
			detail_kegiatan_personil.w54,
			detail_kegiatan_personil.w61,
			detail_kegiatan_personil.w62,
			detail_kegiatan_personil.w63,
			detail_kegiatan_personil.w64,
			detail_kegiatan_personil.w71,
			detail_kegiatan_personil.w72,
			detail_kegiatan_personil.w73,
			detail_kegiatan_personil.w74,
			detail_kegiatan_personil.w81,
			detail_kegiatan_personil.w82,
			detail_kegiatan_personil.w83,
			detail_kegiatan_personil.w84,
			detail_kegiatan_personil.w91,
			detail_kegiatan_personil.w92,
			detail_kegiatan_personil.w93,
			detail_kegiatan_personil.w94,
			detail_kegiatan_personil.w101,
			detail_kegiatan_personil.w102,
			detail_kegiatan_personil.w103,
			detail_kegiatan_personil.w104,
			detail_kegiatan_personil.w111,
			detail_kegiatan_personil.w112,
			detail_kegiatan_personil.w113,
			detail_kegiatan_personil.w114,
			detail_kegiatan_personil.w121,
			detail_kegiatan_personil.w122,
			detail_kegiatan_personil.w123,
			detail_kegiatan_personil.w124
			FROM
			personil left outer join detail_kegiatan_personil on personil.id=detail_kegiatan_personil.id_personil
			ORDER BY id_personil ASC"
		);
	}

	public function getDetailKegiatanPersonilByBidang($id_bidang)
	{
		return $this->doStandardQuery(
			"SELECT
			detail_kegiatan_personil.id,
			personil.id as id_personil,
			personil.nama,
			detail_kegiatan_personil.w11,
			detail_kegiatan_personil.w12,
			detail_kegiatan_personil.w13,
			detail_kegiatan_personil.w14,
			detail_kegiatan_personil.w21,
			detail_kegiatan_personil.w22,
			detail_kegiatan_personil.w23,
			detail_kegiatan_personil.w24,
			detail_kegiatan_personil.w31,
			detail_kegiatan_personil.w32,
			detail_kegiatan_personil.w33,
			detail_kegiatan_personil.w34,
			detail_kegiatan_personil.w41,
			detail_kegiatan_personil.w42,
			detail_kegiatan_personil.w43,
			detail_kegiatan_personil.w44,
			detail_kegiatan_personil.w51,
			detail_kegiatan_personil.w52,
			detail_kegiatan_personil.w53,
			detail_kegiatan_personil.w54,
			detail_kegiatan_personil.w61,
			detail_kegiatan_personil.w62,
			detail_kegiatan_personil.w63,
			detail_kegiatan_personil.w64,
			detail_kegiatan_personil.w71,
			detail_kegiatan_personil.w72,
			detail_kegiatan_personil.w73,
			detail_kegiatan_personil.w74,
			detail_kegiatan_personil.w81,
			detail_kegiatan_personil.w82,
			detail_kegiatan_personil.w83,
			detail_kegiatan_personil.w84,
			detail_kegiatan_personil.w91,
			detail_kegiatan_personil.w92,
			detail_kegiatan_personil.w93,
			detail_kegiatan_personil.w94,
			detail_kegiatan_personil.w101,
			detail_kegiatan_personil.w102,
			detail_kegiatan_personil.w103,
			detail_kegiatan_personil.w104,
			detail_kegiatan_personil.w111,
			detail_kegiatan_personil.w112,
			detail_kegiatan_personil.w113,
			detail_kegiatan_personil.w114,
			detail_kegiatan_personil.w121,
			detail_kegiatan_personil.w122,
			detail_kegiatan_personil.w123,
			detail_kegiatan_personil.w124
			FROM
			personil left outer join detail_kegiatan_personil on personil.id=detail_kegiatan_personil.id_personil
			where personil.bidang = ".$id_bidang."
			ORDER BY id_personil ASC"
		);
	}

	private function doStandardQuery($queryString)
	{
		return Yii::app()->db->createCommand($queryString)->queryAll();
	}

	public function getNamaKegiatanByBidang($id)
	{
		return $this->doStandardQuery(
			"SELECT
			detail_kegiatan.id,
			kegiatan.nama as nk,
			detail_kegiatan.nama as nama
			FROM
			kegiatan join detail_kegiatan on kegiatan.id=detail_kegiatan.id_kegiatan
			WHERE id_bidang=".$id
		);
	}

	public function getAllYears()
	{
		$criteria=new CDbCriteria();
		$criteria->select = 'tahun';
		$criteria->distinct = true;
		$criteria->order = 'tahun ASC';
		$tahun = DetailKegiatanPersonil::model()->findAll($criteria);
		return $tahun;
	}
}