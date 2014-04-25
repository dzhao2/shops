<?php
/* @var $this CmsCategoryController */
/* @var $model CmsCategory */

$this->breadcrumbs=array(
	'Cms Categories'=>array('index'),
	$model->sca_id=>array('view','id'=>$model->sca_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CmsCategory', 'url'=>array('index')),
	array('label'=>'Create CmsCategory', 'url'=>array('create')),
	array('label'=>'View CmsCategory', 'url'=>array('view', 'id'=>$model->sca_id)),
	array('label'=>'Manage CmsCategory', 'url'=>array('admin')),
);
?>

<h1>Update CmsCategory <?php echo $model->sca_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>