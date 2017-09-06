<?php 
/**
 * @author AbhilashRajR@Golunusoft.com
 * @version 0.1
 * Extended Version of CWebUser.
 * Provided Functions for Menu Privileage checking, Role access for Modules and COntroller Access
 * Use Session State to Store the Values
 */

class WebUser extends CWebUser
{
    /**
     * Overrides a Yii method that is used for roles in controllers (accessRules).
     *
     * @param string $operation Name of the operation required (here, a role).
     * @param mixed $params (opt) Parameters for this operation, usually the object to access.
     * @return bool Permission granted?
     */
	private $_model;
	
    public function checkAccess1($operation, $params=array())
    {
        if (empty($this->id)){
             //Not identified => no rights
            return false;
        }
        $role = $this->getState("modulein");
        
        if (in_array($operation, $role)) {
            return true;        
        }	
        else 
        {
            return false;
        }

    }
        
    public function checkRole()
    {
        $role = $this->getState("modulein");
        return ($role);
    }

   

    
    // Return first name.
    // access it by Yii::app()->user->first_name

        

//    public function getctn($controllername,$modulename)
//    {
////        $username=Yii::app()->user->name;
////        $userid=Yii::app()->user->id;
////        $record=Usermaster::model()->findByAttributes(array('UserMasterId'=>$userid));
////        $arr=Privilegemaster::model()->findByAttributes(array('UserRoleId'=>$record->UserRoleId,'PrivilegeName'=>$modulename));
////        $newArray=Privilegedetails::model()->findByAttributes(array('PrivilegeMasterId'=>'1','PrivilegeDetailsName'=>$controllername));
////        $returnvalue=$newArray->PrivilegeDetailsName;
////        return $returnvalue;
//              
//    }
    
}