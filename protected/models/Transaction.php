<?php

/**
 * This is the model class for table "transaction".
 *
 * The followings are the available columns in table 'transaction':
 * @property string $TransactionId
 * @property integer $AccountGroupId
 * @property string $TransactionType
 * @property integer $VoucherNo
 * @property string $Credit
 * @property string $Debit
 * @property string $FromAccount
 * @property string $ToAccount
 * @property string $DateMasterId
 * @property string $InterestRate
 * @property string $Preference
 * @property string $Remarks
 *
 * The followings are the available model relations:
 * @property Datemaster $dateMaster
 * @property Accountgroup $accountGroup
 */
class Transaction extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'transaction';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('AccountGroupId, VoucherNo, FromAccount, ToAccount, DateMasterId, InterestRate', 'required'),
			array('AccountGroupId, VoucherNo', 'numerical', 'integerOnly'=>true),
			array('TransactionType', 'length', 'max'=>15),
			array('Credit, Debit', 'length', 'max'=>12),
			array('FromAccount, ToAccount, Remarks', 'length', 'max'=>45),
			array('DateMasterId, InterestRate', 'length', 'max'=>10),
			array('Preference', 'length', 'max'=>25),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('TransactionId, AccountGroupId, TransactionType, VoucherNo, Credit, Debit, FromAccount, ToAccount, DateMasterId, InterestRate, Preference, Remarks', 'safe', 'on'=>'search'),
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
			'dateMaster' => array(self::BELONGS_TO, 'Datemaster', 'DateMasterId'),
			'accountGroup' => array(self::BELONGS_TO, 'Accountgroup', 'AccountGroupId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'TransactionId' => 'Transaction',
			'AccountGroupId' => 'Account Group',
			'TransactionType' => 'Transaction Type',
			'VoucherNo' => 'Voucher No',
			'Credit' => 'Credit',
			'Debit' => 'Debit',
			'FromAccount' => 'From Account',
			'ToAccount' => 'To Account',
			'DateMasterId' => 'Date Master',
			'InterestRate' => 'Interest Rate',
			'Preference' => 'Preference',
			'Remarks' => 'Remarks',
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

		$criteria->compare('TransactionId',$this->TransactionId,true);
		$criteria->compare('AccountGroupId',$this->AccountGroupId);
		$criteria->compare('TransactionType',$this->TransactionType,true);
		$criteria->compare('VoucherNo',$this->VoucherNo);
		$criteria->compare('Credit',$this->Credit,true);
		$criteria->compare('Debit',$this->Debit,true);
		$criteria->compare('FromAccount',$this->FromAccount,true);
		$criteria->compare('ToAccount',$this->ToAccount,true);
		$criteria->compare('DateMasterId',$this->DateMasterId,true);
		$criteria->compare('InterestRate',$this->InterestRate,true);
		$criteria->compare('Preference',$this->Preference,true);
		$criteria->compare('Remarks',$this->Remarks,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Transaction the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
