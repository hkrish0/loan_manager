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
	private $_id;
	public function authenticate()
	{
		
		$record=Usermaster::model()->findByAttributes(array('UserName'=>$this->username));
		
		$users=array(
			// username => password
			'demo'=>'demo',
			'admin'=>'admin',
		);
		if($record==null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($record->Password!==$this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
		{
			$this->_id=$record->UserMasterId;
			$this->username=$record->UserName;
			$Criteria = new CDbCriteria();
			$Criteria->condition = "UserTypeId = '$record->UserTypeId'";
			$model1 = Privilegemaster::model()->findAll($Criteria);
			$arr = CHtml::listData($model1, 'PrivilegeMasterId', 'PrivilegeName');
			$this->setState('modulein',$arr);
			$this->errorCode=self::ERROR_NONE;
		}
		return !$this->errorCode;
		
	}
	
	public function getId()
	{
		return $this->_id;
	}
}