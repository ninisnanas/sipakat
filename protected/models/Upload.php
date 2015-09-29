<?php

/**
 * This is the model class for table "upload".
 *
 * The followings are the available columns in table 'upload':
 * @property integer $id
 * @property string $username
 * @property string $waktu
 * @property integer $status
 * @property string $file
 *
 * The followings are the available model relations:
 * @property Akun $username0
 */
class Upload extends CActiveRecord
{
	private $_triwulan;
	private $_tahun;

    public function getTriwulan(){
        return $this->_triwulan;
    }

    public function setTriwulan(){
        $this->_triwulan = (int)((int)date('m', time())/3);
    }

    public function getTahun(){
        return $this->_tahun;
    }

    public function setTahun(){
        $this->_tahun = date('Y', time());
    }
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Upload the static model class
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
		return 'upload';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('file', 'file', 'types'=> 'xls, xlsx'),
			array('username, waktu, file, triwulan, tahun', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('username', 'length', 'max'=>30),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, waktu, status, file', 'safe', 'on'=>'search'),
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
			'username0' => array(self::BELONGS_TO, 'akun', 'username'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'waktu' => 'Waktu',
			'status' => 'Status',
			'file' => 'File',
			'triwulan' => 'Periode',
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('waktu',$this->waktu,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('file',$this->file,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getFileName(){
		$temp = date("Ymd-His", strtotime($this->waktu));
		return $this->username.' - '.$temp.'.xls'; 
	}

	public function getStatus()
	{
		if($this->status == 0)
		{
			return 'Gagal';
		}else if($this->status == 1){
			return 'Berhasil';
		}
	}

	public function isUkp4Valid($params)
	{
		$criteria = new CDbCriteria;
		$criteria->condition = 'kode_kab= :kab AND kode_prop= :prop AND triwulan= :triwulan AND tahun= :tahun';
		$criteria->params = array(':kab'=>$params['kode_kabkot'],':prop'=>$params['kode_provinsi'],':triwulan'=>$params['triwulan'],':tahun'=>$params['tahun']);

		$data = Ukp4::model()->findAll($criteria);
		return (sizeof($data) === 0);
	}
}