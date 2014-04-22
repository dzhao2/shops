<?php
/* @var $this CmsNewsController */
/* @var $model CmsNews */

$this->breadcrumbs=array(
	'Cms News'=>array('index'),
	$model->n_id,
);

$this->menu=array(
	array('label'=>'List CmsNews', 'url'=>array('index')),
	array('label'=>'Create CmsNews', 'url'=>array('create')),
	array('label'=>'Update CmsNews', 'url'=>array('update', 'id'=>$model->n_id)),
	array('label'=>'Delete CmsNews', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->n_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CmsNews', 'url'=>array('admin')),
);
?>

<h1>View CmsNews #<?php echo $model->n_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'n_id',
		'n_shop_id',
		'n_title',
		'n_createdate',
		'n_updatedate',
		'n_author',
		'n_picurl',
		'n_content',
		'n_category_id',
	),
)); ?>
