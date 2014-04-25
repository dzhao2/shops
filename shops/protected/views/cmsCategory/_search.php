<?php
/* @var $this CmsCategoryController */
/* @var $model CmsCategory */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'sca_id'); ?>
		<?php echo $form->textField($model,'sca_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sca_shop_id'); ?>
		<?php echo $form->textField($model,'sca_shop_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sca_parent_id'); ?>
		<?php echo $form->textField($model,'sca_parent_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sca_type'); ?>
		<?php echo $form->textField($model,'sca_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sca_title'); ?>
		<?php echo $form->textField($model,'sca_title',array('size'=>60,'maxlength'=>140)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->