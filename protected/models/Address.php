<?php

/**
 * This is the model class for table "address".
 *
 * The followings are the available columns in table 'address':
 * @property string $AddressId
 * @property string $AddressLine1
 * @property string $AddressLine2
 * @property string $DistrictMasterId
 * @property string $CityMasterId
 * @property string $StateMasterId
 * @property string $CountryMasterId
 * @property integer $Pincode
 *
 * The followings are the available model relations:
 * @property Districtmaster $districtMaster
 * @property Citymaster $cityMaster
 * @property Countrymaster $countryMaster
 * @property Statemaster $stateMaster
 * @property Branch[] $branches
 * @property Customer[] $customers
 */
class Address extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'address';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('AddressLine1, AddressLine2, DistrictMasterId, CityMasterId, StateMasterId, CountryMasterId', 'required'),
			array('Pincode', 'numerical', 'integerOnly'=>true),
			array('AddressLine1, AddressLine2', 'length', 'max'=>45),
			array('DistrictMasterId, CityMasterId, StateMasterId, CountryMasterId', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('AddressId, AddressLine1, AddressLine2, DistrictMasterId, CityMasterId, StateMasterId, CountryMasterId, Pincode', 'safe', 'on'=>'search'),
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
			'districtMaster' => array(self::BELONGS_TO, 'Districtmaster', 'DistrictMasterId'),
			'cityMaster' => array(self::BELONGS_TO, 'Citymaster', 'CityMasterId'),
			'countryMaster' => array(self::BELONGS_TO, 'Countrymaster', 'CountryMasterId'),
			'stateMaster' => array(self::BELONGS_TO, 'Statemaster', 'StateMasterId'),
			'branches' => array(self::HAS_MANY, 'Branch', 'AddressId'),
			'customers' => array(self::HAS_MANY, 'Customer', 'AddressId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'AddressId' => 'Address',
			'AddressLine1' => 'Address Line1',
			'AddressLine2' => 'Address Line2',
			'DistrictMasterId' => 'District',
			'CityMasterId' => 'City',
			'StateMasterId' => 'State',
			'CountryMasterId' => 'Country',
			'Pincode' => 'Pincode',
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

		$criteria->compare('AddressId',$this->AddressId,true);
		$criteria->compare('AddressLine1',$this->AddressLine1,true);
		$criteria->compare('AddressLine2',$this->AddressLine2,true);
		$criteria->compare('DistrictMasterId',$this->DistrictMasterId,true);
		$criteria->compare('CityMasterId',$this->CityMasterId,true);
		$criteria->compare('StateMasterId',$this->StateMasterId,true);
		$criteria->compare('CountryMasterId',$this->CountryMasterId,true);
		$criteria->compare('Pincode',$this->Pincode);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Address the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
