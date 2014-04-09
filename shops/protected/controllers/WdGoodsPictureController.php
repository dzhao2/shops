<?php

class WdGoodsPictureController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
	private $ext_arr = array('gif', 'jpg', 'jpeg', 'png', 'bmp');

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			//'postOnly + delete', // we only allow deletion via POST request
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
				'actions'=>array('create','delete','update'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	private function validUploadFile($file){
		/*$file_name = $_FILES['imgFile']['name'];
		$tmp_name = $_FILES['imgFile']['tmp_name']; //服务器上临时文件名
		$file_size = $_FILES['imgFile']['size']; //文件大小
		$temp_arr = explode(".", $file_name);	//获得文件扩展名
		$file_ext = array_pop($temp_arr);
		$file_ext = trim($file_ext);
		$file_ext = strtolower($file_ext);*/
		//检查扩展名
		if ( in_array($file->getExtensionName(), $this->ext_arr) === false ) {
			return 1;
		}
		//return 0;
	}
	
	private function deleteFile($id, $suffix){		
		$dir = Yii::app()->params['shop_images_dir'];
		$file_path = $dir . '\\img' . $id . '.' . $suffix;
		if( file_exists( $file_path ) ){
			unlink( $file_path );
		}
	}
	
	private function saveFile($id, $suffix, $file){
		$dir = Yii::app()->params['shop_images_dir'];
		$file_path = $dir . '\\img' . $id . '.' . $suffix;
		$file->saveAs($file_path);
	}
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new WdGoodsPicture;
		$file = CUploadedFile::getInstanceByName('imgFile');
		$fileCheckResult = self::validUploadFile($file);
		if ($fileCheckResult == 1) {
			$msg = "上传文件扩展名是不允许的扩展名。\n只允许" . implode(",", $this->ext_arr) . "格式。";
			header('Content-type: text/html; charset=UTF-8');
			$json = new Services_JSON();
			echo $json->encode(array('error' => 1, 'message' => $msg));
			return;
		}
		// Save image
		$model->gp_date = date('Y-m-d H:i:s',time());
		$model->gp_pic = $file->getExtensionName();
		if( isset($_GET['goods_id']) )
			$model->gp_goods_id = $_GET['goods_id'];
		if( !$model->save() ){
			$msg = "数据库错误。".$model->gp_date;
			header('Content-type: text/html; charset=UTF-8');
			$json = new Services_JSON();
			echo $json->encode(array('error' => 1, 'message' => $msg));
			return;
		}
		
		self::saveFile($model->gp_id, $model->gp_pic, $file);
		header('Content-type: text/html; charset=UTF-8');
		$json = new Services_JSON();
		echo $json->encode(array('error' => 0, 'url' => '/shops/images/upload/img'.$model->gp_id.'.'.$model->gp_pic, 'title'=>$model->gp_id));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		if( $model->gp_id != $id ) return;
		$file = CUploadedFile::getInstanceByName('imgFile');
		$fileCheckResult = self::validUploadFile($file);
		if ($fileCheckResult == 1) {
			$msg = "上传文件扩展名是不允许的扩展名。\n只允许" . implode(",", $this->ext_arr) . "格式。";
			header('Content-type: text/html; charset=UTF-8');
			$json = new Services_JSON();
			echo $json->encode(array('error' => 1, 'message' => $msg));
			return;
		}
		// 后缀不同，删除原图，存储新图，存储数据
		// 后缀相同，存储新图
		if( $model->gp_pic != $file->getExtensionName() ){
			self::deleteFile( $model->gp_id, $model->gp_pic);
			$model->gp_pic = $file->getExtensionName();
			$model->update();
		}
		self::saveFile($model->gp_id, $model->gp_pic, $file);
		header('Content-type: text/html; charset=UTF-8');
		$json = new Services_JSON();
		echo $json->encode(array('error' => 0, 'url' => '/shops/images/upload/img'.$model->gp_id.'.'.$model->gp_pic, 'title'=>$model->gp_id));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$model = $this->loadModel($id);
		if( $model ->delete() ){
			//删除文件
			self::deleteFile( $model->gp_id, $model->gp_pic );
		}
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return WdGoodsPicture the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=WdGoodsPicture::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param WdGoodsPicture $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='wd-goods-picture-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
