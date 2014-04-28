<?php

class CmsNewsController extends Controller
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
		$model=new CmsNews;
		$model->n_shop_id = Yii::app()->user->shop_id;

		do
		{
			if( !isset($_POST['CmsNews']) ) break;
			$model->attributes=$_POST['CmsNews'];
			// set create date
			$model->n_createdate = date("Y-m-d H:i:s", time());
			// set update date
			$model->n_updatedate = date("Y-m-d H:i:s", time());
			// validate n_category_id
			$cate = CmsCategory::model()->findByPk( $model->n_category_id );
			
			if( !isset($cate) || count($cate->childrenCategory) > 0 || $cate->sca_type != 0 ){
				$model->addError('n_category_id','类别错误，请重新选择类别');
				break;
			} 
			if( $model->save() )
				$this->redirect(array('view','id'=>$model->n_id));
		} while(false);
	
		$shop = CmsShop::model()->findByPk(Yii::app()->user->shop_id);
		
		$this->render('create',array(
			'model'=>$model,
			'shop'=>$shop,
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

		do
		{
			if( !isset($_POST['CmsNews']) ) break;
			$model->attributes=$_POST['CmsNews'];
			// set update date
			$model->n_updatedate = date("Y-m-d H:i:s", time());
			// validate n_category_id
			$cate = CmsCategory::model()->findByPk( $model->n_category_id );
			if( !isset($cate) || count($cate->childrenCategory) > 0 || $cate->sca_type != 0 ){
				$model->addError('n_category_id','类别错误，请重新选择类别');
				break;
			} 
			// validate n_shop_id
			if( $model->n_shop_id != Yii::app()->user->shop_id ){
				$model->addError('n_shop_id','权限错误，无权修改其他网站的资讯。');
				break;
			}
			if( $model->save() )
				$this->redirect(array('view','id'=>$model->n_id));
		} while(false);
		
		$shop = CmsShop::model()->findByPk( Yii::app()->user->shop_id );
		
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
		$dataProvider=new CActiveDataProvider('CmsNews');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new CmsNews('search');
		$model->unsetAttributes();  // clear any default values
		$model->n_shop_id = Yii::app()->user->shop_id;
		if(isset($_GET['CmsNews']))
			$model->attributes=$_GET['CmsNews'];
		$shop = CmsShop::model()->findByPk(Yii::app()->user->shop_id);
		$this->render('admin',array(
			'model'=>$model,
			'shop'=>$shop,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return CmsNews the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=CmsNews::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CmsNews $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='cms-news-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
