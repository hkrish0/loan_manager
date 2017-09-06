<?php

class BranchController extends Controller
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
				'actions'=>array('index','view'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('@'),
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
		$model=new Branch;
		$address=new Address;
		$datemaster=new Datemaster;
		$city=new Citymaster;
		$state=new Statemaster;
		$country=new Countrymaster;
		$user=new Usermaster;
		
		
		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);
		
		 $dataProvider=new CActiveDataProvider('Branch', array(
		 		'criteria'=>array('order'=>'BranchId DESC'),		 
		 		'pagination' => array(
		 				'pageSize' => 7,)));
		 $branchcode=Branch::model()->findBySql('SELECT BranchCode FROM branch ORDER BY BranchCode DESC ');
		if($branchcode==NULL)
		{
			$branchcode=2000;
		}
		else {
			$branchcode=$branchcode->BranchCode+1;
		}
		if(isset($_POST['Branch'],$_POST['Address'],$_POST['Usermaster']))
		{
			
			$user->attributes=$_POST['Usermaster'];
			$usertype=Usertype::model()->findByAttributes(array('UserType'=>'administrator'));
			$user->UserTypeId=$usertype->UserTypeId;
			$user->CreatedDate=date('Y-m-d H:i:s');
			$address->attributes=$_POST['Address'];
			$address->save();
			
			date("Y/m/d");
			$datemaster->TransactionDate=date("Y/m/d");
			$datemaster->save(false);
		
			$model->attributes=$_POST['Branch'];
			$model->DateMasterId=$datemaster->DateMasterId;
			$model->AddressId=$address->AddressId;
		
			if($model->save())
			{
				$random=new Randomnumber;
				$voucherno=new Voucherno;
				$user->BranchId=$model->BranchId;
				$user->save();
				
				$random->BranchId=$model->BranchId;
				$random->Randum_Num=1000;
				$random->save();
				
				$voucherno->BranchId=$model->BranchId;
				$voucherno->VoucherNo=5000;
				$voucherno->save();
				
				
				$this->redirect('create');
			}
		}

		$this->render('create',array(
			'model'=>$model,'address'=>$address,'city'=>$city,'state'=>$state,'country'=>$country,'dataProvider'=>$dataProvider,'branchcode'=>$branchcode,
				'user'=>$user
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
		$datemaster=new Datemaster;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$address=Address::model()->findByPk($model->AddressId);
		$user=Usermaster::model()->findByAttributes(array('BranchId'=>$model->BranchId));
		$dataProvider=new CActiveDataProvider('Branch', array(
				'criteria'=>array('order'=>'BranchId DESC'),
				'pagination' => array(
						'pageSize' => 7,)));
		$branchcode=$model->BranchCode;
		if(isset($_POST['Branch']))
		{
			$model->attributes=$_POST['Branch'];
			$address->attributes=$_POST['Address'];
			$address->save();	
			$datemaster->TransactionDate=date("Y/m/d");
			$datemaster->save(false);
			$model->attributes=$_POST['Branch'];
			$model->DateMasterId=$datemaster->DateMasterId;
			$model->AddressId=$address->AddressId;
			if($model->save())
				$this->redirect(array('create'));
		}

		$this->render('update',array(
			'model'=>$model,'address'=>$address,
		'dataProvider'=>$dataProvider,'branchcode'=>$branchcode,'user'=>$user
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
		
		
		$user=Usermaster::model()->findByAttributes(array('BranchId'=>$id));
		$loan=Loanmaster::model()->findByAttributes(array('BranchId'=>$id));
		$voucherno=Voucherno::model()->findByAttributes(array('BranchId'=>$id));
		$randomnum=Randomnumber::model()->findByAttributes(array('BranchId'=>$id));


		
		if($user==null && $loan==null)
		{
			$voucherno->delete();
			$randomnum->delete();
			$model->delete();
			Yii::app()->user->setFlash('notice','Branch Deleted');
			$this->redirect(array('create'));
		}
		else{
		
			Yii::app()->user->setFlash('notice','Branch can\'t be Deleted! under process');
			$this->redirect(array('create'));
				
		}

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
	
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Branch');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Branch('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Branch']))
			$model->attributes=$_GET['Branch'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Branch the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Branch::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Branch $model the model to be validated
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
