<?php
/* @var $this CmsShopController */
/* @var $model CmsShop */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'sh_id'); ?>
		<?php echo $form->textField($model,'sh_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sh_title'); ?>
		<?php echo $form->textField($model,'sh_title',array('size'=>60,'maxlength'=>80)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sh_weixin'); ?>
		<?php echo $form->textField($model,'sh_weixin',array('size'=>60,'maxlength'=>80)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sh_tempid'); ?>
		<?php echo $form->textField($model,'sh_tempid',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->