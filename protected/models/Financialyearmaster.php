<?php

/**
 * This is the model class for table "financialyearmaster".
 *
 * The followings are the available columns in table 'financialyearmaster':
 * @property integer $FinancialYearMasterId
 * @property string $BranchId
 * @property string $FinancialYearName
 * @property string $FromDate
 * @property string $ToDate
 *
 * The followings are the available model relations:
 * @property Branch $branch
 */
class Financialyearmaster extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'financialyearmaster';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('BranchId, FinancialYearName, FromDate, ToDate', 'required'),
			array('BranchId', 'length', 'max'=>10),
			array('FinancialYearName', 'length', 'max'=>30),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('FinancialYearMasterId, BranchId, FinancialYearName, FromDate, ToDate', 'safe', 'on'=>'search'),
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
			'branch' => array(self::BELONGS_TO, 'Branch', 'BranchId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'FinancialYearMasterId' => 'Financial Year Master',
			'BranchId' => 'Branch',
			'FinancialYearName' => 'Financial Year Name',
			'FromDate' => 'From Date',
			'ToDate' => 'To Date',
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

		$criteria->compare('FinancialYearMasterId',$this->FinancialYearMasterId);
		$criteria->compare('BranchId',$this->BranchId,true);
		$criteria->compare('FinancialYearName',$this->FinancialYearName,true);
		$criteria->compare('FromDate',$this->FromDate,true);
		$criteria->compare('ToDate',$this->ToDate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Financialyearmaster the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
