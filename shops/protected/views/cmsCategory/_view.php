<?php
/* @var $this CmsCategoryController */
/* @var $data CmsCategory */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('sca_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->sca_id), array('view', 'id'=>$data->sca_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sca_shop_id')); ?>:</b>
	<?php echo CHtml::encode($data->sca_shop_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sca_parent_id')); ?>:</b>
	<?php echo CHtml::encode($data->sca_parent_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sca_type')); ?>:</b>
	<?php echo CHtml::encode($data->sca_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sca_title')); ?>:</b>
	<?php echo CHtml::encode($data->sca_title); ?>
	<br />


</div>