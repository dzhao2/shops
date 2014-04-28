<?php

class CmsCategoryController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			// 'postOnly + delete', // we only allow deletion via POST request
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
				'actions'=>array('create','update','admin','delete'),
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
		$model=new CmsCategory;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		do
		{
			if( !isset($_POST['CmsCategory']) ) break;
			$model->attributes=$_POST['CmsCategory'];
			$model->sca_shop_id = Yii::app()->user->shop_id;
			$parentCat = CmsCategory::model()->findByPk($_POST['CmsCategory']['sca_parent_id']);
			if( isset($parentCat) ){
				if($parentCat->sca_type != $_POST['CmsCategory']['sca_type'] ) {
					
					 $this->addError($model,'sca_type','类别类型和父类别的类型不符。'); 
					break;
				}
			} else {
				$model->sca_parent_id = 0;
			}
			if($model->save())
				$this->redirect(array('view','id'=>$model->sca_id));
		}while(false);

		
		$this->render('create',array(
			'model'=>$model,
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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		do
		{
			if( !isset($_POST['CmsCategory']) ) break;
			$model->attributes=$_POST['CmsCategory'];
			$model->sca_shop_id = Yii::app()->user->shop_id;
			$parentCat = CmsCategory::model()->findByPk($_POST['CmsCategory']['sca_parent_id']);
			 // var_dump($parentCat );
			if( isset($parentCat) ){
				if($parentCat->sca_type != $_POST['CmsCategory']['sca_type'] ) {
					 $model->addError('sca_type','类别类型和父类别的类型不符。'); 
					break;
				}
			} else {
				$model->sca_parent_id = 0;
			}
			if($model->save())
				$this->redirect(array('view','id'=>$model->sca_id));
		}while(false);

		$shop = CmsShop::model()->findByPk(Yii::app()->user->shop_id);
		$this->render('update',array(
			'model'=>$model,
			'shop'=>$shop,
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
		$dataProvider=new CActiveDataProvider('CmsCategory');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new CmsCategory('search');
		$model->unsetAttributes();  // clear any default values
		$model->sca_shop_id = Yii::app()->user->shop_id;
		if(isset($_GET['CmsCategory']))
			$model->attributes=$_GET['CmsCategory'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return CmsCategory the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=CmsCategory::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CmsCategory $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='cms-category-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
