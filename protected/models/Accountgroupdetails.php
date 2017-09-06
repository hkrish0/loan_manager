<?php

/**
 * This is the model class for table "accountgroupdetails".
 *
 * The followings are the available columns in table 'accountgroupdetails':
 * @property string $AccountGroupDetailsId
 * @property integer $AccountGroupId
 * @property string $CustomerId
 * @property string $AddressId
 * @property string $OpeningBal
 * @property string $Pan
 * @property string $Tin
 * @property string $Cst
 * @property string $Stax
 *
 * The followings are the available model relations:
 * @property Customer $customer
 * @property Accountgroup $accountGroup
 * @property Address $address
 */
class Accountgroupdetails extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'accountgroupdetails';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('AccountGroupId', 'required'),
			array('AccountGroupId', 'numerical', 'integerOnly'=>true),
			array('CustomerId', 'length', 'max'=>11),
			array('AddressId, OpeningBal', 'length', 'max'=>10),
			array('Pan, Tin, Cst, Stax', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('AccountGroupDetailsId, AccountGroupId, CustomerId, AddressId, OpeningBal, Pan, Tin, Cst, Stax', 'safe', 'on'=>'search'),
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
			'customer' => array(self::BELONGS_TO, 'Customer', 'CustomerId'),
			'accountGroup' => array(self::BELONGS_TO, 'Accountgroup', 'AccountGroupId'),
			'address' => array(self::BELONGS_TO, 'Address', 'AddressId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'AccountGroupDetailsId' => 'Account Group Details',
			'AccountGroupId' => 'Account Group',
			'CustomerId' => 'Customer',
			'AddressId' => 'Address',
			'OpeningBal' => 'Opening Bal',
			'Pan' => 'Pan',
			'Tin' => 'Tin',
			'Cst' => 'Cst',
			'Stax' => 'Stax',
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

		$criteria->compare('AccountGroupDetailsId',$this->AccountGroupDetailsId,true);
		$criteria->compare('AccountGroupId',$this->AccountGroupId);
		$criteria->compare('CustomerId',$this->CustomerId,true);
		$criteria->compare('AddressId',$this->AddressId,true);
		$criteria->compare('OpeningBal',$this->OpeningBal,true);
		$criteria->compare('Pan',$this->Pan,true);
		$criteria->compare('Tin',$this->Tin,true);
		$criteria->compare('Cst',$this->Cst,true);
		$criteria->compare('Stax',$this->Stax,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Accountgroupdetails the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
