<?php
/* @var $this CmsShopController */
/* @var $data CmsShop */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('sh_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->sh_id), array('view', 'id'=>$data->sh_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sh_title')); ?>:</b>
	<?php echo CHtml::encode($data->sh_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sh_weixin')); ?>:</b>
	<?php echo CHtml::encode($data->sh_weixin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sh_tempid')); ?>:</b>
	<?php echo CHtml::encode($data->sh_tempid); ?>
	<br />


</div>