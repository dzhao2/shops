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

	<p class="note">带 <span class="required">*</span> 的为必填项。</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'n_title'); ?>
		<?php echo $form->textField($model,'n_title',array('size'=>60,'maxlength'=>280)); ?>
		<?php echo $form->error($model,'n_title'); ?>
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
		<label for="CmsNews_n_category_id">类别</label>
		
<!-- 类别选择 -->

<?php 
	function cateChildrenArray($cate, $deep=0){
		$maxDeep = 5;
		do{
			if( $deep >= $maxDeep  ) break;
			if( count($cate->childrenCategory)==0 ) break;
			$arr = array();
			for( $i = 0 ; $i < count($cate->childrenCategory) ; $i ++ ){
				$arr[$cate->childrenCategory[$i]->sca_id] =
				cateChildrenArray($cate->childrenCategory[$i], $deep+1);
			}
			return $arr;
		}while(false);
		return $cate->sca_title;
	}
	$cates = array();
	for( $i = 0 ; $i < count( $shop->categories ) ; $i ++ ){
		$cate = $shop->categories[$i];
		if($cate->sca_type == 1 ) continue;
		if( count( $cate->childrenCategory ) > 0 )
			$cates[$cate->sca_title] = cateChildrenArray($cate);
		else
			$cates[$cate->sca_id] = cateChildrenArray($cate);
	}
?>
<div>
类别选择：<?php echo CHtml::dropDownList('CmsNews[n_category_id]', '1', $cates); ?>
</div>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'n_summary'); ?>
		<?php echo $form->textArea($model,'n_summary',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'n_summary'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'n_content'); ?>
		<?php echo $form->textArea($model,'n_content',array('rows'=>15, 'cols'=>50)); ?>
		<?php echo $form->error($model,'n_content'); ?>
	</div>
	<link rel="stylesheet" href="kindeditor/themes/default/default.css" />
	<script charset="utf-8" src="kindeditor/kindeditor-min.js"></script>
	<script charset="utf-8" src="kindeditor/lang/zh_CN.js"></script>
	<script>
		var editor;
		KindEditor.ready(function(K) {
			editor = K.create('textarea[id="CmsNews_n_content"]', {
				allowFileManager : true
			});
		});
	</script>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? '创建' : '保存'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->