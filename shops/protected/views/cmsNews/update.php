<?php
/* @var $this CmsNewsController */
/* @var $model CmsNews */

$this->breadcrumbs=array(
	'Cms News'=>array('index'),
	$model->n_id=>array('view','id'=>$model->n_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CmsNews', 'url'=>array('index')),
	array('label'=>'Create CmsNews', 'url'=>array('create')),
	array('label'=>'View CmsNews', 'url'=>array('view', 'id'=>$model->n_id)),
	array('label'=>'Manage CmsNews', 'url'=>array('admin')),
);
?>

<h1>Update CmsNews <?php echo $model->n_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>