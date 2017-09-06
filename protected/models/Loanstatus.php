<?php

/**
 * This is the model class for table "loanstatus".
 *
 * The followings are the available columns in table 'loanstatus':
 * @property string $LoanStatusId
 * @property integer $LoanStatus
 * @property string $Description
 *
 * The followings are the available model relations:
 * @property Loanmaster[] $loanmasters
 */
class Loanstatus extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'loanstatus';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('LoanStatus', 'required'),
			array('LoanStatus', 'numerical', 'integerOnly'=>true),
			array('Description', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('LoanStatusId, LoanStatus, Description', 'safe', 'on'=>'search'),
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
			'loanmasters' => array(self::HAS_MANY, 'Loanmaster', 'LoanStatusId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'LoanStatusId' => 'Loan Status',
			'LoanStatus' => 'Loan Status',
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

		$criteria->compare('LoanStatusId',$this->LoanStatusId,true);
		$criteria->compare('LoanStatus',$this->LoanStatus);
		$criteria->compare('Description',$this->Description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Loanstatus the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
