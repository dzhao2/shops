<?php
/* @var $this CmsNewsController */
/* @var $data CmsNews */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('n_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->n_id), array('view', 'id'=>$data->n_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('n_shop_id')); ?>:</b>
	<?php echo CHtml::encode($data->n_shop_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('n_title')); ?>:</b>
	<?php echo CHtml::encode($data->n_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('n_createdate')); ?>:</b>
	<?php echo CHtml::encode($data->n_createdate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('n_updatedate')); ?>:</b>
	<?php echo CHtml::encode($data->n_updatedate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('n_author')); ?>:</b>
	<?php echo CHtml::encode($data->n_author); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('n_picurl')); ?>:</b>
	<?php echo CHtml::encode($data->n_picurl); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('n_content')); ?>:</b>
	<?php echo CHtml::encode($data->n_content); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('n_category_id')); ?>:</b>
	<?php echo CHtml::encode($data->n_category_id); ?>
	<br />

	*/ ?>

</div>