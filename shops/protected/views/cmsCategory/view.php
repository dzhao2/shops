<?php
/* @var $this CmsCategoryController */
/* @var $model CmsCategory */

$this->breadcrumbs=array(
	'Cms Categories'=>array('index'),
	$model->sca_id,
);

$this->menu=array(
	array('label'=>'添加类别', 'url'=>array('create')),
	array('label'=>'编辑类别', 'url'=>array('update', 'id'=>$model->sca_id)),
	array('label'=>'删除类别', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->sca_id),'confirm'=>'您确定要删除该类别么？')),
	array('label'=>'类别管理', 'url'=>array('admin')),
);
?>

<h1>类别 #<?php echo $model->sca_id; ?></h1>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'sca_id',
		array('label'=>'父类别',
			'type'=>'raw',
			'value'=>($model->sca_parent_id == 0 ? '无':$model->parentCategory->sca_title)),
		array('label'=>'类别类型',
			'type'=>'raw',
			'value'=>($model->sca_type== 0 ? '资讯':'商品')),
		'sca_title',
	),
)); ?>
