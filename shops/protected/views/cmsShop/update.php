<?php
/* @var $this CmsShopController */
/* @var $model CmsShop */

$this->breadcrumbs=array(
	'Cms Shops'=>array('index'),
	$model->sh_id=>array('view','id'=>$model->sh_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CmsShop', 'url'=>array('index')),
	array('label'=>'Create CmsShop', 'url'=>array('create')),
	array('label'=>'View CmsShop', 'url'=>array('view', 'id'=>$model->sh_id)),
	array('label'=>'Manage CmsShop', 'url'=>array('admin')),
);
?>

<h1>编辑网站信息</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>