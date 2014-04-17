<?php
/* @var $this CmsShopController */
/* @var $model CmsShop */

$this->breadcrumbs=array(
	'Cms Shops'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CmsShop', 'url'=>array('index')),
	array('label'=>'Manage CmsShop', 'url'=>array('admin')),
);
?>

<h1>Create CmsShop</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>