<?php

class ViewController extends Controller
{
	public function actionIndex($id)
	{
		// 读取网站的数据信息
		$model=CmsShop::model()->findByPk($id);
		if($model===null || $model->sh_isfake)
			throw new CHttpException(404,'The requested page does not exist.');
		// 获取网站的tempid，读取其模板信息
		// 根据模板id生成界面
		$page = 'index';
		$tid = $model->sh_tempid;
		if( isset($_GET['page']) && $_GET['page']!='index'){
			$page = $_GET['page'];
		    if( isset( $_GET['tid'] ) ){
			$tid = $_GET['tid'] ;
		    }
		}
		$page = $page . '/' . $tid;
		$this->renderPartial($page,
		array(
			'model'=>$model
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
