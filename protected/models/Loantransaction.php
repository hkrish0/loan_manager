<?php

/**
 * This is the model class for table "loantransaction".
 *
 * The followings are the available columns in table 'loantransaction':
 * @property string $LoanTransactionId
 * @property string $LoanMasterId
 * @property string $DateMasterId
 * @property string $Amount
 */
class Loantransaction extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'loantransaction';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('LoanTransactionId, LoanMasterId, DateMasterId, Amount', 'required'),
			array('LoanTransactionId, LoanMasterId, DateMasterId', 'length', 'max'=>10),
			array('Amount', 'length', 'max'=>12),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('LoanTransactionId, LoanMasterId, DateMasterId, Amount', 'safe', 'on'=>'search'),
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
			'LoanTransactionId' => 'Loan Transaction',
			'LoanMasterId' => 'Loan Master',
			'DateMasterId' => 'Date Master',
			'Amount' => 'Amount',
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

		$criteria->compare('LoanTransactionId',$this->LoanTransactionId,true);
		$criteria->compare('LoanMasterId',$this->LoanMasterId,true);
		$criteria->compare('DateMasterId',$this->DateMasterId,true);
		$criteria->compare('Amount',$this->Amount,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Loantransaction the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
