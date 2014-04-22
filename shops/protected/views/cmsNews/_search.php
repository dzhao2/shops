<?php
/* @var $this CmsNewsController */
/* @var $model CmsNews */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'n_id'); ?>
		<?php echo $form->textField($model,'n_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'n_shop_id'); ?>
		<?php echo $form->textField($model,'n_shop_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'n_title'); ?>
		<?php echo $form->textField($model,'n_title',array('size'=>60,'maxlength'=>280)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'n_createdate'); ?>
		<?php echo $form->textField($model,'n_createdate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'n_updatedate'); ?>
		<?php echo $form->textField($model,'n_updatedate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'n_author'); ?>
		<?php echo $form->textField($model,'n_author',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'n_picurl'); ?>
		<?php echo $form->textField($model,'n_picurl',array('size'=>60,'maxlength'=>140)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'n_content'); ?>
		<?php echo $form->textArea($model,'n_content',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'n_category_id'); ?>
		<?php echo $form->textField($model,'n_category_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->