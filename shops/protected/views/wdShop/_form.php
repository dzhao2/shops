<?php
/* @var $this WdShopController */
/* @var $model WdShop */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'wd-shop-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">带<span class="required">*</span>的为必填项。</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'sh_title'); ?>
		<?php echo $form->textField($model,'sh_title',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'sh_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sh_weixin'); ?>
		<?php echo $form->textField($model,'sh_weixin',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'sh_weixin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sh_desc'); ?>
		<?php echo $form->textField($model,'sh_desc',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'sh_desc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sh_recm_1'); ?>
		<?php echo $form->textField($model,'sh_recm_1'); ?>
		<?php echo $form->error($model,'sh_recm_1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sh_recm_2'); ?>
		<?php echo $form->textField($model,'sh_recm_2'); ?>
		<?php echo $form->error($model,'sh_recm_2'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : '保存'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->