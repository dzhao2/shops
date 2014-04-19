<?php

class TemplateController extends Controller
{
	public $tempList;
	public function actionIndex()
	{
		$this->actionList();
	}
	public function prepareTempList(){
		if( !isset($this->tempList) ){
			$this->tempList = array(
				'10003' => array(
					'title'=>'粉色系婚庆模板'
				),
				'10004' => array(
					'title'=>'黑色系家具模板'
				),
				'10006' => array(
					'title'=>'暖色系餐饮模板'
				)
			);
		}
	}
	public function actionList()
	{
		$this->prepareTempList();
		$this->render('list',
			array(
				'tempList' => $this->tempList
			)
		);
	}
	
	public function actionUse($id){
		$this->initTemplateConfig($id);
		$model = CmsShop::model()->findByPk(1);
		$this->render('use',array(
			'model'=>$model,
		));
	}

	public function actionPreview($id){
		$this->initTemplateConfig($id);
		$temp = $this->templateConfig;
		$model = CmsShop::model()->findByPk( Yii::app()->user->fake_shop_id );
		$menuArr = array();
		$attrArr = array();
		// 获取post上来的menus
		if(isset($_POST['menu'])){
			// 根据group_id来取数据
			for( $i = 0 ; isset($temp->menus) && $i < count($temp->menus->menu) ; $i ++){
				$curTemp = $temp->menus->menu[$i];
				$groupData = $_POST['menu'][$curTemp->group_id->__toString()];
				if( isset($groupData) ){
					$titArr = $groupData['title'];
					$picurlArr = isset($groupData['picurl'])?$groupData['picurl']:array();
					$linkurlArr = isset($groupData['linkurl'])?$groupData['linkurl']:array();
					for( $j = 0 ; $j < count($titArr) ; $j ++ ){
						$m = new CmsShopMenu;
						$m->sm_group_id = $curTemp->group_id->__toString();
						$m->sm_title = $titArr[$j];
						if( $curTemp->picurl){
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
						array_push($menuArr, $m);
					}
				}
			}
		}
		// 获取post上来的attributes
		if(isset($_POST['attribute'])){
			foreach( $_POST['attribute'] as $attrName=>$attrValue){
				$attribute = new CmsShopAttribute;
				$attribute->sa_name = $attrName;
				$attribute->sa_value = $attrValue;
				array_push( $attrArr, $attribute );
			}
		}
		
		$model->menus = $menuArr;
		$model->cmsAttributes = $attrArr;
		// 选择模板来生成界面
		$this->renderPartial('/view/'.$id.'/index',
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