<?php

class VoucherController extends Controller
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
				'actions'=>array('index','view','daybook','cashbook','bankbook'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','daybook','cashbook','bankbook'),
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
		$model=new Voucher;
		$date=new Datemaster;
		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);		 
		 $userid=Yii::app()->user->id;
		 $user=Usermaster::model()->findByPk($userid);
		 $branch=Branch::model()->findByPk($user->BranchId);
		 $random=Yii::app()->db->createCommand('SELECT MAX(VoucherNo) FROM voucherno where BranchId='.$user->BranchId)->queryScalar();
			
		
		 
		 $voucherno=$branch->BranchCode.$random;
			
		if(isset($_POST['Voucher']))
		{
			
			$model->attributes=$_POST['Voucher'];
			$date->attributes=$_POST['Datemaster'];
			$exists=Datemaster::model()->findByAttributes(array('TransactionDate'=>$date->TransactionDate));
		
			$currnt_user=Yii::app()->user->id;
			
			$user=Usermaster::model()->findByPk($currnt_user);
			//echo("<script>alert('".$currnt_user."');</script>");
			
			$model->UserMasterId=$currnt_user;
			
			$model->Debit=0;
			$model->Del_flag=0;
			$model1=new Voucher;
			$model1->attributes=$_POST['Voucher'];
			$model1->AccountGroupId=$_POST['ToAccount'];
			$model1->Debit=$_POST['Voucher']['Credit'];
			$model1->Credit=0;
			$model1->UserMasterId=$currnt_user;
			
			if($exists!=NULL)
			{
				$model->DateMasterId=$exists->DateMasterId;
				$model1->DateMasterId=$exists->DateMasterId;
			}
			else
			{
				$date->save();
				$model->DateMasterId=$date->DateMasterId;
				$model1->DateMasterId=$date->DateMasterId;
			
			}
			$model1->Del_flag=0;
			$valid=$model->save();
			$valid1=$model1->save();
			$random=Yii::app()->db->createCommand('SELECT MAX(VoucherNo) FROM voucherno where BranchId='.$user->BranchId)->queryScalar();
			$random=$random+1;
			Yii::app()->db->createCommand("UPDATE voucherno SET VoucherNo='".$random."' where BranchId='".$user->BranchId."'")->query();
				
				$this->redirect(array('create'));
			//$model->save()
				
		}
		else {
		$this->render('create',array(
			'model'=>$model,'date'=>$date,'voucherno'=>$voucherno
		));
		}
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	
	
	
	public function actionDaybook(){
		
		
		$currnt_user=Yii::app()->user->id;
		$name='Day book';
		$criteria=new CDbCriteria;
		$criteria->condition = "UserMasterId >= :start";
		$criteria->params = array (	
		':start' => $currnt_user,
		);
		
		$criteria->order = "VoucherId DESC";	
		$dataProvider=new CActiveDataProvider('Voucher', array(
				'criteria'=>$criteria,			
				'pagination' => array(
						'pageSize' => 7,)));
		
		
		$this->render('daybook',array(
				'dataProvider'=>$dataProvider,'name'=>$name
		));
		
		
	}
	
	
	public function actionCashbook(){
	
		$name='Cash book';
		$ids=array('1','2');
		$criteria=new CDbCriteria;
		$criteria->addInCondition('VoucherMasterId',$ids,'OR');
		$criteria->order = "VoucherId DESC";
		//$criteria->addInCondition('VoucherId DESC','order');
		
		//$criteria->conditions=implode(' OR ',$conditions);
		
		$dataProvider=new CActiveDataProvider('Voucher', array(
				'criteria'=>$criteria,
				
				'pagination' => array(
						'pageSize' => 7,)));
	
	
		$this->render('daybook',array(
				'dataProvider'=>$dataProvider,'name'=>$name
		));
	
	
	}
	
	
	public function actionBankbook(){
	
		$name='Bank book';
		$ids=array('3','4');
		$criteria=new CDbCriteria;
		$criteria->addInCondition('VoucherMasterId',$ids,'OR');
		$criteria->order = "VoucherId DESC";
		//$criteria->addInCondition('VoucherId DESC','order');
	
		//$criteria->conditions=implode(' OR ',$conditions);
	
		$dataProvider=new CActiveDataProvider('Voucher', array(
				'criteria'=>$criteria,
	
				'pagination' => array(
						'pageSize' => 7,)));
	
	
		$this->render('daybook',array(
				'dataProvider'=>$dataProvider,'name'=>$name
		));
	
	
	}
	
	
	
	
	
	
	
	
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Voucher']))
		{
			$model->attributes=$_POST['Voucher'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->VoucherId));
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

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Voucher');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Voucher('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Voucher']))
			$model->attributes=$_GET['Voucher'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Voucher the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Voucher::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Voucher $model the model to be validated
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
