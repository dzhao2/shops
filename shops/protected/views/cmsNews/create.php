<?php
/* @var $this CmsNewsController */
/* @var $model CmsNews */

$this->breadcrumbs=array(
	'Cms News'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CmsNews', 'url'=>array('index')),
	array('label'=>'Manage CmsNews', 'url'=>array('admin')),
);
?>

<h1>Create CmsNews</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>