<?php

class AccountgroupController extends Controller
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
				'actions'=>array('index','view','ajaxFillTree'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','ajaxFillTree'),
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
		$model=new Accountgroup;

		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['Accountgroup']))
		{
			$model->attributes=$_POST['Accountgroup'];
			$model->IsDefault=1;
		
			$valid=$model->save();
			$this->redirect('create');
		}
		else {
		$this->render('create',array(
			'model'=>$model,
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
		// $this->performAjaxValidation($model);

		if(isset($_POST['Accountgroup']))
		{
			$model->attributes=$_POST['Accountgroup'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->AccountGroupId));
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
		
		$this->render('_listtree');
		
	}

	
	public function actionAjaxFillTree()
	{
		// accept only AJAX request (comment this when debugging)
		if (!Yii::app()->request->isAjaxRequest) {
			exit();
		}
		// parse the user input
		$parentId = "NULL";
		if (isset($_GET['root']) && $_GET['root'] !== 'source') {
			$parentId = (int) $_GET['root'];
		}
		// read the data (this could be in a model)
		
		$account=Accountgroup::model()->findAllByAttributes(array('GroupUnder'=>0));
		
		$children=array();
		$i=0;
		foreach($account as $value)
		{
		$children[$i] = Yii::app()->db->createCommand(
				"SELECT t1.AccountName AS lev1, t2.AccountName AS lev2, t3.AccountName AS lev3, t4.AccountName AS lev4
					FROM accountgroup AS t1
					LEFT JOIN accountgroup AS t2 ON t2.GroupUnder = t1.AccountGroupId
						LEFT JOIN accountgroup AS t3 ON t3.GroupUnder = t2.AccountGroupId
						LEFT JOIN accountgroup AS t4 ON t4.GroupUnder = t3.AccountGroupId
							WHERE t1.AccountName = '$value->AccountName'
							LIMIT 0 , 30"
        )->queryAll();
		$i++;
		}
				
				//echo str_replace(
		//'"hasChildren":"0"',
		//'"hasChildren":false',
			//	CTreeView::saveDataAsJson($children)
					//	);
	
		
	
	
	}
	
	
	
	
	
	
	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Accountgroup('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Accountgroup']))
			$model->attributes=$_GET['Accountgroup'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Accountgroup the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Accountgroup::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Accountgroup $model the model to be validated
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
