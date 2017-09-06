<?php

/**
 * This is the model class for table "producttype".
 *
 * The followings are the available columns in table 'producttype':
 * @property string $ProductTypeId
 * @property string $ProductTypeName
 * @property string $CurrentRate
 * @property string $UnitMasterId
 *
 * The followings are the available model relations:
 * @property Loandetails[] $loandetails
 * @property Product[] $products
 * @property Unitmaster $unitMaster
 * @property Scheme[] $schemes
 */
class Producttype extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'producttype';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ProductTypeName, CurrentRate, UnitMasterId', 'required'),
			array('ProductTypeName', 'length', 'max'=>45),
			array('CurrentRate', 'length', 'max'=>9),
			array('UnitMasterId', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ProductTypeId, ProductTypeName, CurrentRate, UnitMasterId', 'safe', 'on'=>'search'),
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
			'loandetails' => array(self::HAS_MANY, 'Loandetails', 'ProductTypeId'),
			'products' => array(self::HAS_MANY, 'Product', 'ProductTypeId'),
			'unitMaster' => array(self::BELONGS_TO, 'Unitmaster', 'UnitMasterId'),
			'schemes' => array(self::HAS_MANY, 'Scheme', 'ProductTypeId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ProductTypeId' => 'Product Type',
			'ProductTypeName' => 'Product Type Name',
			'CurrentRate' => 'Current Rate',
			'UnitMasterId' => 'Unit Master',
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

		$criteria->compare('ProductTypeId',$this->ProductTypeId,true);
		$criteria->compare('ProductTypeName',$this->ProductTypeName,true);
		$criteria->compare('CurrentRate',$this->CurrentRate,true);
		$criteria->compare('UnitMasterId',$this->UnitMasterId,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Producttype the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
