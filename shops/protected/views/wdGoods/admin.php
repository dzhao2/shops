<?php
/* @var $this WdGoodsController */
/* @var $model WdGoods */

$this->menu=array(
	array('label'=>'添加商品', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#wd-goods-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<h1>店铺商品管理</h1>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'wd-goods-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'g_id',
		'g_title',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
