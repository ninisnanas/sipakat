<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$user = Akun::model()->find('username=?', array($this->username));
		if($user === null )
		{
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		}
		//else if($user->password!==crypt($this->password, $user->password))
		else if($user->password!==$this->password)
		{	
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		} else {
			$this->errorCode=self::ERROR_NONE;
			$this->setState('role', $user->kode_role);
			//$this->setState('provinsi',$user->kode_provinsi);
			//$this->setState('kabupaten',$user->kode_kabkot);
			//$this->setState('password',$user->password);
		}
		return !$this->errorCode;
		//if(!isset($users[$this->username]))
		//	$this->errorCode=self::ERROR_USERNAME_INVALID;
		//elseif($users[$this->username]!==$this->password)
		//	$this->errorCode=self::ERROR_PASSWORD_INVALID;
		//else
		//	$this->errorCode=self::ERROR_NONE;
		//return !$this->errorCode;
	}
}