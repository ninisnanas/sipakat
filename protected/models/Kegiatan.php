<?php

/**
 * This is the model class for table "kegiatan".
 *
 * The followings are the available columns in table 'kegiatan':
 * @property integer $id
 * @property string $nama
 * @property integer $id_bidang
 * @property string $tahun
 * @property integer $anggaran
 * @property integer $persen_anggaran
 * @property string $waktu
 * @property integer $persen_waktu
 */
class Kegiatan extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Kegiatan the static model class
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
		return 'kegiatan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama, puskaji, id_bidang, tahun, anggaran, persen_anggaran, waktu, persen_waktu, nomor_sp', 'required'),
			array('puskaji, id_bidang, anggaran', 'numerical', 'integerOnly'=>true),
			array('persen_waktu, persen_anggaran', 'numerical'),
			array('nama, nomor_sp', 'length', 'max'=>100),
			array('tahun', 'length', 'max'=>4),
			array('waktu', 'length', 'max'=>25),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nama, puskaji, id_bidang, tahun, anggaran, persen_anggaran, waktu, persen_waktu, nomor_sp', 'safe', 'on'=>'search'),
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
			'id_bidang' => 'Id Bidang',
			'tahun' => 'Tahun',
			'anggaran' => 'Anggaran',
			'persen_anggaran' => 'Persen Anggaran',
			'waktu' => 'Waktu',
			'persen_waktu' => 'Persen Kinerja',
			'nomor_sp' => 'Nomor Surat Perintah',
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
		$criteria->compare('id_bidang',$this->id_bidang);
		$criteria->compare('tahun',$this->tahun,true);
		$criteria->compare('anggaran',$this->anggaran);
		$criteria->compare('persen_anggaran',$this->persen_anggaran);
		$criteria->compare('waktu',$this->waktu,true);
		$criteria->compare('persen_waktu',$this->persen_waktu);
		$criteria->compare('nomor_sp',$this->nomor_sp,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getAllYears()
	{
		$criteria=new CDbCriteria();
		$criteria->select = 'tahun';
		$criteria->distinct = true;
		$criteria->order = 'tahun ASC';
		$tahun = Kegiatan::model()->findAll($criteria);
		return $tahun;
	}

	private function doStandardQuery($queryString)
	{
		return Yii::app()->db->createCommand($queryString)->queryAll();
	}

	public function getDetailKegiatanByBidang($id)
	{
		return $this->doStandardQuery(
			"SELECT
			detail_kegiatan.id as id,
			detail_kegiatan.nama as nama,
			detail_kegiatan.persen_anggaran as persen_anggaran,
			detail_kegiatan.persen_waktu as persen_waktu,
			kegiatan.nama as nama_kegiatan
			FROM
			kegiatan join detail_kegiatan on detail_kegiatan.id_kegiatan=kegiatan.id
			WHERE
			kegiatan.id_bidang=".$id
		);
	}

	public function getDetailKegiatanByPuskaji($id)
	{
		return $this->doStandardQuery(
			"SELECT
			detail_kegiatan.id as id,
			detail_kegiatan.nama as nama,
			detail_kegiatan.persen_anggaran as persen_anggaran,
			detail_kegiatan.persen_waktu as persen_waktu,
			kegiatan.nama as nama_kegiatan
			FROM
			kegiatan join detail_kegiatan on detail_kegiatan.id_kegiatan=kegiatan.id
			WHERE
			kegiatan.puskaji=".$id
		);
	}

	public function getKegiatanByBidang($id)
	{
		$criteria=new CDbCriteria();
		$criteria->select = 'id';
		$criteria->condition = 'id_bidang=:id_bidang';
		$criteria->params = array(':id_bidang'=>$id);
		$criteria->order = 'id ASC';
		$id_kegiatan = Kegiatan::model()->findAll($criteria);
		return $id_kegiatan;
	}

	public function getKegiatanByPuskaji($id)
	{
		$criteria=new CDbCriteria();
		$criteria->select = 'id';
		$criteria->condition = 'puskaji=:puskaji';
		$criteria->params = array(':puskaji'=>$id);
		$criteria->order = 'id ASC';
		$id_kegiatan = Kegiatan::model()->findAll($criteria);
		return $id_kegiatan;
	}

	public function getNamaKegiatanByBidang($id)
	{
		$criteria=new CDbCriteria();
		$criteria->select = 'id, nama';
		$criteria->condition = 'id_bidang=:id_bidang';
		$criteria->params = array(':id_bidang'=>$id);
		$id_kegiatan = Kegiatan::model()->findAll($criteria);
		return $id_kegiatan;
	}

	public function getNamaKegiatan($id)
	{
		$criteria=new CDbCriteria();
		$criteria->select = 'nama';
		$criteria->condition = 'id=:id';
		$criteria->params = array(':id'=>$id);
		$id_kegiatan = Kegiatan::model()->findAll($criteria);
		return $id_kegiatan;
	}

	public function getTahunKegiatan($id)
	{
		$criteria=new CDbCriteria();
		$criteria->select = 'tahun';
		$criteria->condition = 'id=:id';
		$criteria->params = array(':id'=>$id);
		$tahun = Kegiatan::model()->findAll($criteria);
		return $tahun;
	}
}