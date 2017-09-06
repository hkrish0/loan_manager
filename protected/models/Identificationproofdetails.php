<?php

/**
 * This is the model class for table "identificationproofdetails".
 *
 * The followings are the available columns in table 'identificationproofdetails':
 * @property string $IdentificationProofDetailsId
 * @property string $IdentificationProofMasterId
 * @property string $CustomerId
 * @property string $IdentificationNum
 *
 * The followings are the available model relations:
 * @property Customer $customer
 * @property Identificationproofmaster $identificationProofMaster
 */
class Identificationproofdetails extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'identificationproofdetails';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('IdentificationProofMasterId, CustomerId, IdentificationNum', 'required'),
			array('IdentificationProofMasterId, CustomerId', 'length', 'max'=>10),
			array('IdentificationNum', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('IdentificationProofDetailsId, IdentificationProofMasterId, CustomerId, IdentificationNum', 'safe', 'on'=>'search'),
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
			'identificationProofMaster' => array(self::BELONGS_TO, 'Identificationproofmaster', 'IdentificationProofMasterId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IdentificationProofDetailsId' => 'Identification Proof Details',
			'IdentificationProofMasterId' => 'Identification Proof Master',
			'CustomerId' => 'Customer',
			'IdentificationNum' => 'Identification Num',
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

		$criteria->compare('IdentificationProofDetailsId',$this->IdentificationProofDetailsId,true);
		$criteria->compare('IdentificationProofMasterId',$this->IdentificationProofMasterId,true);
		$criteria->compare('CustomerId',$this->CustomerId,true);
		$criteria->compare('IdentificationNum',$this->IdentificationNum,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Identificationproofdetails the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
