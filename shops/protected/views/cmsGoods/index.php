<?php
/* @var $this CmsGoodsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cms Goods',
);

$this->menu=array(
	array('label'=>'Create CmsGoods', 'url'=>array('create')),
	array('label'=>'Manage CmsGoods', 'url'=>array('admin')),
);
?>

<h1>Cms Goods</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
