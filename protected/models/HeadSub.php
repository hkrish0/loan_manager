<?php

/**
 * This is the model class for table "head_sub".
 *
 * The followings are the available columns in table 'head_sub':
 * @property integer $hs_id
 * @property integer $org_id
 * @property integer $hm_id
 * @property string $hs_name
 * @property double $opening_bal
 * @property string $address
 * @property string $pincode
 * @property string $phone
 * @property string $pan
 * @property string $tin
 * @property string $cst
 * @property string $stax
 * @property string $email
 * @property string $hss
 */
class HeadSub extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'head_sub';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('org_id, hm_id, hs_name', 'required'),
			array('org_id, hm_id', 'numerical', 'integerOnly'=>true),
			array('opening_bal', 'numerical'),
			array('hs_name, email', 'length', 'max'=>100),
			array('pincode', 'length', 'max'=>10),
			array('phone, pan, tin, cst, stax', 'length', 'max'=>25),
			array('hss', 'length', 'max'=>1),
			array('address', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('hs_id, org_id, hm_id, hs_name, opening_bal, address, pincode, phone, pan, tin, cst, stax, email, hss', 'safe', 'on'=>'search'),
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
			'hs_id' => 'Hs',
			'org_id' => 'Org',
			'hm_id' => 'Hm',
			'hs_name' => 'Hs Name',
			'opening_bal' => 'Opening Bal',
			'address' => 'Address',
			'pincode' => 'Pincode',
			'phone' => 'Phone',
			'pan' => 'Pan',
			'tin' => 'Tin',
			'cst' => 'Cst',
			'stax' => 'Stax',
			'email' => 'Email',
			'hss' => 'Hss',
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

		$criteria->compare('hs_id',$this->hs_id);
		$criteria->compare('org_id',$this->org_id);
		$criteria->compare('hm_id',$this->hm_id);
		$criteria->compare('hs_name',$this->hs_name,true);
		$criteria->compare('opening_bal',$this->opening_bal);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('pincode',$this->pincode,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('pan',$this->pan,true);
		$criteria->compare('tin',$this->tin,true);
		$criteria->compare('cst',$this->cst,true);
		$criteria->compare('stax',$this->stax,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('hss',$this->hss,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return HeadSub the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
