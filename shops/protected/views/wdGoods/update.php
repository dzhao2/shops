<?php
/* @var $this WdGoodsController */
/* @var $model WdGoods */

$this->breadcrumbs=array(
	'Wd Goods'=>array('index'),
	$model->g_id=>array('view','id'=>$model->g_id),
	'Update',
);

$this->menu=array(
	array('label'=>'创建商品', 'url'=>array('create')),
	array('label'=>'查看商品', 'url'=>array('view', 'id'=>$model->g_id)),
	array('label'=>'商品列表', 'url'=>array('admin')),
);
?>

<h1>编辑商品 (ID：<?php echo $model->g_id; ?>)</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>