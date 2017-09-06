<?php

/**
 * This is the model class for table "loandetails".
 *
 * The followings are the available columns in table 'loandetails':
 * @property string $LoanDetailsId
 * @property string $LoanMasterId
 * @property string $ProductTypeId
 * @property string $ProductId
 * @property string $UnitMasterId
 * @property string $Weight
 * @property string $StoneWeight
 * @property integer $Number
 * @property string $MaxAmount
 * @property string $Description
 *
 * The followings are the available model relations:
 * @property Loanmaster $loanMaster
 * @property Product $product
 * @property Unitmaster $unitMaster
 * @property Producttype $productType
 */
class Loandetails extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'loandetails';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('LoanMasterId, ProductTypeId, ProductId, UnitMasterId, Weight, StoneWeight, Number, MaxAmount', 'required'),
			array('Number', 'numerical', 'integerOnly'=>true),
			array('LoanMasterId, ProductTypeId, ProductId, UnitMasterId, StoneWeight, MaxAmount', 'length', 'max'=>10),
			array('Weight', 'length', 'max'=>9),
			array('Description', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('LoanDetailsId, LoanMasterId, ProductTypeId, ProductId, UnitMasterId, Weight, StoneWeight, Number, MaxAmount, Description', 'safe', 'on'=>'search'),
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
			'loanMaster' => array(self::BELONGS_TO, 'Loanmaster', 'LoanMasterId'),
			'product' => array(self::BELONGS_TO, 'Product', 'ProductId'),
			'unitMaster' => array(self::BELONGS_TO, 'Unitmaster', 'UnitMasterId'),
			'productType' => array(self::BELONGS_TO, 'Producttype', 'ProductTypeId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'LoanDetailsId' => 'Loan Details',
			'LoanMasterId' => 'Loan Master',
			'ProductTypeId' => 'Product Type',
			'ProductId' => 'Product',
			'UnitMasterId' => 'Unit Master',
			'Weight' => 'Weight',
			'StoneWeight' => 'Stone Weight',
			'Number' => 'Number',
			'MaxAmount' => 'Max Amount',
			'Description' => 'Description',
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

		$criteria->compare('LoanDetailsId',$this->LoanDetailsId,true);
		$criteria->compare('LoanMasterId',$this->LoanMasterId,true);
		$criteria->compare('ProductTypeId',$this->ProductTypeId,true);
		$criteria->compare('ProductId',$this->ProductId,true);
		$criteria->compare('UnitMasterId',$this->UnitMasterId,true);
		$criteria->compare('Weight',$this->Weight,true);
		$criteria->compare('StoneWeight',$this->StoneWeight,true);
		$criteria->compare('Number',$this->Number);
		$criteria->compare('MaxAmount',$this->MaxAmount,true);
		$criteria->compare('Description',$this->Description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Loandetails the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
