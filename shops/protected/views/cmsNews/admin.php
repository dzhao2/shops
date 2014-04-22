<?php
/* @var $this CmsNewsController */
/* @var $model CmsNews */

$this->menu=array(
	array('label'=>'List CmsNews', 'url'=>array('index')),
	array('label'=>'Create CmsNews', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#cms-news-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<!-- 二级菜单 -->
<div>
<label>类别1</label> | <label>类别2</label> | <label>类别3</label>
</div>


<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'cms-news-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'n_id',
		'n_shop_id',
		'n_title',
		'n_createdate',
		'n_updatedate',
		'n_author',
		/*
		'n_picurl',
		'n_content',
		'n_category_id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
