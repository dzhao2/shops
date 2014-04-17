<?php
/* @var $this CmsShopController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cms Shops',
);

$this->menu=array(
	array('label'=>'Create CmsShop', 'url'=>array('create')),
	array('label'=>'Manage CmsShop', 'url'=>array('admin')),
);
?>

<h1>Cms Shops</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
