<?php

/**
 * This is the model class for table "kegiatan_personil".
 *
 * The followings are the available columns in table 'kegiatan_personil':
 * @property integer $id
 * @property integer $id_personil
 * @property integer $id_detail_kegiatan
 * @property string $tahun
 */
class KegiatanPersonil extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return KegiatanPersonil the static model class
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
		return 'kegiatan_personil';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_personil, id_detail_kegiatan, tahun', 'required'),
			array('id_personil, id_detail_kegiatan', 'numerical', 'integerOnly'=>true),
			array('tahun', 'length', 'max'=>4),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_personil, id_detail_kegiatan, tahun', 'safe', 'on'=>'search'),
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
			'id_detail_kegiatan' => 'Id Detail Kegiatan',
			'tahun' => 'Tahun',
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
		$criteria->compare('id_detail_kegiatan',$this->id_detail_kegiatan);
		$criteria->compare('tahun',$this->tahun,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	private function doStandardQuery($queryString)
	{
		return Yii::app()->db->createCommand($queryString)->queryAll();
	}

	public function getKPbyIDnDK($id_personil, $tahun, $id_detail_kegiatan)
	{
		return $this->doStandardQuery(
			"SELECT
			*
			FROM
			kegiatan_personil
			WHERE
			id_personil=".$id_personil." and tahun=".$tahun." and id_detail_kegiatan=".$id_detail_kegiatan
		);
	}

	public function countAll($tahun)
	{
		return $this->doStandardQuery(
			"SELECT
			id_personil as id,
			count(id_detail_kegiatan) as jumlah
			FROM
			kegiatan_personil
			WHERE
			tahun=".$tahun."
			GROUP BY id_personil"
		);
	}

	public function countByBidang($id_bidang, $tahun)
	{

		return $this->doStandardQuery(
			"SELECT
			id_personil as id,
			count(id_detail_kegiatan) as jumlah
			FROM
			(SELECT 
				kegiatan_personil.id,
				kegiatan_personil.id_personil,
				kegiatan_personil.id_detail_kegiatan
				FROM 
				kegiatan_personil, detail_kegiatan, kegiatan, personil
				WHERE
				kegiatan_personil.id_detail_kegiatan = detail_kegiatan.id AND detail_kegiatan.id_kegiatan = kegiatan.id AND personil.id = kegiatan_personil.id_personil AND personil.bidang=".$id_bidang." AND kegiatan.tahun=".$tahun.") as A
			GROUP BY id_personil"
		);
	}

	public function countByPuskaji($id_puskaji, $tahun)
	{
		
		return $this->doStandardQuery(
			"SELECT
			id_personil as id,
			count(id_detail_kegiatan) as jumlah
			FROM
			(SELECT 
				kegiatan_personil.id,
				kegiatan_personil.id_personil,
				kegiatan_personil.id_detail_kegiatan
				FROM 
				kegiatan_personil, detail_kegiatan, kegiatan, personil
				WHERE
				kegiatan_personil.id_detail_kegiatan = detail_kegiatan.id AND detail_kegiatan.id_kegiatan = kegiatan.id AND personil.id = kegiatan_personil.id_personil AND personil.puskaji=".$id_puskaji." AND kegiatan.tahun=".$tahun.") as A
			GROUP BY id_personil"
		);
	}
}