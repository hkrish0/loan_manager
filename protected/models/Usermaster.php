<?php

/**
 * This is the model class for table "usermaster".
 *
 * The followings are the available columns in table 'usermaster':
 * @property string $UserMasterId
 * @property string $UserTypeId
 * @property string $BranchId
 * @property string $UserName
 * @property string $Password
 * @property string $CreatedDate
 * @property string $Description
 *
 * The followings are the available model relations:
 * @property Loanmaster[] $loanmasters
 * @property Branch $branch
 * @property Usertype $userType
 */
class Usermaster extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usermaster';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('UserTypeId, BranchId, UserName, Password, CreatedDate', 'required'),
			array('UserTypeId, BranchId', 'length', 'max'=>10),
			array('UserName, Password', 'length', 'max'=>45),
			array('Description', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('UserMasterId, UserTypeId, BranchId, UserName, Password, CreatedDate, Description', 'safe', 'on'=>'search'),
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
			'loanmasters' => array(self::HAS_MANY, 'Loanmaster', 'UserMasterId'),
			'branch' => array(self::BELONGS_TO, 'Branch', 'BranchId'),
			'userType' => array(self::BELONGS_TO, 'Usertype', 'UserTypeId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'UserMasterId' => 'User Master',
			'UserTypeId' => 'User Type',
			'BranchId' => 'Branch',
			'UserName' => 'User Name',
			'Password' => 'Password',
			'CreatedDate' => 'Created Date',
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

		$criteria->compare('UserMasterId',$this->UserMasterId,true);
		$criteria->compare('UserTypeId',$this->UserTypeId,true);
		$criteria->compare('BranchId',$this->BranchId,true);
		$criteria->compare('UserName',$this->UserName,true);
		$criteria->compare('Password',$this->Password,true);
		$criteria->compare('CreatedDate',$this->CreatedDate,true);
		$criteria->compare('Description',$this->Description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Usermaster the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
