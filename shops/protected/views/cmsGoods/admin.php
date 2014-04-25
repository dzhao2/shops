<?php
/* @var $this CmsGoodsController */
/* @var $model CmsGoods */

$this->menu=array(
	array('label'=>'添加商品', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#cms-goods-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php 
	function cateChildrenArray($cate, $deep=0){
		$maxDeep = 5;
		do{
			if( $deep >= $maxDeep  ) break;
			if( count($cate->childrenCategory)==0 ) break;
			$arr = array();
			for( $i = 0 ; $i < count($cate->childrenCategory) ; $i ++ ){
				$arr[$cate->childrenCategory[$i]->sca_id] =
				cateChildrenArray($cate->childrenCategory[$i], $deep+1);
			}
			return $arr;
		}while(false);
		return $cate->sca_title;
	}
	$cates = array();
	for( $i = 0 ; $i < count( $shop->categories ) ; $i ++ ){
		$cate = $shop->categories[$i];
		if($cate->sca_type == 0 ) continue;
		if( count( $cate->childrenCategory ) > 0 )
			$cates[$cate->sca_title] = cateChildrenArray($cate);
		else
			$cates[$cate->sca_id] = cateChildrenArray($cate);
	}
?>
<h1>商品管理</h1>

<!-- 类别选择 -->
<div>
类别选择：<?php echo CHtml::dropDownList('categories', '1', $cates); ?>
</div>

<?php echo CHtml::link('高级搜索','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'cms-goods-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'g_id',
		'g_title',
		'g_price',
		'g_createdate',
		'g_updatedate',
		/*
		'g_detail',
		'g_category_id',
		'g_count',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
