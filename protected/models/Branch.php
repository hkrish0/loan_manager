<?php

/**
 * This is the model class for table "branch".
 *
 * The followings are the available columns in table 'branch':
 * @property string $BranchId
 * @property string $AddressId
 * @property string $DateMasterId
 * @property string $BranchCode
 * @property string $BranchName
 * @property string $Telephone
 * @property string $Mobile
 * @property string $EmailId
 *
 * The followings are the available model relations:
 * @property Address $address
 * @property Datemaster $dateMaster
 * @property Loanmaster[] $loanmasters
 * @property Usermaster[] $usermasters
 */
class Branch extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'branch';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('AddressId, DateMasterId, BranchCode, BranchName, Telephone', 'required'),
			array('AddressId, DateMasterId', 'length', 'max'=>10),
			array('BranchCode', 'length', 'max'=>20),
			array('BranchName, EmailId', 'length', 'max'=>45),
			array('Telephone, Mobile', 'length', 'max'=>15),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('BranchId, AddressId, DateMasterId, BranchCode, BranchName, Telephone, Mobile, EmailId', 'safe', 'on'=>'search'),
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
			'address' => array(self::BELONGS_TO, 'Address', 'AddressId'),
			'dateMaster' => array(self::BELONGS_TO, 'Datemaster', 'DateMasterId'),
			'loanmasters' => array(self::HAS_MANY, 'Loanmaster', 'BranchId'),
			'usermasters' => array(self::HAS_MANY, 'Usermaster', 'BranchId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'BranchId' => 'Branch',
			'AddressId' => 'Address',
			'DateMasterId' => 'Date Master',
			'BranchCode' => 'Branch Code',
			'BranchName' => 'Branch Name',
			'Telephone' => 'Telephone',
			'Mobile' => 'Mobile',
			'EmailId' => 'Email',
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

		$criteria->compare('BranchId',$this->BranchId,true);
		$criteria->compare('AddressId',$this->AddressId,true);
		$criteria->compare('DateMasterId',$this->DateMasterId,true);
		$criteria->compare('BranchCode',$this->BranchCode,true);
		$criteria->compare('BranchName',$this->BranchName,true);
		$criteria->compare('Telephone',$this->Telephone,true);
		$criteria->compare('Mobile',$this->Mobile,true);
		$criteria->compare('EmailId',$this->EmailId,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Branch the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
