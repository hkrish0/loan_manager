<?php

/**
 * This is the model class for table "customer".
 *
 * The followings are the available columns in table 'customer':
 * @property string $CustomerId
 * @property string $AddressId
 * @property string $CustomerStatusId
 * @property string $DateMasterId
 * @property string $FirstName
 * @property string $LastName
 * @property string $CustomerPhoto
 * @property integer $CustomerCode
 * @property string $Telephone
 * @property string $Mobile
 * @property string $EmailId
 * @property integer $Status
 *
 * The followings are the available model relations:
 * @property Accountgroupdetails[] $accountgroupdetails
 * @property Address $address
 * @property Customerstatus $customerStatus
 * @property Datemaster $dateMaster
 * @property Customerlog[] $customerlogs
 * @property Identificationproofdetails[] $identificationproofdetails
 * @property Loanmaster[] $loanmasters
 */
class Customer extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'customer';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('AddressId, CustomerStatusId, DateMasterId, FirstName, LastName, CustomerCode, Telephone, Status', 'required'),
			array('CustomerCode, Status', 'numerical', 'integerOnly'=>true),
			array('AddressId, CustomerStatusId, DateMasterId', 'length', 'max'=>10),
			array('FirstName, EmailId', 'length', 'max'=>45),
			array('LastName', 'length', 'max'=>30),
			array('Telephone, Mobile', 'length', 'max'=>15),
			array('CustomerPhoto', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('CustomerId, AddressId, CustomerStatusId, DateMasterId, FirstName, LastName, CustomerPhoto, CustomerCode, Telephone, Mobile, EmailId, Status', 'safe', 'on'=>'search'),
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
			'accountgroupdetails' => array(self::HAS_MANY, 'Accountgroupdetails', 'CustomerId'),
			'address' => array(self::BELONGS_TO, 'Address', 'AddressId'),
			'customerStatus' => array(self::BELONGS_TO, 'Customerstatus', 'CustomerStatusId'),
			'dateMaster' => array(self::BELONGS_TO, 'Datemaster', 'DateMasterId'),
			'customerlogs' => array(self::HAS_MANY, 'Customerlog', 'CustomerId'),
			'identificationproofdetails' => array(self::HAS_MANY, 'Identificationproofdetails', 'CustomerId'),
			'loanmasters' => array(self::HAS_MANY, 'Loanmaster', 'CustomerId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'CustomerId' => 'Customer',
			'AddressId' => 'Address',
			'CustomerStatusId' => 'Customer Status',
			'DateMasterId' => 'Date Master',
			'FirstName' => 'First Name',
			'LastName' => 'Last Name',
			'CustomerPhoto' => 'Customer Photo',
			'CustomerCode' => 'Customer Code',
			'Telephone' => 'Telephone',
			'Mobile' => 'Mobile',
			'EmailId' => 'Email',
			'Status' => 'Status',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('CustomerId',$this->CustomerId,true);
		$criteria->compare('AddressId',$this->AddressId,true);
		$criteria->compare('CustomerStatusId',$this->CustomerStatusId,true);
		$criteria->compare('DateMasterId',$this->DateMasterId,true);
		$criteria->compare('FirstName',$this->FirstName,true);
		$criteria->compare('LastName',$this->LastName,true);
		$criteria->compare('CustomerPhoto',$this->CustomerPhoto,true);
		$criteria->compare('CustomerCode',$this->CustomerCode);
		$criteria->compare('Telephone',$this->Telephone,true);
		$criteria->compare('Mobile',$this->Mobile,true);
		$criteria->compare('EmailId',$this->EmailId,true);
		$criteria->compare('Status',$this->Status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Customer the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
