<?php

/**
 * This is the model class for table "scheme".
 *
 * The followings are the available columns in table 'scheme':
 * @property string $SchemeId
 * @property string $ProductTypeId
 * @property string $DateMasterId
 * @property string $SchemeName
 * @property string $InterestRate
 * @property string $MaxAmtInPer
 * @property string $MaximumAmt
 * @property integer $DurationInMonths
 * @property integer $DurationInDays
 *
 * The followings are the available model relations:
 * @property Loanmaster[] $loanmasters
 * @property Producttype $productType
 * @property Datemaster $dateMaster
 */
class Scheme extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'scheme';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ProductTypeId, DateMasterId, SchemeName, InterestRate, MaxAmtInPer, MaximumAmt, DurationInMonths, DurationInDays', 'required'),
			array('DurationInMonths, DurationInDays', 'numerical', 'integerOnly'=>true),
			array('ProductTypeId, DateMasterId, MaxAmtInPer', 'length', 'max'=>10),
			array('SchemeName', 'length', 'max'=>45),
			array('InterestRate, MaximumAmt', 'length', 'max'=>11),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('SchemeId, ProductTypeId, DateMasterId, SchemeName, InterestRate, MaxAmtInPer, MaximumAmt, DurationInMonths, DurationInDays', 'safe', 'on'=>'search'),
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
			'loanmasters' => array(self::HAS_MANY, 'Loanmaster', 'SchemeId'),
			'productType' => array(self::BELONGS_TO, 'Producttype', 'ProductTypeId'),
			'dateMaster' => array(self::BELONGS_TO, 'Datemaster', 'DateMasterId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'SchemeId' => 'Scheme',
			'ProductTypeId' => 'Product Type',
			'DateMasterId' => 'Date Master',
			'SchemeName' => 'Scheme Name',
			'InterestRate' => 'Interest Rate',
			'MaxAmtInPer' => 'Max Amt In Per',
			'MaximumAmt' => 'Maximum Amt',
			'DurationInMonths' => 'Duration In Months',
			'DurationInDays' => 'Duration In Days',
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

		$criteria->compare('SchemeId',$this->SchemeId,true);
		$criteria->compare('ProductTypeId',$this->ProductTypeId,true);
		$criteria->compare('DateMasterId',$this->DateMasterId,true);
		$criteria->compare('SchemeName',$this->SchemeName,true);
		$criteria->compare('InterestRate',$this->InterestRate,true);
		$criteria->compare('MaxAmtInPer',$this->MaxAmtInPer,true);
		$criteria->compare('MaximumAmt',$this->MaximumAmt,true);
		$criteria->compare('DurationInMonths',$this->DurationInMonths);
		$criteria->compare('DurationInDays',$this->DurationInDays);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Scheme the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
