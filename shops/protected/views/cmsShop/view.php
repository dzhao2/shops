<?php
/* @var $this CmsShopController */
/* @var $model CmsShop */

$this->breadcrumbs=array(
	'Cms Shops'=>array('index'),
	$model->sh_id,
);

$this->menu=array(
	array('label'=>'List CmsShop', 'url'=>array('index')),
	array('label'=>'Create CmsShop', 'url'=>array('create')),
	array('label'=>'Update CmsShop', 'url'=>array('update', 'id'=>$model->sh_id)),
	array('label'=>'Delete CmsShop', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->sh_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CmsShop', 'url'=>array('admin')),
);
?>

<h1>View CmsShop #<?php echo $model->sh_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'sh_id',
		'sh_title',
		'sh_weixin',
		'sh_tempid',
	),
)); ?>
