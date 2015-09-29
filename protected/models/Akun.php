<?php

/**
 * This is the model class for table "akun".
 *
 * The followings are the available columns in table 'akun':
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $telp
 * @property string $kode_role
 * @property integer $kode_provinsi
 * @property integer $kode_kabkot
 * @property string $nama
 * @property string $nip
 *
 * The followings are the available model relations:
 * @property Propinsi $kodeProvinsi
 * @property Kabupaten $kodeKabkot
 */
class Akun extends CActiveRecord
{
	const ADMIN = 1;
	const CATALOGUER = 2;
	const PUSAT = 3;
	const PROVINSI = 4;
	const KABUPATEN = 5;

	public $new_password;
	public $password_repeat;

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Akun the static model class
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
		return 'akun';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, email, kode_role, nama, nip, password', 'required'),
			array('new_password, password_repeat', 'required', 'on'=>'updatePass'),
			array('kode_provinsi, kode_kabkot', 'numerical', 'integerOnly'=>true),
			array('username', 'length', 'max'=>30),
			array('password, new_password', 'length', 'max'=>64),
      		array('password_repeat', 'compare', 'compareAttribute'=>'new_password','on'=>'updatePass'),
			array('email', 'length', 'max'=>30),
			array('nama', 'length', 'max'=>60),
			array('telp', 'numerical', 'integerOnly'=>true),
			array('email', 'email', 'message'=>'E-Mail tidak valid.'),
			array('kode_role', 'length', 'max'=>1),
			array('nip', 'length', 'min'=>18, 'max'=>18),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('username, password, email, telp, kode_role, kode_provinsi, kode_kabkot, nama, nip', 'safe', 'on'=>'search'),
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
			'kodeProvinsi' => array(self::BELONGS_TO, 'propinsi', 'kode_provinsi'),
			'kodeKabkot' => array(self::BELONGS_TO, 'kabupaten', 'kode_kabkot'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'username' => 'Username',
			'password' => 'Password',
			'new_password' => 'Password Baru',
			'password_repeat' => 'Ulang Password Baru',
			'email' => 'Email',
			'telp' => 'Nomor Telepon',
			'kode_role' => 'Role',
			'kode_provinsi' => 'Nama Provinsi',
			'kode_kabkot' => 'Nama Kabupaten/Kota',
			'nama' => 'Nama',
			'nip' => 'NIP',
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

		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('telp', $this->telp);
		$criteria->compare('kode_role',$this->kode_role,true);
		$criteria->compare('kode_provinsi',$this->kode_provinsi);
		$criteria->compare('kode_kabkot',$this->kode_kabkot);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('nip',$this->nip,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function getRole($role) {  
        if ($role == self::ADMIN)  
            return 'Administrator';  
        elseif ($role == self::CATALOGUER)  
            return 'Cataloguer';  
        elseif ($role == self::PUSAT)  
            return 'Staf Pusat';  
        elseif ($role == self::PROVINSI)  
          return 'Staf Provinsi';  
        elseif ($role == self::KABUPATEN)  
          return 'Staf Kabupaten';  
        return false;  
    }  
      
    public static function getRoleList() {  
        return array(  
            self::ADMIN => self::getRole(self::ADMIN),  
            self::CATALOGUER=> self::getRole(self::CATALOGUER),  
            self::PUSAT => self::getRole(self::PUSAT),
            self::PROVINSI => self::getRole(self::PROVINSI),
            self::KABUPATEN => self::getRole(self::KABUPATEN));  
    }

    public function getListProvKab()
	{
		return $this->doStandardQuery(
			"SELECT
			akun.nama,
			akun.nip,
			akun.username,
			akun.email,
			akun.telp,
			akun.kode_role,
			propinsi.nama as prop,
			kabupaten.nama as kab
			FROM
			(akun left outer join propinsi on akun.kode_provinsi=propinsi.kode_prop) left outer join kabupaten on akun.kode_kabkot=kabupaten.kode_kab;"
		);
	}

	public function getDetailAkun($uname)
	{
		return $this->doStandardQuery(
			"SELECT
			akun.nama,
			akun.nip,
			akun.username,
			akun.email,
			akun.telp,
			akun.kode_role,
			propinsi.nama as prop,
			kabupaten.nama as kab
			FROM
			(akun left outer join propinsi on akun.kode_provinsi=propinsi.kode_prop) left outer join kabupaten on akun.kode_kabkot=kabupaten.kode_kab
			WHERE akun.username='".$uname."';"
		);
	}

	private function doStandardQuery($queryString)
	{
		//return Yii::app()->db->createCommand($queryString)->queryAll();
		$wawa = Yii::app()->db->createCommand($queryString)->queryAll();
		//echo var_dump($wawa);
		//die();
		return $wawa;
	}
}