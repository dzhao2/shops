<?php
/* @var $this CmsGoodsController */
/* @var $model CmsGoods */

$this->breadcrumbs=array(
	'Cms Goods'=>array('index'),
	$model->g_id,
);

$this->menu=array(
	array('label'=>'创建商品', 'url'=>array('create')),
	array('label'=>'编辑商品', 'url'=>array('update', 'id'=>$model->g_id)),
	array('label'=>'删除商品', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->g_id),'confirm'=>'您确定要删除该商品？')),
	array('label'=>'管理商品', 'url'=>array('admin')),
);
?>

<h1>商品信息查看 #<?php echo $model->g_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'g_id',
		'g_shop_id',
		'g_title',
		'g_price',
		// 'g_picurl',
		'g_createdate',
		'g_updatedate',
		// 'g_detail',
		'g_category_id',
		'g_count',
	),
)); ?>
<br/><p><b>商品图片</b></p>
<img src="<?php echo CHtml::encode($model->g_picurl); ?>"/><br/>
<br/><p><b>商品详情</b></p>
<div>
<?php echo $model->g_detail; ?>
</div>