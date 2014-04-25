<?php
/* @var $this CmsGoodsController */
/* @var $model CmsGoods */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'g_id'); ?>
		<?php echo $form->textField($model,'g_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'g_title'); ?>
		<?php echo $form->textField($model,'g_title',array('size'=>60,'maxlength'=>280)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'g_price'); ?>
		<?php echo $form->textField($model,'g_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'g_picurl'); ?>
		<?php echo $form->textField($model,'g_picurl',array('size'=>60,'maxlength'=>140)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'g_createdate'); ?>
		<?php echo $form->textField($model,'g_createdate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'g_updatedate'); ?>
		<?php echo $form->textField($model,'g_updatedate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'g_detail'); ?>
		<?php echo $form->textArea($model,'g_detail',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'g_category_id'); ?>
		<?php echo $form->textField($model,'g_category_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'g_count'); ?>
		<?php echo $form->textField($model,'g_count'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('搜索'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->