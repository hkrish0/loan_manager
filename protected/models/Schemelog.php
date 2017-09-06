<?php

/**
 * This is the model class for table "schemelog".
 *
 * The followings are the available columns in table 'schemelog':
 * @property integer $SchemeLogId
 * @property string $SchemeId
 * @property string $DateMasterId
 * @property integer $AmountInPer
 * @property string $Amount
 * @property integer $InterestRate
 */
class Schemelog extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'schemelog';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('SchemeLogId, SchemeId, DateMasterId, AmountInPer, Amount, InterestRate', 'required'),
			array('SchemeLogId, AmountInPer, InterestRate', 'numerical', 'integerOnly'=>true),
			array('SchemeId, DateMasterId, Amount', 'length', 'max'=>11),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('SchemeLogId, SchemeId, DateMasterId, AmountInPer, Amount, InterestRate', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'SchemeLogId' => 'Scheme Log',
			'SchemeId' => 'Scheme',
			'DateMasterId' => 'Date Master',
			'AmountInPer' => 'Amount In Per',
			'Amount' => 'Amount',
			'InterestRate' => 'Interest Rate',
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

		$criteria->compare('SchemeLogId',$this->SchemeLogId);
		$criteria->compare('SchemeId',$this->SchemeId,true);
		$criteria->compare('DateMasterId',$this->DateMasterId,true);
		$criteria->compare('AmountInPer',$this->AmountInPer);
		$criteria->compare('Amount',$this->Amount,true);
		$criteria->compare('InterestRate',$this->InterestRate);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Schemelog the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
