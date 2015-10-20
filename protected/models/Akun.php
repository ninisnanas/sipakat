<?php

/**
 * This is the model class for table "akun".
 *
 * The followings are the available columns in table 'akun':
 * @property integer $id
 * @property integer $id_personil
 * @property string $username
 * @property string $password
 * @property integer $kode_role
 * @property string $email
 */
class Akun extends CActiveRecord
{
	const ADMIN = 1;
	const DEPUTI = 2;
	const PUSKAJI = 3;
	const BIDANG = 4;
	const STAF = 5;
	const TAMU = 6;

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
			array('id_personil, username, password, kode_role, email', 'required'),
			array('id_personil, kode_role', 'numerical', 'integerOnly'=>true),
			array('username', 'length', 'max'=>25),
			array('password, new_password, password_repeat, email', 'length', 'max'=>64),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_personil, username, password, kode_role, email', 'safe', 'on'=>'search'),
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
			'username' => 'Username',
			'password' => 'Password',
			'new_password' => 'Password Baru',
			'password_repeat' => 'Konfirmasi Password Baru',
			'kode_role' => 'Kode Role',
			'email' => 'Email',
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('kode_role',$this->kode_role);
		$criteria->compare('email',$this->email,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function getRole($role) {  
        if ($role == self::ADMIN)  
            return 'Administrator';  
        elseif ($role == self::DEPUTI)  
            return 'Deputi';  
        elseif ($role == self::PUSKAJI)  
            return 'Puskaji'; 
        elseif ($role == self::BIDANG)  
            return 'Bidang';  
        elseif ($role == self::STAF)  
          return 'Staf';  
        elseif ($role == self::TAMU)  
          return 'Tamu';  
        return false;  
    }  
      
    public static function getRoleList() {  
        return array(  
            self::ADMIN => self::getRole(self::ADMIN),  
            self::DEPUTI=> self::getRole(self::DEPUTI),  
            self::PUSKAJI => self::getRole(self::PUSKAJI),
            self::BIDANG => self::getRole(self::BIDANG),
            self::STAF => self::getRole(self::STAF),
            self::TAMU => self::getRole(self::TAMU));  
    }
}