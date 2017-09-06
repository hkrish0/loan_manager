<?php

class TransactionController extends Controller
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
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','receipt','listdata'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','receipt','listdata'),
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
		$model=new Transaction;
		$date=new Datemaster;
		$headoffice = array(
   		 'jobs'     => Yii::t('fim','HeadOffice'));
		$voucher=Transaction::model()->findBySql('SELECT VoucherNo FROM transaction ORDER BY VoucherNo DESC ');
		if($voucher==NULL)
		{
			$voucher=5000;
		}
		else {
			$voucher=$voucher->VoucherNo+1;
		}
		
		
		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['Transaction']))
		{
			$model->attributes=$_POST['Transaction'];
			$model->FromAccount='HeadOffice';
			$model->Debit=0;
			$model->TransactionType='Payment';
			$model->ToAccount=$_POST['topay'];
			
			echo("<script>alert('".$model->ToAccount."')</script>");;
			$date->attributes=$_POST['Datemaster']['TransactionDate'];
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
			if($model->save(false))
			{
				$this->redirect('create');
				
			}
		}

		$this->render('create',array(
			'model'=>$model,'date'=>$date,'headoffice'=>$headoffice,'voucher'=>$voucher,
		));
	}

	public function actionReceipt()
	{
		
		$model=new Transaction;
		$date=new Datemaster;
		$headoffice = array(
				'jobs'     => Yii::t('fim','HeadOffice'));
		$voucher=Transaction::model()->findBySql('SELECT VoucherNo FROM transaction ORDER BY VoucherNo DESC ');
		if($voucher==NULL)
		{
			$voucher=5000;
		}
		else {
			$voucher=$voucher->VoucherNo+1;
		}
	
	
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);
	
		if(isset($_POST['Transaction']))
		{
			$model->attributes=$_POST['Transaction'];
			$model->ToAccount='HeadOffice';
			$model->Credit=0;
			$model->TransactionType='Receipt';
			$model->FromAccount=$_POST['fromrec'];
				
			
			$date->attributes=$_POST['Datemaster']['TransactionDate'];
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
		if($model->save(false))
			{
				$this->redirect('receipt');
				
			}
		}
	
		$this->render('receipt',array(
				'model'=>$model,'date'=>$date,'headoffice'=>$headoffice,'voucher'=>$voucher,
		));
	}
	
	
	
	
	
	
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	
	public function actionListdata()
	{
		
		
		$dataProvider=new CActiveDataProvider('Transaction', array(
				'criteria'=>array('order'=>'TransactionId DESC'),
				'pagination' => array(
						'pageSize' => 7,)));
		
		$this->render('listdata',array(
				'dataProvider'=>$dataProvider,
		));
	
	}
	
	
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Transaction']))
		{
			$model->attributes=$_POST['Transaction'];
			
			if($model->save())
				$this->redirect(array('view','id'=>$model->TransactionId));
		}

		$this->render('update',array(
			'model'=>$model,
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

	public function actionList()
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
		$dataProvider=new CActiveDataProvider('Transaction');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Transaction('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Transaction']))
			$model->attributes=$_GET['Transaction'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Transaction the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Transaction::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Transaction $model the model to be validated
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
