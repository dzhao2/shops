<?php
/* @var $this CmsNewsController */
/* @var $model CmsNews */

$this->breadcrumbs=array(
	'Cms News'=>array('index'),
	$model->n_id,
);

$this->menu=array(
	array('label'=>'添加资讯', 'url'=>array('create')),
	array('label'=>'编辑资讯', 'url'=>array('update', 'id'=>$model->n_id)),
	array('label'=>'删除资讯', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->n_id),'confirm'=>'您确定要删除该咨询么？')),
	array('label'=>'管理资讯', 'url'=>array('admin')),
);
?>

<h1>资讯内容查看 #<?php echo $model->n_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'n_id',
		'n_shop_id',
		'n_title',
		'n_createdate',
		'n_updatedate',
		'n_author',
		'n_category_id',
		'n_summary',
	),
)); ?>
<br/>
<p><b>资讯图片</b></p>
<img src="<?php echo CHtml::encode($model->n_picurl);?>"/><br/>
<br/>
<p><b>资讯正文</b></p>
<div>
<?php echo $model->n_content; ?>
</div>
