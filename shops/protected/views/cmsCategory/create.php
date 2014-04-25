<?php
/* @var $this CmsCategoryController */
/* @var $model CmsCategory */

$this->menu=array(
	array('label'=>'类别列表', 'url'=>array('admin')),
);
?>

<h1>创建类别</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>