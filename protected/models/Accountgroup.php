<?php

/**
 * This is the model class for table "accountgroup".
 *
 * The followings are the available columns in table 'accountgroup':
 * @property integer $AccountGroupId
 * @property string $AccountName
 * @property integer $GroupUnder
 * @property integer $IsDefault
 */
class Accountgroup extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'accountgroup';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	
	

	
	
	
	
	
	
	public function getChildren($parent, $level=0) {
		$criteria = new CDbCriteria;
		$criteria->condition='GroupUnder=:AccountGroupId';
		$criteria->params=array(':AccountGroupId'=>$parent);
		$model = $this->findAll($criteria);
		
		
		foreach ($model as $key) {
			$debitmodel= Voucher::model()->getAmt($key->AccountGroupId);
			//var_dump($debitmodel);
			if($debitmodel!=null)
			{
			$value =  $debitmodel[0]['credit'];
			$value1 =  $debitmodel[0]['debit'];
			//var_dump($value);
			//echo "Credit---".$value."<br>Debit --".$value1."<br>";	
			}
			echo str_repeat(' * ', $level) . $key->AccountName ."|credit|<br>Debit|<br />";				
			$this->getChildren($key->AccountGroupId, $level+1);
			//var_dump($debitmodel);
			}
	}
	
	
	
	public function getChildrenString($parent) {
		$storage="";
		$criteria = new CDbCriteria;
		$criteria->condition='GroupUnder=:AccountGroupId';
		$criteria->params=array(':AccountGroupId'=>$parent);
		$model = $this->findAll($criteria);
		foreach ($model as $key) {
			$storage .= $key->AccountName . ",</br>";
			$storage .= $this->getChildrenString($key->AccountGroupId);
		}
		return $storage;
	}
	
	
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('AccountName, GroupUnder, IsDefault', 'required'),
			array('GroupUnder, IsDefault', 'numerical', 'integerOnly'=>true),
			array('AccountName', 'length', 'max'=>30),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('AccountGroupId, AccountName, GroupUnder, IsDefault', 'safe', 'on'=>'search'),
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
			'AccountGroupId' => 'Account Group',
			'AccountName' => 'Account Name',
			'GroupUnder' => 'Group Under',
			'IsDefault' => 'Is Default',
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

		$criteria->compare('AccountGroupId',$this->AccountGroupId);
		$criteria->compare('AccountName',$this->AccountName,true);
		$criteria->compare('GroupUnder',$this->GroupUnder);
		$criteria->compare('IsDefault',$this->IsDefault);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Accountgroup the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
