<?php
/* @var $this CmsGoodsController */
/* @var $model CmsGoods */

$this->breadcrumbs=array(
	'Cms Goods'=>array('index'),
	$model->g_id=>array('view','id'=>$model->g_id),
	'Update',
);

$this->menu=array(
	array('label'=>'创建商品', 'url'=>array('create')),
	array('label'=>'查看商品', 'url'=>array('view', 'id'=>$model->g_id)),
	array('label'=>'管理商品', 'url'=>array('admin')),
);
?>

<h1>编辑页面<?php echo $model->g_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>