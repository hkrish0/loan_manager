<?php

class UsermasterController extends Controller
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
		$model=new Usermaster;
		$city=new Citymaster;
		
		$userid=Yii::app()->user->id;
		$user=Usermaster::model()->findByPk($userid);
		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);
		 $dataProvider=new CActiveDataProvider('Usermaster', array(
		 		'criteria'=>array('order'=>'UserMasterId DESC'),
		 		'pagination' => array(
		 				'pageSize' => 7,)));
		 
		 
		if(isset($_POST['Usermaster']))
		{
			
			//$d=date('Y-m-d H:i:s');
			//echo("<script>alert('".$d."');</script>");
			
			$model->attributes=$_POST['Usermaster'];
			$model->CreatedDate=date('Y-m-d H:i:s');
			if($model->save(false))
				$this->redirect(array('create'));
		}

		$this->render('create',array(
			'model'=>$model,'dataProvider'=>$dataProvider,'city'=>'$city','user'=>$user
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
		$dataProvider=new CActiveDataProvider('Usermaster', array(
				'criteria'=>array('order'=>'UserMasterId DESC'),
				'pagination' => array(
						'pageSize' => 7,)));
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Usermaster']))
		{
			$model->attributes=$_POST['Usermaster'];
			if($model->save())
				$this->redirect('create');
		}

		$this->render('update',array(
			'model'=>$model,'dataProvider'=>$dataProvider
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
		$loanmaster=Loanmaster::model()->findByAttributes(array('UserMasterId'=>$id));
		$voucher=Voucher::model()->findByAttributes(array('UserMasterId'=>$id));
			
			if($loanmaster==null && $voucher===null)
		{
			$model->delete();
			Yii::app()->user->setFlash('notice','User Deleted');
			$this->redirect(array('create'));
		}
		else 
		{
		Yii::app()->user->setFlash('notice','Can/t be deleted,User is under process');
		$this->redirect(array('create'));
		}
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Usermaster');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Usermaster('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Usermaster']))
			$model->attributes=$_GET['Usermaster'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Usermaster the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Usermaster::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Usermaster $model the model to be validated
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
