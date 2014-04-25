<?php
/* @var $this CmsGoodsController */
/* @var $model CmsGoods */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cms-goods-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">带 <span class="required">*</span> 的为必填项。</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'g_title'); ?>
		<?php echo $form->textField($model,'g_title',array('size'=>60,'maxlength'=>280)); ?>
		<?php echo $form->error($model,'g_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'g_price'); ?>
		<?php echo $form->textField($model,'g_price'); ?>
		<?php echo $form->error($model,'g_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'g_picurl'); ?>
		<?php echo $form->textField($model,'g_picurl',array('size'=>60,'maxlength'=>140)); ?>
		<?php echo $form->error($model,'g_picurl'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'g_count'); ?>
		<?php echo $form->textField($model,'g_count'); ?>
		<?php echo $form->error($model,'g_count'); ?>
	</div>

	<div class="row">
		<label for="CmsNews_n_category_id">类别</label>
		商品子类别xx
		<input type="hidden" name="CmsGoods[g_category_id]" value="3"/>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'g_detail'); ?>
		<?php echo $form->textArea($model,'g_detail',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'g_detail'); ?>
	</div>

	<link rel="stylesheet" href="kindeditor/themes/default/default.css" />
	<script charset="utf-8" src="kindeditor/kindeditor-min.js"></script>
	<script charset="utf-8" src="kindeditor/lang/zh_CN.js"></script>
	<script>
		var editor;
		KindEditor.ready(function(K) {
			editor = K.create('textarea[id="CmsGoods_g_detail"]', {
				allowFileManager : true
			});
		});
	</script>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? '创建' : '保存'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->