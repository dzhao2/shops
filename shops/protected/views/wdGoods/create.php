<?php
/* @var $this WdGoodsController */
/* @var $model WdGoods */

$this->breadcrumbs=array(
	'Wd Goods'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'商品列表', 'url'=>array('admin')),
);
?>

<h1>添加商品</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>