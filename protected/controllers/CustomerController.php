<?php

class CustomerController extends Controller
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
		//Created by AbhilashRajR@Golunusoft
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

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','listcustomer'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','listcustomer'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
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

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		
		$model=new Customer;		
		$address=new Address;
		$date=new Datemaster;
		$customerlog=new Customerlog;
		$accountgroup=new Accountgroup;
		$accountdetails=new Accountgroupdetails;
		$identitymaster=new Identificationproofmaster;
		$identitydetails=new Identificationproofdetails;

 

		$dataProvider=new CActiveDataProvider('Customer', array(
				'criteria'=>array('condition'=>'Status = 0','order'=>'CustomerId DESC'),
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
			$customername=$_POST['Customer']['FirstName'].$_POST['Customer']['LastName'];			
			$accountgroup->AccountName=$customername;
			$accountgroup->GroupUnder=17;
			$accountgroup->IsDefault=1;
			$identitydetails->attributes=$_POST['Identificationproofdetails'];
			$model->attributes=$_POST['Customer'];
			$address->attributes=$_POST['Address'];
			$address->save();		
			$model->AddressId=$address->AddressId;
			$model->CustomerStatusId=2;
			$date->attributes=$_POST['Datemaster'];
			$customerlog->AddressId=$address->AddressId;
			//echo("<script>alert('".$date->TransactionDate."');</script>");
			$exists=Datemaster::model()->findByAttributes(array('TransactionDate'=>$date->TransactionDate));
			if($exists!=NULL)
			{

				$model->DateMasterId=$exists->DateMasterId;	
				//echo("<script>alert('".$model->DateMasterId."');</script>");
			}
			else
			{
				$valid=$date->save();
				
				$model->DateMasterId=$date->DateMasterId;
			}
			
			$rnd = rand(0,9999);
			$currentdate = date("YmdHis");;
			
			$uploadfile=CUploadedFile::getInstance($model,'CustomerPhoto');
			$filename="{$currentdate}-{$uploadfile}";
			$model->CustomerPhoto=$filename;
			
			if(!empty($uploadfile))
			{
				
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
			$accountgroup->save();
			
			$accountdetails->AccountGroupId=$accountgroup->AccountGroupId;
			$accountdetails->CustomerId=$model->CustomerId;
			$accountdetails->AddressId=$address->AddressId;
			$accountdetails->save();
				$this->redirect('create');
				
		}

			
		}

		$this->render('create',array(
			'model'=>$model,'address'=>$address,'customercode'=>$customercode,'date'=>$date,'dataProvider'=>$dataProvider,'identitymaster'=>$identitymaster,'identitydetails'=>$identitydetails
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$address=Address::model()->findByPk($model->AddressId);
		
		$customercode=$model->CustomerCode;
		$date=Datemaster::model()->findByPk($model->DateMasterId);
		$identitydetails=Identificationproofdetails::model()->findByAttributes(array('CustomerId'=>$id));
		$dataProvider=new CActiveDataProvider('Customer', array(
				'criteria'=>array('condition'=>'Status = 0','order'=>'CustomerId DESC'),
				'pagination' => array(
						'pageSize' => 7,)));
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['Customer']))
		{
			$customerlog=new Customerlog;
			$address=new Address;
			$model->attributes=$_POST['Customer'];
			$identitydetails->attributes=$_POST['Identificationproofdetails'];
			$address->attributes=$_POST['Address'];
			$address->save();
			$customerlog->AddressId=$address->AddressId;
			$model->AddressId=$address->AddressId;
			$model->CustomerStatusId=2;
			$date->attributes=$_POST['Datemaster'];
				
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
				
			
				$model->save();
				$identitydetails->CustomerId=$model->CustomerId;
				$identitydetails->save();
				$customerlog->Mobile=$model->Mobile;
				$customerlog->CustomerId=$model->CustomerId;
				$customerlog->save();
				
				
				$this->redirect(array('create'));
		}

		$this->render('update',array(
			'model'=>$model,'address'=>$address,'customercode'=>$customercode,'date'=>$date,'identitydetails'=>$identitydetails,'dataProvider'=>$dataProvider
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$model=$this->loadModel($id);
		$loanmaster=Loanmaster::model()->findByAttributes(array('CustomerId'=>$id));
		$accountgroupdet=Accountgroupdetails::model()->findByAttributes(array('CustomerId'=>$id));
		//$customerlog=Customerlog::model()->findByAttributes(array('CustomerId'=>$id));
		
		//$customerlog->delete();
		
		if($loanmaster==null && $accountgroupdet===null)
		{

			Yii::app()->db->createCommand("UPDATE customer SET Status=1 WHERE CustomerId='".$id."'")->query();
			//$model->delete();
			Yii::app()->user->setFlash('notice','Customer Deleted');
			$this->redirect(array('create'));
		}
		else 
		{
		Yii::app()->user->setFlash('notice','Can/t be deleted,Customer is under process');
		$this->redirect(array('create'));
		}
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Customer');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	
	public function actionListcustomer()
	{
		$dataProvider=new CActiveDataProvider('Customer', array(
				'criteria'=>array('order'=>'CustomerId DESC'),
				'pagination' => array(
						'pageSize' => 7,)));
		$this->render('listcustomer',array(
				'dataProvider'=>$dataProvider,
		));
	
	}
	
	
	public function actionAdmin()
	{
		$model=new Customer('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Customer']))
			$model->attributes=$_GET['Customer'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Customer the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Customer::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Customer $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='verticalForm')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
