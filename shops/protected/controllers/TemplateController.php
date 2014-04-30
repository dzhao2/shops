<?php

class TemplateController extends Controller
{
	public $tempList;
	public function actionIndex()
	{
		$this->actionList();
	}
	
	public function prepareTempList(){
		if( isset($this->tempList) ){
			return;
		}
		
		$dir = 'protected/data/temp_config';
		$this->tempList = array();
	    if (false != ($handle = opendir ( $dir ))) {
	        $i=0;
	        while ( false !== ($file = readdir ( $handle )) ) {
	            if ($file != "." && $file != ".."&&strpos($file,".xml")>0) {
	                $fileId = substr($file, 0,strpos($file,".xml"));
	                $this->tempList[$fileId] = simplexml_load_file('protected/data/temp_config/'.$file);
	            }
	        }
	        //关闭句柄
	        closedir ( $handle );
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
		$model = CmsShop::model()->findByPk(Yii::app()->user->fake_shop_id);
		$model->sh_tempid = $id;
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
				$groupData = $_POST['menu'][(string)$curTemp->group_id];
				if( isset($groupData) ){
					$titArr = $groupData['title'];
					$picurlArr = isset($groupData['picurl'])?$groupData['picurl']:array();
					$linkurlArr = isset($groupData['linkurl'])?$groupData['linkurl']:array();
					$iconArr = isset($groupData['icon'])?$groupData['icon']:array();
					$attr1Arr = isset($groupData['attr1'])?$groupData['attr1']:array();
					$attr2Arr = isset($groupData['attr2'])?$groupData['attr2']:array();
					$attr3Arr = isset($groupData['attr3'])?$groupData['attr3']:array();
					$attr4Arr = isset($groupData['attr4'])?$groupData['attr4']:array();
					$attr5Arr = isset($groupData['attr5'])?$groupData['attr5']:array();
					for( $j = 0 ; $j < count($titArr) ; $j ++ ){
						$m = new CmsShopMenu;
						$m->sm_group_id = (string)$curTemp->group_id;
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
						if( $curTemp->icon){
							if( isset($iconArr[$j]) ){
								$m->sm_icon= $iconArr[$j];
							} else 
								continue;
						}
						if( $curTemp->attr1){
							if( isset($attr1Arr[$j]) ){
								$m->sm_attr1= $attr1Arr[$j];
							} else 
								continue;
						}
						if( $curTemp->attr2){
							if( isset($attr2Arr[$j]) ){
								$m->sm_attr2= $attr2Arr[$j];
							} else 
								continue;
						}
						if( $curTemp->attr3){
							if( isset($attr3Arr[$j]) ){
								$m->sm_attr3= $attr3Arr[$j];
							} else 
								continue;
						}
						if( $curTemp->attr4){
							if( isset($attr4Arr[$j]) ){
								$m->sm_attr4= $attr4Arr[$j];
							} else 
								continue;
						}
						if( $curTemp->attr5){
							if( isset($attr5Arr[$j]) ){
								$m->sm_attr5= $attr5Arr[$j];
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
		$this->renderPartial('/view/index/'.$id,
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
