<?php

/**
 * This is the model class for table "customerlog".
 *
 * The followings are the available columns in table 'customerlog':
 * @property string $CustomerLogId
 * @property string $CustomerId
 * @property string $AddressId
 * @property string $Mobile
 *
 * The followings are the available model relations:
 * @property Customer $customer
 * @property Address $address
 */
class Customerlog extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'customerlog';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CustomerId, AddressId, Mobile', 'required'),
			array('CustomerId, AddressId', 'length', 'max'=>10),
			array('Mobile', 'length', 'max'=>15),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('CustomerLogId, CustomerId, AddressId, Mobile', 'safe', 'on'=>'search'),
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
			'address' => array(self::BELONGS_TO, 'Address', 'AddressId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'CustomerLogId' => 'Customer Log',
			'CustomerId' => 'Customer',
			'AddressId' => 'Address',
			'Mobile' => 'Mobile',
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

		$criteria->compare('CustomerLogId',$this->CustomerLogId,true);
		$criteria->compare('CustomerId',$this->CustomerId,true);
		$criteria->compare('AddressId',$this->AddressId,true);
		$criteria->compare('Mobile',$this->Mobile,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Customerlog the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
