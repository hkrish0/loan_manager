<?php

class UsertypeController extends Controller
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
				'actions'=>array('index','view','update1'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','update1'),
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
		$model=new Usertype;
		$privilege=new Privilegemaster;
		$dataProvider=new CActiveDataProvider('Usertype', array(
				'criteria'=>array('order'=>'UserTypeId DESC'),
				'pagination' => array(
						'pageSize' => 7,)));
		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['Usertype']))
		{
			$privilege_array=array();
			
			$privilege_array=$_POST['Privilegemaster']['PrivilegeName'];
		
			$privilege->attributes=$_POST['Privilegemaster'];
			$model->attributes=$_POST['Usertype'];
			$model->save();
			
			foreach($privilege_array as $value)
			{
				$privilege1=new Privilegemaster;				
				$privilege1->PrivilegeName=$value;
				$privilege1->UserTypeId=$model->UserTypeId;
				$privilege1->save();
			}
			
			
				//$this->redirect(array('view','id'=>$model->UserTypeId));
		}
		
		
else {
		$this->render('create',array(
			'model'=>$model,'privilege'=>$privilege,'dataProvider'=>$dataProvider
		));
}
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate()
	
	{
		
		$usertype=$_POST['Usertype']['UserType'];
		
		echo $usertype;

		$utype=Usertype::model()->findByAttributes(array('UserType'=>$usertype));

		$privilege=Privilegemaster::model()->findAllByAttributes(array('UserTypeId'=>$utype->UserTypeId));

		$privilege->delete();


		$privilege_array=array();
			
			$privilege_array=$_POST['Privilegemaster']['PrivilegeName'];
		
			//$privilege1->attributes=$_POST['Privilegemaster'];
			$utype->attributes=$_POST['Usertype'];
			$utype->save();
			
			foreach($privilege_array as $value)
			{
				$privilege1=new Privilegemaster;				
				$privilege1->PrivilegeName=$value;
				$privilege1->UserTypeId=$utype->UserTypeId;
				$privilege1->save();
			}
			

		/*$model=new Usertype;
		$privilege=new Privilegemaster;
		$dataProvider=new CActiveDataProvider('Usertype', array(
				'criteria'=>array('order'=>'UserTypeId DESC'),
				'pagination' => array(
						'pageSize' => 7,)));
		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['Usertype']))
		{
			$privilege_array=array();
			
			$privilege_array=$_POST['Privilegemaster']['PrivilegeName'];
		
			$privilege->attributes=$_POST['Privilegemaster'];
			$model->attributes=$_POST['Usertype'];
			$model->save();
			
			foreach($privilege_array as $value)
			{
				$privilege1=new Privilegemaster;				
				$privilege1->PrivilegeName=$value;
				$privilege1->UserTypeId=$model->UserTypeId;
				$privilege1->save();
			}
			
			
				//$this->redirect(array('view','id'=>$model->UserTypeId));
		}
		
		
else {
		$this->render('create',array(
			'model'=>$model,'privilege'=>$privilege,'dataProvider'=>$dataProvider
		));
}
	*/

	}







/*	public function actionUpdate1($id)
	{
		$model=$this->loadModel($id);
		//$privilege=new Privilegemaster;
	 	$this->performAjaxValidation($model);
	 
	 	$prive=new Privilegemaster();
	 
		 $privilege=Privilegemaster::model()->findAllByAttributes(array('UserTypeId'=>$model->UserTypeId));
	 		$arr1 = CHtml::listData($privilege, 'PrivilegeMasterId', 'PrivilegeName');
	 		$arr1 = array_values(array_filter($arr1));
	 
		if(isset($_POST['Usertype']))
		{
			$model->attributes=$_POST['Usertype'];
			$privilege->attributes=$_POST['Privilegemaster'];
			if($model->save())
				$privilege->UserTypeId=$model->UserTypeId;
			    $privilege->save();
				$this->redirect(array('view','id'=>$model->UserTypeId));
		}

		$this->render('update',array(
			'model'=>$model,'privilege'=>$prive,'checklist'=>$arr1
		));
	}
	
	*/
	public function actionUpdate1($id)
	{
		$model=$this->loadModel($id);
		$privilege=Privilegemaster::model()->findAllByAttributes(array('UserTypeId'=>$model->UserTypeId));
		echo CJSON::encode(array('usertype'=>$model,'privilege'=>$privilege));

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
		$dataProvider=new CActiveDataProvider('Usertype');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Usertype('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Usertype']))
			$model->attributes=$_GET['Usertype'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Usertype the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Usertype::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Usertype $model the model to be validated
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
