<?php
/* @var $this CmsGoodsController */
/* @var $data CmsGoods */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('g_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->g_id), array('view', 'id'=>$data->g_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('g_shop_id')); ?>:</b>
	<?php echo CHtml::encode($data->g_shop_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('g_title')); ?>:</b>
	<?php echo CHtml::encode($data->g_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('g_price')); ?>:</b>
	<?php echo CHtml::encode($data->g_price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('g_picurl')); ?>:</b>
	<?php echo CHtml::encode($data->g_picurl); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('g_createdate')); ?>:</b>
	<?php echo CHtml::encode($data->g_createdate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('g_updatedate')); ?>:</b>
	<?php echo CHtml::encode($data->g_updatedate); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('g_detail')); ?>:</b>
	<?php echo CHtml::encode($data->g_detail); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('g_category_id')); ?>:</b>
	<?php echo CHtml::encode($data->g_category_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('g_count')); ?>:</b>
	<?php echo CHtml::encode($data->g_count); ?>
	<br />

	*/ ?>

</div>