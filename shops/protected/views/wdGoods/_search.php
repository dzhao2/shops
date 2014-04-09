<?php
/* @var $this WdGoodsController */
/* @var $model WdGoods */
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
		<?php echo $form->textField($model,'g_title',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'g_default_pic'); ?>
		<?php echo $form->textField($model,'g_default_pic'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->