<?php

/**
 * This is the model class for table "citymaster".
 *
 * The followings are the available columns in table 'citymaster':
 * @property string $CityMasterId
 * @property string $DistrictMasterId
 * @property string $City
 *
 * The followings are the available model relations:
 * @property Address[] $addresses
 * @property Districtmaster $districtMaster
 */
class Citymaster extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'citymaster';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('DistrictMasterId, City', 'required'),
			array('DistrictMasterId', 'length', 'max'=>10),
			array('City', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('CityMasterId, DistrictMasterId, City', 'safe', 'on'=>'search'),
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
			'addresses' => array(self::HAS_MANY, 'Address', 'CityMasterId'),
			'districtMaster' => array(self::BELONGS_TO, 'Districtmaster', 'DistrictMasterId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'CityMasterId' => 'City Master',
			'DistrictMasterId' => 'District Master',
			'City' => 'City',
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

		$criteria->compare('CityMasterId',$this->CityMasterId,true);
		$criteria->compare('DistrictMasterId',$this->DistrictMasterId,true);
		$criteria->compare('City',$this->City,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Citymaster the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
