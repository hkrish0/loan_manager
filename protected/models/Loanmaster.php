<?php

/**
 * This is the model class for table "loanmaster".
 *
 * The followings are the available columns in table 'loanmaster':
 * @property string $LoanMasterId
 * @property string $CustomerId
 * @property string $BranchId
 * @property string $LoanStatusId
 * @property string $DateMasterId
 * @property string $UserMasterId
 * @property string $SchemeId
 * @property string $LoanNumber
 * @property string $AmountIssued
 *
 * The followings are the available model relations:
 * @property Loandetails[] $loandetails
 * @property Branch $branch
 * @property Customer $customer
 * @property Datemaster $dateMaster
 * @property Loanstatus $loanStatus
 * @property Usermaster $userMaster
 * @property Scheme $scheme
 */
class Loanmaster extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'loanmaster';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CustomerId, BranchId, LoanStatusId, DateMasterId, UserMasterId, SchemeId, LoanNumber, AmountIssued', 'required'),
			array('CustomerId, BranchId, LoanStatusId, DateMasterId, UserMasterId, SchemeId, AmountIssued', 'length', 'max'=>10),
			array('LoanNumber', 'length', 'max'=>25),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('LoanMasterId, CustomerId, BranchId, LoanStatusId, DateMasterId, UserMasterId, SchemeId, LoanNumber, AmountIssued', 'safe', 'on'=>'search'),
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
			'loandetails' => array(self::HAS_MANY, 'Loandetails', 'LoanMasterId'),
			'branch' => array(self::BELONGS_TO, 'Branch', 'BranchId'),
			'customer' => array(self::BELONGS_TO, 'Customer', 'CustomerId'),
			'dateMaster' => array(self::BELONGS_TO, 'Datemaster', 'DateMasterId'),
			'loanStatus' => array(self::BELONGS_TO, 'Loanstatus', 'LoanStatusId'),
			'userMaster' => array(self::BELONGS_TO, 'Usermaster', 'UserMasterId'),
			'scheme' => array(self::BELONGS_TO, 'Scheme', 'SchemeId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'LoanMasterId' => 'Loan Master',
			'CustomerId' => 'Customer',
			'BranchId' => 'Branch',
			'LoanStatusId' => 'Loan Status',
			'DateMasterId' => 'Date Master',
			'UserMasterId' => 'User Master',
			'SchemeId' => 'Scheme',
			'LoanNumber' => 'Loan Number',
			'AmountIssued' => 'Amount Issued',
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

		$criteria->compare('LoanMasterId',$this->LoanMasterId,true);
		$criteria->compare('CustomerId',$this->CustomerId,true);
		$criteria->compare('BranchId',$this->BranchId,true);
		$criteria->compare('LoanStatusId',$this->LoanStatusId,true);
		$criteria->compare('DateMasterId',$this->DateMasterId,true);
		$criteria->compare('UserMasterId',$this->UserMasterId,true);
		$criteria->compare('SchemeId',$this->SchemeId,true);
		$criteria->compare('LoanNumber',$this->LoanNumber,true);
		$criteria->compare('AmountIssued',$this->AmountIssued,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Loanmaster the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
