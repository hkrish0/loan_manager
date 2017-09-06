<?php

/**
 * This is the model class for table "product".
 *
 * The followings are the available columns in table 'product':
 * @property string $ProductId
 * @property string $ProductCode
 * @property string $ProductName
 * @property string $Description
 *
 * The followings are the available model relations:
 * @property Loandetails[] $loandetails
 */
class Product extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'product';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ProductCode, ProductName', 'required'),
			array('ProductCode, ProductName', 'length', 'max'=>45),
			array('Description', 'length', 'max'=>100),
			array('ProductCode', 'unique'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ProductId, ProductCode, ProductName, Description', 'safe', 'on'=>'search'),
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
			'loandetails' => array(self::HAS_MANY, 'Loandetails', 'ProductId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ProductId' => 'Product',
			'ProductCode' => 'Product Code',
			'ProductName' => 'Product Name',
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

		$criteria->compare('ProductId',$this->ProductId,true);
		$criteria->compare('ProductCode',$this->ProductCode,true);
		$criteria->compare('ProductName',$this->ProductName,true);
		$criteria->compare('Description',$this->Description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Product the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
