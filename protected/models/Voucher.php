<?php

/**
 * This is the model class for table "voucher".
 *
 * The followings are the available columns in table 'voucher':
 * @property string $VoucherId
 * @property string $VoucherMasterId
 * @property string $DateMasterId
 * @property integer $AccountGroupId
 * @property string $VoucherHeadId
 * @property string $UserMasterId
 * @property string $VoucherNumber
 * @property string $Credit
 * @property string $Debit
 * @property string $Description
 * @property integer $Del_flag
 *
 * The followings are the available model relations:
 * @property Usermaster $userMaster
 * @property Vouchermaster $voucherMaster
 * @property Datemaster $dateMaster
 * @property Accountgroup $accountGroup
 */
class Voucher extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'voucher';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('VoucherMasterId, DateMasterId, AccountGroupId, VoucherHeadId, UserMasterId, VoucherNumber, Credit, Debit, Del_flag', 'required'),
			array('AccountGroupId, Del_flag', 'numerical', 'integerOnly'=>true),
			array('VoucherMasterId, DateMasterId, VoucherHeadId, UserMasterId', 'length', 'max'=>10),
			array('VoucherNumber', 'length', 'max'=>20),
			array('Credit, Debit', 'length', 'max'=>12),
			array('Description', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('VoucherId, VoucherMasterId, DateMasterId, AccountGroupId, VoucherHeadId, UserMasterId, VoucherNumber, Credit, Debit, Description, Del_flag', 'safe', 'on'=>'search'),
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
			'userMaster' => array(self::BELONGS_TO, 'Usermaster', 'UserMasterId'),
			'voucherMaster' => array(self::BELONGS_TO, 'Vouchermaster', 'VoucherMasterId'),
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
			'VoucherId' => 'Voucher',
			'VoucherMasterId' => 'Voucher Master',
			'DateMasterId' => 'Date Master',
			'AccountGroupId' => 'Account Group',
			'VoucherHeadId' => 'Voucher Head',
			'UserMasterId' => 'User Master',
			'VoucherNumber' => 'Voucher Number',
			'Credit' => 'Credit',
			'Debit' => 'Debit',
			'Description' => 'Description',
			'Del_flag' => 'Del Flag',
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

		$criteria->compare('VoucherId',$this->VoucherId,true);
		$criteria->compare('VoucherMasterId',$this->VoucherMasterId,true);
		$criteria->compare('DateMasterId',$this->DateMasterId,true);
		$criteria->compare('AccountGroupId',$this->AccountGroupId);
		$criteria->compare('VoucherHeadId',$this->VoucherHeadId,true);
		$criteria->compare('UserMasterId',$this->UserMasterId,true);
		$criteria->compare('VoucherNumber',$this->VoucherNumber,true);
		$criteria->compare('Credit',$this->Credit,true);
		$criteria->compare('Debit',$this->Debit,true);
		$criteria->compare('Description',$this->Description,true);
		$criteria->compare('Del_flag',$this->Del_flag);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Voucher the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public function getAmt($account)
	{
		$ingresos = Yii::app()->db->createCommand()
		->select('sum(Credit) AS credit,sum(Debit) AS debit')
		->from('voucher')
		->where('AccountGroupId = :fecha', array(':fecha'=>$account))
		->group('AccountGroupId')
		->order('AccountGroupId ASC')
		->queryAll();
	
		return $ingresos;
	}
}
