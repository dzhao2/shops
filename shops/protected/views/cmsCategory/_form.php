<?php
/* @var $this CmsCategoryController */
/* @var $model CmsCategory */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cms-category-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">带<span class="required">*</span>的为必填项。</p>
	<p><span class="required">* 注意： 该修改将直接生效于网站界面。</span></p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php 
		$cates = array('0'=>'无');
		$shopCats = CmsCategory::model()->shopAllCategories(Yii::app()->user->shop_id);
		for( $i = 0 ; $i < count( $shopCats ) ; $i ++ ){
			$shopCat = $shopCats[$i];
			if( $shopCat->sca_id == $model->sca_id ) continue;
			$cates[ $shopCat->sca_id ] = $shopCat->sca_title.'['.($shopCat->sca_type==1?'商品':'资讯').']';
		}
		echo $form->labelEx($model,'sca_parent_id'); 
		echo CHtml::dropDownList('CmsCategory[sca_parent_id]', $model->sca_parent_id, $cates); 
		echo $form->error($model,'sca_parent_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sca_type'); ?>
		<?php echo CHtml::dropDownList('CmsCategory[sca_type]', $model->sca_type, array('资讯','商品')); ?>
		<?php echo $form->error($model,'sca_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sca_title'); ?>
		<?php echo $form->textField($model,'sca_title',array('size'=>60,'maxlength'=>140)); ?>
		<?php echo $form->error($model,'sca_title'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? '创建' : '保存'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->