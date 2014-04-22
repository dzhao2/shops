<?php
/* @var $this CmsNewsController */
/* @var $model CmsNews */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cms-news-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'n_shop_id'); ?>
		<?php echo $form->textField($model,'n_shop_id'); ?>
		<?php echo $form->error($model,'n_shop_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'n_title'); ?>
		<?php echo $form->textField($model,'n_title',array('size'=>60,'maxlength'=>280)); ?>
		<?php echo $form->error($model,'n_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'n_createdate'); ?>
		<?php echo $form->textField($model,'n_createdate'); ?>
		<?php echo $form->error($model,'n_createdate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'n_updatedate'); ?>
		<?php echo $form->textField($model,'n_updatedate'); ?>
		<?php echo $form->error($model,'n_updatedate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'n_author'); ?>
		<?php echo $form->textField($model,'n_author',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'n_author'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'n_picurl'); ?>
		<?php echo $form->textField($model,'n_picurl',array('size'=>60,'maxlength'=>140)); ?>
		<?php echo $form->error($model,'n_picurl'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'n_content'); ?>
		<?php echo $form->textArea($model,'n_content',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'n_content'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'n_category_id'); ?>
		<?php echo $form->textField($model,'n_category_id'); ?>
		<?php echo $form->error($model,'n_category_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->