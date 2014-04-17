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
        $record=CmsUser::model()->findByAttributes(array('u_name'=>$this->username));
        if($record===null)
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        else if($record->u_password!==md5($this->password))
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        else
        {
            $this->setState('u_id', $record->u_id);
            $this->setState('shop_id', $record->u_shop_id);
            $this->setState('fake_shop_id', $record->u_fake_shop_id);
			$this->errorCode=self::ERROR_NONE;
        }
        return !$this->errorCode;
    }
}