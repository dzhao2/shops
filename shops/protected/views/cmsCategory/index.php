<?php
/* @var $this CmsCategoryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cms Categories',
);

$this->menu=array(
	array('label'=>'Create CmsCategory', 'url'=>array('create')),
	array('label'=>'Manage CmsCategory', 'url'=>array('admin')),
);
?>

<h1>Cms Categories</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
