<?php

class LoanController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	
	
	public function beforeAction($action)
	{
		
		if(parent::beforeAction($action)){
			$role = Yii::app()->User->checkRole();
			if (isset ($role)){
				if (in_array($this->id, $role)){
					return true;
				}
				else {
					Yii::app()->request->redirect(Yii::app()->createAbsoluteUrl('site/nopermission'));
				}
	
			}
			else{
				Yii::app()->request->redirect(Yii::app()->createAbsoluteUrl('site/nopermission'));
			}
		}
		else
			return false;
	}
	
	
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}
	public function actions()
	{
		return array(
				'producttype'=>array(
						'class'=>'application.extensions.EAutoCompleteAction',
						'model'=>'Producttype', //My model's class name
						'attribute'=>'ProductTypeName', //The attribute of the model i will search
						'attribute1'=>'ProductTypeId',
						'attribute2'=>'CurrentRate'
				),
				'product'=>array(
						'class'=>'application.extensions.EAutoCompleteAction',
						'model'=>'Product', //My model's class name
						'attribute'=>'ProductName', //The attribute of the model i will search
						'attribute1'=>'ProductId',
						 'attribute2'=>'ProductCode'
				),
				
				'scheme'=>array(
						'class'=>'application.extensions.EAutoCompleteAction',
						'model'=>'Scheme', //My model's class name
						'attribute'=>'SchemeName', //The attribute of the model i will search
						'attribute1'=>'SchemeId',
						'attribute2'=>'MaximumAmt'
				),
				
				'customer'=>array(
						'class'=>'application.extensions.EAutoCompleteAction1',
						'model'=>'Customer', //My model's class name
						'attribute'=>'CustomerCode', //The attribute of the model i will search
						'attribute1'=>'FirstName',
						'attribute2'=>'LastName',
						'attribute3'=>'CustomerId',
						'attribute4'=>'Telephone',
						'attribute5'=>'AddressId',
						'attribute6'=>'Telephone',
						'attribute7'=>'Mobile',
						'attribute8'=>'EmailId',
						
				),
				
				'customer1'=>array(
						'class'=>'application.extensions.EAutoCompleteAction2',
						'model'=>'Customer', //My model's class name
						'attribute'=>'FirstName', //The attribute of the model i will search
						'attribute1'=>'CustomerCode',
						'attribute2'=>'LastName',
						'attribute3'=>'CustomerId',
						'attribute4'=>'Telephone',
						'attribute5'=>'AddressId',
						'attribute6'=>'Telephone',
						'attribute7'=>'Mobile',
						'attribute8'=>'EmailId',
				
				),
				'customer2'=>array(
						'class'=>'application.extensions.EAutoCompleteAction1',
						'model'=>'Customer', //My model's class name
						'attribute'=>'Mobile', //The attribute of the model i will search
						'attribute1'=>'FirstName',
						'attribute2'=>'LastName',
						'attribute3'=>'CustomerId',
						'attribute4'=>'Telephone',
						'attribute5'=>'AddressId',
						'attribute6'=>'Telephone',
						'attribute7'=>'CustomerCode',
						'attribute8'=>'EmailId',
				
				),
				
				'pledgeTable'=>array(
						'class'=>'ext.XTabularInputAction',
						'modelName'=>'Producttype',
						'viewName'=>'/loan/_pledgeview',
				),
				
				'loan_renewal'=>array(
					
						'class'=>'application.extensions.EAutoCompleteAction',
						'model'=>'Loanmaster', //My model's class name
						'attribute'=>'LoanNumber', //The attribute of the model i will search
						'attribute1'=>'LoanMasterId',
						'attribute2'=>'CustomerId'
				),
				
				
				);
	}
	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	
	
	public function accessRules()
	{
		
		
		
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','loandetails','getcustomerform','customer','customerform','customer_create','customer1','customer2','product','producttype','pledgeTable','gettopscheme','scheme','scheme_details','renewal','renewalsave','loan_renewal','loan_create','loan_close'),
				'users'=>array('@'),
			),
			
				array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','view','update','loandetails','getcustomerform','customer','customerform','customer_create','customer1','customer2','pledgeTable','gettopscheme','scheme','scheme_details','renewal','renewalsave','loan_renewal','loan_create','loan_close'),
				'users'=>array('@'),
			),
			
				
				
				array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','view'),
				'users'=>array('admin'),
			),
			
				
				array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
	
	
	public function actionLoan_close(){
		
		$value=$_POST['value'];
		$date=new Datemaster;
		$this->renderPartial('_loanclose',array(
				'value'=>$value,'date'=>$date));
		
		/*if (Yii::app()->request->isAjaxRequest)
		{
			$value=$_POST['value'];
		
			echo CJSON::encode(array(
					'status'=>'failure',
					'div'=>$this->renderPartial('_loanclose',array(
							'value'=>$value))));
			exit;
		}*/
		
	}
	

	public function actionRenewal()
	{

		/* Posting the loannumber for renewal*/
		
		if(isset($_POST['Text']))	
		{  
			
			$sample=array('update','create');
			$flag=0;
			$renewal=0;
			$values=array();
			$dataProvider1=new CArrayDataProvider($values);
			$product=new Product;
			$producttype=new Producttype;
			$unit=new Unitmaster;
			$userid=Yii::app()->user->id;
			$user=Usermaster::model()->findByPk($userid);
			$loannum=$_POST['Text'];
			$model=Loanmaster::model()->findByAttributes(array('LoanNumber'=>$loannum));

			
			
			/*Checking whether the loan has already closed or not using loanstatusid */
			
			//$product=Product::model()->findByPk($loandetails->ProductId);
			//$unit=Unitmaster::model()->findByPk($loandetails->UnitMasterId);
			
			
			/*Checking whether the loan number is valid or not */
			if($model)
			{

		 if($model->LoanStatusId==2)
			{
				echo ("<script>alert('Loan already closed')</script>");
			
			}
			
			
			else
			{
				
				$dataProvider1=new CActiveDataProvider('Loandetails', array(
						'pagination' => array(
								'pageSize' => 7,
								'pageVar'=>'load_page',),
						'criteria'=>array(
								'alias'=>'a',
								'condition'=>'a.LoanMasterId="'.$model->LoanMasterId.'"',
								'order'=>'LoanDetailsId ASC',
						),));
			$loandetails=Loandetails::model()->findAllByAttributes(array('LoanMasterId'=>$model->LoanMasterId));
			$newloan=Loanmaster::model()->findBySql("SELECT * FROM loanmaster ORDER BY LoanMasterId DESC LIMIT 1");
			//echo ("<script>alert('".$newloan->LoanNumber."')</script>");
			
			$date=Datemaster::model()->findByPk($model->DateMasterId);
			$customer=Customer::model()->findByPk($model->CustomerId);
			$address=Address::model()->findByPk($customer->AddressId);
			$this->render('update',array(
					'model'=>$model,'customer'=>$customer,'address'=>$address,'loannum'=>$loannum,
					'date'=>$date,'dataProvider1'=>$dataProvider1,'product'=>$product,'flag'=>$flag,'newloan'=>$newloan,'user'=>$user,
			'unit'=>$unit,'renewal'=>$renewal,'producttype'=>$producttype,'sample'=>$sample,'customer'=>$customer,'address'=>$address));
			}
			}
			else if(!$model)
			{
				echo ("<script>alert('invalid Loannumber')</script>");
				$this->redirect(array('renewal'));
				
			}
			
			
		}
		
		/* posting the loan renewal form details */
		
		
		else
		$this->render('renewal');
	}
	
	
	
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	
	public function actionRenewalsave(){
		
		
		$model=new Loanmaster;
		$date=new Datemaster;
		$customer=new Customer;
	
		$model->attributes=$_POST['Loanmaster'];
		$model->LoanNumber=$_POST['newloannumber'];
		$customer=Customer::model()->findByAttributes(array('CustomerCode'=>$_POST['Customer']['CustomerCode']));
			
		$model->CustomerId=$customer->CustomerId;
		$model->LoanStatusId=1;
		$date->attributes=$_POST['Datemaster']['TransactionDate'];
		$exists=Datemaster::model()->findByAttributes(array('TransactionDate'=>$date->TransactionDate));
		
		$voucher=new Voucher;
		$voucher1=new Voucher;	
		if($exists!=NULL)
		{
			$model->DateMasterId=$exists->DateMasterId;
			$voucher->DateMasterId=$exists->DateMasterId;
			$voucher1->DateMasterId=$exists->DateMasterId;
				
		}
		else
		{
			$date->save();
			$model->DateMasterId=$date->DateMasterId;
			$voucher->DateMasterId=$date->DateMasterId;
			$voucher1->DateMasterId=$date->DateMasterId;
				
		}
		$currnt_user=Yii::app()->user->id;
		$model->UserMasterId=$currnt_user;
		$model->SchemeId=$_POST['scheme_renewal'];
		$model->AmountIssued=$_POST['amountissued'];
		$valid=$model->save();
		$data = CJSON::decode($_POST['table_datas'], true);
		
		$accountdetails=Accountgroupdetails::model()->findByAttributes(array('CustomerId'=>$customer->CustomerId));
		
		
		$voucher->AccountGroupId=16;
		$voucher->Credit=$model->AmountIssued;
		$voucher->Debit=0;
		$voucher->VoucherMasterId=5;
		$voucher->VoucherHeadId=0;
		$voucher->VoucherNumber=$model->LoanNumber;
		$voucher->Del_flag=0;
			
			
		$voucher1->AccountGroupId=$accountdetails->AccountGroupId;
		$voucher1->Credit=0;
		$voucher1->Debit=$model->AmountIssued;
		$voucher1->VoucherMasterId=5;
		$voucher1->VoucherHeadId=0;
		$voucher1->VoucherNumber=$model->LoanNumber;
		$voucher1->Del_flag=0;
		
		
		for($i=0;$i<count($data);$i++)
		{
		$loandetails=new Loandetails;
		$product=Product::model()->findByAttributes(array('ProductName'=>$data[$i]['value1']));
		$producttype=Producttype::model()->findByAttributes(array('ProductTypeName'=>$data[$i]['value2']));
				$loandetails->ProductId=$product->ProductId;
				$loandetails->ProductTypeId=$producttype->ProductTypeId;
				$loandetails->Weight=$data[$i]['value5'];
		$loandetails->StoneWeight=$data[$i]['value6'];
		$unit=Unitmaster::model()->findByAttributes(array('Unit'=>$data[$i]['value7']));
		$loandetails->UnitMasterId=$unit->UnitMasterId;
		$loandetails->Number=$data[$i]['value8'];
		$loandetails->MaxAmount=$data[$i]['value4'];
		$loandetails->LoanMasterId=$model->LoanMasterId;
		$loandetails->save();
			
		}
		
		$voucher->save();
		$voucher1->save();
		
		Yii::app()->db->createCommand("UPDATE loanmaster SET LoanStatusId=2 WHERE LoanNumber='".$_POST['Loanmaster']['LoanNumber']."'")->query();
	}
	
	public function actionLoan_create()
	{
		
		$flag=1;
		$renewal=1;
		$valid=true;

		$loandetails=new Loandetails;
		$model=new Loanmaster;
		$producttype=new Producttype;
		$product=new Product;
		$unit=new Unitmaster;
		$scheme=new Scheme;
		$customer=new Customer;
		$address=new Address;
		$date=new Datemaster;
		
		$userid=Yii::app()->user->id;
		$user=Usermaster::model()->findByPk($userid);
		$loan_num=Loanmaster::model()->findBySql('SELECT LoanNumber FROM loanmaster ORDER BY LoanNumber DESC ');
		if($loan_num==NULL)
		{
			$loannum=1000;
		}
		else {
			$loannum=$loan_num->LoanNumber+1;
		}
		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);
		$values=array();
		$dataProvider1=new CArrayDataProvider($values);
		
		if(isset($_POST['Loanmaster']))	
		{	
		
			$model->attributes=$_POST['Loanmaster'];
			$customer=Customer::model()->findByAttributes(array('CustomerCode'=>$_POST['customer']));
		
			$model->CustomerId=$customer->CustomerId;
			$model->LoanStatusId=1;
			$date->attributes=$_POST['Datemaster']['TransactionDate'];
			$exists=Datemaster::model()->findByAttributes(array('TransactionDate'=>$date->TransactionDate));
			
			$voucher=new Voucher;
			$voucher1=new Voucher;
			
			if($exists!=NULL)
			{
				$model->DateMasterId=$exists->DateMasterId;
				$voucher->DateMasterId=$exists->DateMasterId;
				$voucher1->DateMasterId=$exists->DateMasterId;
			}
			else
			{
				$date->save();
				$model->DateMasterId=$date->DateMasterId;
				$voucher->DateMasterId=$date->DateMasterId;
				$voucher1->DateMasterId=$date->DateMasterId;
			
			}
			$currnt_user=Yii::app()->user->id;
			echo("<script>alert('".$currnt_user."')</script>");
			$model->UserMasterId=$currnt_user;
			$model->SchemeId=$_POST['scheme_values'];
			$model->AmountIssued=$_POST['amountissued'];
			
			$valid=$model->save();
			echo("<script>alert('".$_POST['table_datas']."')</script>");
			
			$data = CJSON::decode($_POST['table_datas'], true);
			//echo("<script>alert('".$data[0]."')</script>");
			print_r($data);
			
			

			$random=Yii::app()->db->createCommand('SELECT MAX(Randum_Num) FROM randomnumber where BranchId='.$user->BranchId)->queryScalar();
			$random=$random+1;
			Yii::app()->db->createCommand("UPDATE randomnumber SET Randum_Num='".$random."' where BranchId='".$user->BranchId."'")->query();
			
			
			$accountdetails=Accountgroupdetails::model()->findByAttributes(array('CustomerId'=>$customer->CustomerId));
			
			
			$voucher->AccountGroupId=16;
			$voucher->Credit=$model->AmountIssued;
			$voucher->Debit=0;
			$voucher->VoucherMasterId=5;
			$voucher->VoucherHeadId=0;
			$voucher->VoucherNumber=$model->LoanNumber;
			$voucher->Del_flag=0;
			
			
			$voucher1->AccountGroupId=$accountdetails->AccountGroupId;
			$voucher1->Credit=0;
			$voucher1->Debit=$model->AmountIssued;
			$voucher1->VoucherMasterId=5;
			$voucher1->VoucherHeadId=0;
			$voucher1->VoucherNumber=$model->LoanNumber;
			$voucher1->Del_flag=0;
				
			
		
		for($i=0;$i<count($data);$i++)
				{
					
					$loandetails=new Loandetails;	
					$product=Product::model()->findByAttributes(array('ProductName'=>$data[$i]['value1']));
					$producttype=Producttype::model()->findByAttributes(array('ProductTypeName'=>$data[$i]['value2']));
					$loandetails->ProductId=$product->ProductId;
					$loandetails->ProductTypeId=$producttype->ProductTypeId;
					$loandetails->Weight=$data[$i]['value6'];
					$loandetails->StoneWeight=$data[$i]['value7'];
					$loandetails->UnitMasterId=$data[$i]['value8'];
					$loandetails->Number=$data[$i]['value9'];
					$loandetails->MaxAmount=$data[$i]['value5'];
					$loandetails->LoanMasterId=$model->LoanMasterId;
					$loandetails->save();
				
				}
					
		$voucher->save();
		$voucher1->save();
		
	
		}
		else 
		{
		$this->render('create',array(
			'model'=>$model,'product'=>$product,'scheme'=>$scheme,'dataProvider1'=>$dataProvider1,
				'customer'=>$customer,'address'=>$address,'date'=>$date,'loannum'=>$loannum,'flag'=>$flag,'user'=>$user,
				'unit'=>$unit,'producttype'=>$producttype,'loandetails'=>$loandetails,'renewal'=>$renewal
		));
		}
	}

	
	public function actionCreate()
	{
	
		$flag=1;
		$renewal=1;
		$valid=true;
		$loandetails=new Loandetails;
		$model=new Loanmaster;
		$producttype=new Producttype;
		$product=new Product;
		$unit=new Unitmaster;
		$scheme=new Scheme;
		$customer=new Customer;
		$address=new Address;
		$date=new Datemaster;
	
		$userid=Yii::app()->user->id;
		$user=Usermaster::model()->findByPk($userid);
		$branch=Branch::model()->findByPk($user->BranchId);

		//$random=Randomnumber::model()->findBySql('SELECT MAX(Randum_Num) FROM randomnumber where BranchId='.$user->BranchId);
		
		//$random=Yii::app()->db->createCommand('SELECT MAX(Randum_Num) FROM randomnumber where BranchId='.$user->BranchId)->queryScalar();
		
		$random=uniqid();
		
		//$loan_num=Loanmaster::model()->findBySql('SELECT LoanNumber FROM loanmaster ORDER BY LoanNumber DESC ');
	//	if($loan_num==NULL)
		//{
		//	$random=1000;
		//	$loannum=1000;
		//}
		//else {
			
			
			$loannum=$branch->BranchCode.$random;
		
		//}
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);
		$values=array();
		$dataProvider1=new CArrayDataProvider($values);
	
		if(isset($_POST['Loanmaster']))
		{
	
			$model->attributes=$_POST['Loanmaster'];
			$customer=Customer::model()->findByAttributes(array('CustomerCode'=>$_POST['customer']));
			$branch=Branch::model()->findByPk($model->BranchId);
			$model->SchemeId=$_POST['scheme_values'];
			$model->AmountIssued=$_POST['amountissued'];
			
			
			$branchname=$branch->BranchName;
			$customercode=$customer->CustomerCode;
			$customername=$customer->FirstName;
			$address=Address::model()->findByPk($customer->AddressId);
			$district=Districtmaster::model()->findByPk($address->DistrictMasterId);
			$city=Citymaster::model()->findByPk($address->CityMasterId);
			$state=Statemaster::model()->findByPk($address->StateMasterId);
			$country=Countrymaster::model()->findByPk($address->CountryMasterId);
			$addressline1=$address->AddressLine1;
			$addressline2=$address->AddressLine2;
			$district_name=$district->District;
			$city_name=$city->City;
			$state_name=$state->State;
			$country_name=$country->Country;
			
			
			
			$scheme=Scheme::model()->findByPk($model->SchemeId);
			$schemename=$scheme->SchemeName;
			$loan_date=$_POST['Datemaster']['TransactionDate'];
			$loannum=$model->LoanNumber;
			$loanamount=$model->AmountIssued;
			$interest=$scheme->InterestRate;
			$duration=$scheme->DurationInMonths;
			//$duedate=$_POST['repayment_date'];
			
			
			
				
			
			$currnt_user=Yii::app()->user->id;
			//echo("<script>alert('".$currnt_user."')</script>");
			$model->UserMasterId=$currnt_user;
			$data = CJSON::decode($_POST['table_datas'], true);
			//echo("<script>alert('".$data[0]."')</script>");
			//print_r($data);
			
			$total_weight=0;
			$stone_weight=0;
			
			for($i=0;$i<count($data);$i++)
			{	
			$loandetails=new Loandetails;
			$product=Product::model()->findByAttributes(array('ProductName'=>$data[$i]['value1']));
					$producttype=Producttype::model()->findByAttributes(array('ProductTypeName'=>$data[$i]['value2']));
							$loandetails->ProductId=$product->ProductId;
							$loandetails->ProductTypeId=$producttype->ProductTypeId;
							$loandetails->Weight=$data[$i]['value6'];
									$loandetails->StoneWeight=$data[$i]['value7'];
									$loandetails->UnitMasterId=$data[$i]['value8'];
									$loandetails->Number=$data[$i]['value9'];
									$loandetails->MaxAmount=$data[$i]['value5'];
									$loandetails->LoanMasterId=$model->LoanMasterId;
									
									$total_weight=$total_weight+$data[$i]['value6'];
									$stone_weight=$stone_weight+$data[$i]['value7'];
									
								
			}
			
			if (Yii::app()->request->isAjaxRequest)
			{
				echo CJSON::encode(array(
						'status'=>'failure',
						'div'=>$this->renderPartial('_printloan',array(
					'branchname'=>$branchname,'customercode'=>$customercode,'customername'=>$customername,'addressline1'=>$addressline1,
					'addressline2'=>$addressline2,'district_name'=>$district_name,'state_name'=>$state_name,'city_name'=>$city_name,'loannum'=>$loannum,'country_name'=>$country_name,
					'schemename'=>$schemename,'loan_date'=>$loan_date,'loanamount'=>$loanamount,'interest'=>$interest,'duration'=>$duration,
					'total_weight'=>$total_weight,'stone_weight'=>$stone_weight),true)));
				exit;
			}
			
		/*	$this->renderPartial('_printloan',array(
					'branchname'=>$branchname,'customercode'=>$customercode,'customername'=>$customername,'addressline1'=>$addressline1,
					'addressline2'=>$addressline2,'district_name'=>$district_name,'state_name'=>$state_name,'city_name'=>$city_name,'loannum'=>$loannum,'country_name'=>$country_name,
					'schemename'=>$schemename,'loan_date'=>$loan_date,'loanamount'=>$loanamount,'interest'=>$interest,'duration'=>$duration,
					'total_weight'=>$total_weight,'stone_weight'=>$stone_weight
			));*/
			
			
		}
		else
		{
			$this->render('create',array(
					'model'=>$model,'product'=>$product,'scheme'=>$scheme,'dataProvider1'=>$dataProvider1,
					'customer'=>$customer,'address'=>$address,'date'=>$date,'loannum'=>$loannum,'flag'=>$flag,'user'=>$user,
					'unit'=>$unit,'producttype'=>$producttype,'loandetails'=>$loandetails,'renewal'=>$renewal
			));
		}
	}
	
	
	
	
	
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		// Uncomment the following line if AJAX validation is needed
		
		 $customer=Customer::model()->findByPk($model->CustomerId); 
		 $address=Address::model()->findByPk($customer->AddressId); 
		  
		 $this->performAjaxValidation($model);

		if(isset($_POST['Loanmaster']))
		{
			$model->attributes=$_POST['Loanmaster'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->LoanMasterId));
		}

		$this->render('update',array(
			'model'=>$model,'address'=>$address,'customer'=>$customer
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Loanmaster');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Loanmaster('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Loanmaster']))
			$model->attributes=$_GET['Loanmaster'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Loanmaster the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Loanmaster::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Loanmaster $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='verticalForm')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}


public function actionGetscheme()
{
	$sum=$_POST['value1'];
	//echo "value1".$value1;
	$scheme=Scheme::model()->findAll();
	$maxamt=array();
	$i=0;
	echo "<table border='1'><tr>";
	echo "<th>Scheme</th>";
	echo "<th>Amount</th>";
	foreach($scheme as $value1)
	{
	//$maxamt[$i] =$value1->SchemeName;
		//echo CHtml::tag('option', array('value'=>$value1->MaximumAmt),CHtml::encode($value1->SchemeName." ".$value1->MaximumAmt*$sum),true);
		//echo CHtml::tag('div', array('value'=>$value1->MaximumAmt),CHtml::encode($value1->SchemeName." ".$value1->MaximumAmt*$sum),true);
		 echo "<tr><td>";
		echo $value1->SchemeName;
		echo "</td>";
		echo "<td>";
		echo $value1->MaximumAmt*$sum;
		echo "</td>";
		echo "</tr>";
		
		//echo $value1->MaximumAmt;
		//echo "<end>";
	//$i++;
	
	}
	echo "</tr></table>";
//print_r($maxamt);
}

public function actionGetscheme1()
{
	//$value=$_POST['SchemeId'];
	//echo "value1".$value1;
	//$scheme=Scheme::model()->findByPk($value);
	//echo $scheme->MaximumAmt;
	$value=$_POST['value1'];
	
	$producttype=Producttype::model()->findByAttributes(array('ProductTypeName'=>$value));
	//echo $producttype->ProductTypeId;
	$scheme=Scheme::model()->findAllByAttributes(array('ProductTypeId'=>$producttype->ProductTypeId));
	$val1=CHtml::listData($producttype,'ProductTypeId','ProductTypeName');
	foreach($scheme as $value)
	{
		echo CHtml::tag('option', array('value'=>$value->SchemeId),CHtml::encode($value->SchemeName),true);
	}
	
}


public function actionLoandetails()
{
	
	 echo CHtml::textField('Text'); 
	 $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
	 		'name'=>'protypeeeeeeeeee',
	 		'source'=>$this->createUrl('loan/producttype'),
	 		// additional javascript options for the autocomplete plugin
	 		'options'=>array(
	 				'showAnim'=>'fold',
	 				'select'=>"js:  function(event,ui){
			$('#goldrate').val(ui.item['attribute2'])
			$('#Protype_hidden').val(ui.item['id']);
}"
	 		),
	 		'htmlOptions'=>array(
	 				'class'=>'span1',
	 				'placeholder'=>'Product Type',
	 		),
	 ));
	//$this->renderPartial('_loandetails');

}
public function actionGetgoldrate(){
	//$value=$_POST[data];
	//echo $value;

}

public function actionCustomer_create()
{	
	$model=new Customer;
	$address=new Address;
	$date=new Datemaster;
	$identitymaster=new Identificationproofmaster;
	$identitydetails=new Identificationproofdetails;
	$dataProvider=new CActiveDataProvider('Customer', array(
			'criteria'=>array('order'=>'CustomerId DESC'),
			'pagination' => array(
					'pageSize' => 7,)));
	// Uncomment the following line if AJAX validation is needed
	$this->performAjaxValidation($model);
	$customercode=Customer::model()->findBySql('SELECT CustomerCode FROM customer ORDER BY CustomerCode DESC ');
	if($customercode==NULL)
	{
		$customercode=3000;
	}
	else {
		$customercode=$customercode->CustomerCode+1;
	}
	
	if(isset($_POST['Customer'],$_POST['Address'],$_POST['Identificationproofdetails']))
	{
		$customerlog=new Customerlog;
		$model->attributes=$_POST['Customer'];
		$address->attributes=$_POST['Address'];
		$identitydetails->attributes=$_POST['Identificationproofdetails'];
		$address->save();
		$model->AddressId=$address->AddressId;
		$model->CustomerStatusId=2;
		$date->attributes=$_POST['Datemaster'];
		$customerlog->AddressId=$address->AddressId;
		
		
		$exists=Datemaster::model()->findByAttributes(array('TransactionDate'=>$date->TransactionDate));
		if($exists!=NULL)
		{
			$model->DateMasterId=$exists->DateMasterId;
	
		}
		else
		{
			$date->save();
			$model->DateMasterId=$date->DateMasterId;	
		}
		$currentdate = date('H-i-s');
		$uploadfile=CUploadedFile::getInstance($model,'CustomerPhoto');
		$filename="{$currentdate}-{$uploadfile}";
		$model->CustomerPhoto=$filename;
		if($_POST['Customer']['CustomerPhoto'])
		{
			echo ("<script>alert('hii');</script>");
			$uploadfile->saveAs(Yii::app()->basePath.'/../upload/'.$filename);
		}
		$model->Status=0;
		if($model->save())
			
		{
			$customerlog->Mobile=$model->Mobile;
			$customerlog->CustomerId=$model->CustomerId;
			$customerlog->save();
			$identitydetails->CustomerId=$model->CustomerId;
			$identitydetails->save();
			$this->redirect('create');
		}
	
			
	}
	
	$this->render('customer_create',array(
			'model'=>$model,'address'=>$address,'customercode'=>$customercode,'date'=>$date,'dataProvider'=>$dataProvider,'identitymaster'=>$identitymaster,'identitydetails'=>$identitydetails
	));
}

public function actionGettopscheme(){
	
	$value=$_POST['value'];

	$producttype=Producttype::model()->findByPk($value);
	$scheme=Scheme::model()->findAllByAttributes(array('ProductTypeId'=>$value));
	$maxamt=array();
	$schemedata=array();
	$i=0;
	foreach($scheme as $val)
	{		
		$maxamt[$i]=$val->MaximumAmt;
		$i++;
	}
	$scheme=Scheme::model()->findByAttributes(array('MaximumAmt'=>max($maxamt)));
	$schemedata[0]=$scheme->MaxAmtInPer;
	$schemedata[1]=max($maxamt);
	$schemedata[2]=$scheme->DurationInDays;
	$schemedata[3]=$producttype->CurrentRate;
	$schemedata[4]=$scheme->SchemeId;
	echo CJSON::encode($schemedata);
	
}


public function actionGetcustomerform()
{
	
	$value=$_POST['value'];
	$customeraddress=array();
	$address=Address::model()->findByPk($value);
	$district=Districtmaster::model()->findByPk($address->DistrictMasterId);
	$customeraddress[0]=$address->AddressLine1;
	$customeraddress[1]=$address->AddressLine2;
	$customeraddress[2]=$address->Pincode;
	$customeraddress[3]=$district->District;
	echo CJSON::encode($customeraddress);
	//echo $customeraddress[0];
		//echo $customeraddress[2];	
}

public function actionTabledata(){
	
	$data = CJSON::decode($_POST['value'], true);
	foreach ($data as $value)
	{
		$loandetails=new Loandetails; 
		$loandetails->ProductTypeId=$value['value2'];
		$loandetails->ProductId=$value['value4'];
		$loandetails->Weight=$value['value5'];
		$loandetails->StoneWeight=$value['value6'];
		$loandetails->Number=$value['value7'];
		$loandetails->MaxAmount=$value['value11'];
		$loandetails->LoanMasterId=$model->LoanMasterId;
		$loandetails->SchemeId=$value['value9'];
		$loandetails->UnitMasterId=$value['value10'];
		$loandetails->save();
	}
	
}
public function actionScheme_details(){
$value=$_POST['value'];
$schemearray=array();

$scheme=Scheme::model()->findByPk($value);
$schemearray[0]=$scheme->MaxAmtInPer;
$schemearray[1]=$scheme->MaximumAmt;
$schemearray[2]=$scheme->DurationInDays;
echo CJSON::encode($schemearray);

}

public function actionNopermission()
{
	//To redirect to No access pages/Modules
	$this->render('nopermission');
}
}
