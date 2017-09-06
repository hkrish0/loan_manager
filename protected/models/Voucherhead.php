<?php

/**
 * This is the model class for table "voucherhead".
 *
 * The followings are the available columns in table 'voucherhead':
 * @property string $VoucherHeadId
 * @property string $VoucherMasterId
 * @property integer $AccountGroupId
 * @property string $VoucherHead
 * @property integer $Number
 *
 * The followings are the available model relations:
 * @property Vouchermaster $voucherMaster
 * @property Accountgroup $accountGroup
 */
class Voucherhead extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'voucherhead';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('VoucherMasterId, AccountGroupId, VoucherHead, Number', 'required'),
			array('AccountGroupId, Number', 'numerical', 'integerOnly'=>true),
			array('VoucherMasterId', 'length', 'max'=>11),
			array('VoucherHead', 'length', 'max'=>25),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('VoucherHeadId, VoucherMasterId, AccountGroupId, VoucherHead, Number', 'safe', 'on'=>'search'),
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
			'voucherMaster' => array(self::BELONGS_TO, 'Vouchermaster', 'VoucherMasterId'),
			'accountGroup' => array(self::BELONGS_TO, 'Accountgroup', 'AccountGroupId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'VoucherHeadId' => 'Voucher Head',
			'VoucherMasterId' => 'Voucher Master',
			'AccountGroupId' => 'Account Group',
			'VoucherHead' => 'Voucher Head',
			'Number' => 'Number',
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

		$criteria->compare('VoucherHeadId',$this->VoucherHeadId,true);
		$criteria->compare('VoucherMasterId',$this->VoucherMasterId,true);
		$criteria->compare('AccountGroupId',$this->AccountGroupId);
		$criteria->compare('VoucherHead',$this->VoucherHead,true);
		$criteria->compare('Number',$this->Number);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Voucherhead the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
