<?php
/* @var $this CmsNewsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cms News',
);

$this->menu=array(
	array('label'=>'Create CmsNews', 'url'=>array('create')),
	array('label'=>'Manage CmsNews', 'url'=>array('admin')),
);
?>

<h1>Cms News</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
