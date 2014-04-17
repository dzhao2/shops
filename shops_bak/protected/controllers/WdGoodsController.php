<?php

class WdGoodsController extends Controller
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
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('view','create','update', 'admin','delete'),
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
		$model=new WdGoods;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		do{
			// 验证参数
			if( !isset($_POST['WdGoods']) || !isset($_POST['WdGoods']['g_title']) ) break;
			if( !isset($_POST['goods_type_title']) ) break;
			if( !isset($_POST['goods_type_price']) ) break;
			if( !isset($_POST['goods_picture']) ) break;
			// 存储事务
			// try{
				$transaction = Yii::app()->db->beginTransaction();
				$model->attributes=$_POST['WdGoods'];
				if( ! $model->save() ) {
					$transaction->rollback();
					break;
				}
				// save title
				$type_title_len = count( $_POST['goods_type_title'] );
				$type_price_len = count( $_POST['goods_type_price'] );
				for( $i = 0 ; $i < $type_title_len && $i < $type_price_len; $i++){
					$goodsType = new WdGoodsType;
					$goodsType->gt_title = $_POST['goods_type_title'][$i];
					$goodsType->gt_price = $_POST['goods_type_price'][$i];
					$goodsType->gt_goods_id = $model->g_id;
					if($goodsType->save()){
					if( $model->g_default_type <= 0 ){
						$model->g_default_type = $goodsType->gt_id;
						$model->update();
					}
					}
				}
				$picture_len = count( $_POST['goods_picture']);
				for( $i = 0 ; $i < $picture_len ; $i ++ ){
					$goodsPicture = WdGoodsPicture::model()->findByPk($_POST['goods_picture'][$i]);
					if( !isset($goodsPicture->gp_goods_id) || $goodsPicture->gp_goods_id <= 0 )
					{ 
						$goodsPicture->gp_goods_id = $model->g_id;
						$goodsPicture->update();
						if( $model->g_default_pic <= 0 ){
							$model->g_default_pic = $goodsPicture->gp_id;
							$model->update();
						}
					}
				}
				$transaction->commit();
				$this->redirect(array('view','id'=>$model->g_id));
			// }catch(Exception $e){
				// $transaction->rollback();
			// }
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
		// if( !isset($_POST['
		if(isset($_POST['WdGoods']))
		{
			// 检查并存储goods
			if( $model->g_title != $_POST['WdGoods']['g_title'] ){
				$model->g_title = $_POST['WdGoods']['g_title'];
				$model->save();
			}
			// 检查并存储types
			if( isset( $_POST['goods_type_title'] ) ){
				$types = $model->types;
				for( $i = 0 ; $i < count($types) && $i < count($_POST['goods_type_title']) && $i < count($_POST['goods_type_price']) ; $i ++ ){
					if( $types[$i]->gt_price != $_POST['goods_type_price'][$i] || $types[$i]->gt_title != $_POST['goods_type_title'][$i] ) {
						$types[$i]->gt_price = $_POST['goods_type_price'][$i];
						$types[$i]->gt_title = $_POST['goods_type_title'][$i];
						$types[$i]->save();
					}
				}
				if( count($types) > count($_POST['goods_type_title']) ){
					for( $i = count($_POST['goods_type_title']); $i < count($types) ; $i ++ ){
						$types[$i]->delete();
					}
				} else if( count($types) < count($_POST['goods_type_title']) ){
					for( $i = count($types) ; $i < count($_POST['goods_type_title']); $i ++ ){
						$goodsType = new WdGoodsType;
						$goodsType->gt_title = $_POST['goods_type_title'][$i];
						$goodsType->gt_price = $_POST['goods_type_price'][$i];
						$goodsType->gt_goods_id = $model->g_id;
						$goodsType->save();
					}
				}
				
			}
			$this->redirect(array('view','id'=>$model->g_id));
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
		$model = $this->loadModel($id);

		try{
			$connection=Yii::app()->db;
			$transaction = Yii::app()->db->beginTransaction();
			// 删除pictures(1.删文件，2.删数据)
			for( $i = 0 ; $i < count( $model->pictures ); $i ++ ){
				$dir = Yii::app()->params['shop_images_dir'];
				$file_path = $dir . '\\img' . $model->pictures[$i]->gp_id . '.' . $model->pictures[$i]->gp_pic;
				if( file_exists( $file_path ) ){
					unlink( $file_path );
				}
			}
			$connection->createCommand('delete from wd_goods_picture where gp_goods_id='.$model->g_id)->execute();
			// 删除types
			$connection->createCommand('delete from wd_goods_type where gt_goods_id='.$model->g_id)->execute();
			// 删除goods
			$model->delete();
			$transaction->commit();
		}catch(Exception $e){
			$transaction->rollback();
		}
		$transaction = Yii::app()->db->beginTransaction();
		
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('WdGoods');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new WdGoods('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['WdGoods']))
			$model->attributes=$_GET['WdGoods'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return WdGoods the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=WdGoods::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param WdGoods $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='wd-goods-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
