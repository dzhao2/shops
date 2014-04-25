<?php
/* @var $this CmsGoodsController */
/* @var $model CmsGoods */

$this->breadcrumbs=array(
	'Cms Goods'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'管理商品', 'url'=>array('admin')),
);
?>

<h1>创建商品</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>