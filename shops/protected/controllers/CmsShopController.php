<?php

class CmsShopController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';

	/**
	 * @return array action filters
	 */
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
				'actions'=>array('create','update', 'publish'),
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
		$model=new CmsShop;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['CmsShop']))
		{
			$model->attributes=$_POST['CmsShop'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->sh_id));
		}
		$model=$this->loadModel($id);
		$this->render('create',array(
			'model'=>$model,
		));
	}
	

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate()
	{
		$id = Yii::app()->user->fake_shop_id; // The value should come from login data
		$model=$this->loadModel($id);
		$newTemplate = false;
		if( isset( $_POST['CmsShop'] ) && isset( $_POST['CmsShop']['sh_tempid']) && $model->sh_tempid != $_POST['CmsShop']['sh_tempid'] ) { 
			$model->sh_tempid = $_POST['CmsShop']['sh_tempid'];
			$newTemplate = true;
		}
		$this->initTemplateConfig( $model->sh_tempid );
		$temp = $this->templateConfig;
		// 检查是否存在更新信息
		do{
			if( !isset( $_POST['CmsShop'] ) ) break;
			// 检查title信息
			$model->sh_title=$_POST['CmsShop']['sh_title'];
			// [Pass]检查template相关信息
			if( !$model->validate() ) break;
			// 开始transaction(save shop->save menus->save attrs)
			$transaction = Yii::app()->db->beginTransaction();
			try{
			if( $newTemplate ){	// 如果换模板，则删除之前的数据
				for( $i = 0 ; $i < count( $model->menus ) ; $i ++ ){
					$model->menus[$i]->delete();
				}
				for( $i = 0 ; $i < count($model->cmsAttributes ) ; $i ++ ){
					$model->cmsAttributes[$i]->delete();
				}
				$model->menus = array();
				$model->cmsAttributes = array();
			}
			$model->save();
			// save menus
			if(isset($_POST['menu'])){
				// 根据group_id来取数据
				for( $i = 0 ; isset($temp->menus) && $i < count($temp->menus->menu) ; $i ++){
					$curTemp = $temp->menus->menu[$i];
					$groupData = $_POST['menu'][$curTemp->group_id->__toString()];
					if( isset($groupData) ){
						$titArr = $groupData['title'];
						$picurlArr = isset($groupData['picurl'])?$groupData['picurl']:array();
						$linkurlArr = isset($groupData['linkurl'])?$groupData['linkurl']:array();
						for( $j = 0 ; $j < count($model->menus) ; $j ++ ){
							$mMenu = $model->menus[$j];
							if( $mMenu->sm_group_id == $curTemp->group_id->__toString()){
								$mMenu->delete();
							}
						}
						for( $j = 0 ; $j < count($titArr) ; $j ++ ){
							$m = new CmsShopMenu;
							$m->sm_shop_id = $model->sh_id;
							$m->sm_group_id = $curTemp->group_id->__toString();
							$m->sm_title = $titArr[$j];
							$m->sm_index = $j+1;
							if( $curTemp->picurl ){
								if( isset($picurlArr[$j]) ){
									$m->sm_picurl = $picurlArr[$j];
								} else 
									continue;
							}
							if( $curTemp->linkurl){
								if( isset($linkurlArr[$j]) ){
									$m->sm_linkurl = $linkurlArr[$j];
								} else 
									continue;
							}
							$m->save();
						}
					}
				}
			}
			// save cmsAttributes
			
			// 获取post上来的attributes
			if(isset($_POST['attribute'])){
				foreach( $_POST['attribute'] as $attrName=>$attrValue){
					$attr = null;
					for( $i = 0, $len = count($model->cmsAttributes) ;
						$i < $len ; $i ++ ){
						$attrTemp = $model->cmsAttributes[$i];
						if( $attrTemp->sa_name == $attrName ){
							$attr = $attrTemp;
							break;
						}
					}
					if( $attr == null ){						
						$attr = new CmsShopAttribute;
						$attr->sa_shop_id = $model->sh_id;
					} 
					$attr->sa_name = $attrName;
					$attr->sa_value = $attrValue;
					$attr->save();
				}
			}
			$transaction->commit();
			$model = $this->loadModel($id);
			}catch( Exception $e ){
				var_dump($e);
				$transaction->rollback();
			}
		}while(false);

		$this->render('update',array(
			'model'=>$model,
		));
	}
	
	public function actionPublish(){
		$fakeShopId = Yii::app()->user->fake_shop_id; 
		$shopId = Yii::app()->user->shop_id; 
		if( !isset( $fakeShopId ) || !isset( $shopId ) ){
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
			return;
		}
		$fakeShop = $this->loadModel($fakeShopId);
		$shop = $this->loadModel($shopId);
		$transaction = Yii::app()->db->beginTransaction();
		try{
			// attribute publish
			if( $fakeShop->sh_tempid != $shop->sh_tempid ) {
				for( $i = 0 ; $i < count($shop->cmsAttributes) ; $i ++ ){
					$shop->cmsAttributes[$i]->delete();
				}
				for( $i = 0 ; $i < count( $fakeShop->cmsAttributes); $i ++){
					$fakeShop->cmsAttributes[$i]->makeCopy($shop->sh_id)->save();
				}
			} else {
				for( $i = 0 ; $i < count($fakeShop->cmsAttributes) ; $i ++ ){
					$fakeAttr = $fakeShop->cmsAttributes[$i];
					$attr = $shop->getCmsAttribute($fakeAttr->sa_name);
					if( !isset( $attr) ){
						$fakeAttr->makeCopy($shop->sh_id)->save();
					} else {
						// var_dump($attr);
						if( $attr->sa_value != $fakeAttr->sa_value ){
							$attr->sa_value = $fakeAttr->sa_value;
							$attr->save();
						}
					}
				}
			}
			// menu publish
			for( $i = 0 ; $i < count($shop->menus) ; $i ++ ){
				$shop->menus[$i]->delete();
			}
			for( $i = 0 ; $i < count( $fakeShop->menus) ; $i ++ ){
				$fakeShop->menus[$i]->makeCopy($shop->sh_id)->save();
			}
			// shop data publish
			$shop->sh_tempid = $fakeShop->sh_tempid;
			$shop->sh_title = $fakeShop->sh_title;
			$shop->save();
			$transaction->commit();
		}catch(Exception $e ) {
			$transaction->rollback();
		}
		$this->redirect(array('update'));
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
		$dataProvider=new CActiveDataProvider('CmsShop');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new CmsShop('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['CmsShop']))
			$model->attributes=$_GET['CmsShop'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return CmsShop the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=CmsShop::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CmsShop $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='cms-shop-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}