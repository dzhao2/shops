<?php
/* @var $this CmsNewsController */
/* @var $model CmsNews */

$this->breadcrumbs=array(
	'Cms News'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'类别列表', 'url'=>array('admin')),
);
?>

<h1>发布资讯</h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'shop'=>$shop)); ?>