<?php

class FrontController extends Controller
{
	private function getGoodsList($pageNum){		
		$pageCount = 10;
		$criteria=new CDbCriteria;
		$criteria->limit = $pageCount;    //取1条数据，如果小于0，则不作处理    
		$criteria->offset = $pageNum * $pageCount;

		return WdGoods::model()->findAll($criteria); // $params is not needed 
	}
	
	public function actionIndex()
	{
		$id = 1;
		// get model of Shop
		$model = WdShop::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'您访问的微官网不存在。');
		// get goods list of the first page
		$goodsList = $this->getGoodsList(0);
		$this->renderPartial('index', array(
			'model'=>$model,
			'goodsList'=>$goodsList,
		));
	}
	
	public function actionItem($id){
		$model = WdGoods::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		$this->renderPartial('item', array(
			'model'=>$model,
		));
	}

	public function actionGoodsList(){
		$pagenum = $_GET['page'];
		$list = $this->getGoodsList( $pagenum );
		$this->renderPartial('list_xml', array(
			'goodsList'=>$list,
		));
	}
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}