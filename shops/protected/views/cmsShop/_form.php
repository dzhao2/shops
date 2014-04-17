<?php
/* @var $this CmsShopController */
/* @var $model CmsShop */
/* @var $form CActiveForm */
function printMenuForm($menuConfig){
	$groupId = $menuConfig->group_id;
?>
<h5>编辑<?php echo $menuConfig->title?></h5>
<table id="menuTable_<?php echo $groupId; ?>">
	<tr>
		<th>标题</th><?php
		if( $menuConfig->linkurl == 'true' ){
		?><th>链接</th><?php
		} 
		if( $menuConfig->picurl == 'true' ){
		?><th>图片</th><?php 
		}
		?><th>操作</th>
	</tr>
</table>
<script>
$(document).ready(function(){
	var rowId = 0, tableId = "menuTable_<?php echo $groupId; ?>", rowIdPrefix = "menuRow_<?php echo $groupId; ?>_",addRowFunc = 'addMenuRow<?php echo $groupId; ?>', deleteRowFunc = 'deleteMenuRow<?php echo $groupId; ?>', 
	titleCell = '<td><input type="text" name="menu[<?php echo $groupId; ?>][title][]"/></td>',
	linkurlCell = '<?php
if( $menuConfig->linkurl == 'true' ){
	?><td><input type="text" name="menu[<?php echo $groupId; ?>][linkurl][]"/></td><?php
}?>',
	picurlCell = '<?php
if( $menuConfig->picurl == 'true' ){
	?><td><input type="text" name="menu[<?php echo $groupId; ?>][picurl][]"/></td><?php
} ?>';
	window[addRowFunc] =
	function (){
		rowId++;
		$('<tr id="'+rowIdPrefix+rowId+'">'+titleCell+linkurlCell+picurlCell+'<td><button onclick="'+deleteRowFunc+'('+rowId+');return false;">删除</button> <button onclick="'+addRowFunc+'();return false;">添加</button></td></tr>').insertAfter($('#' + tableId +' tr:last-child'));
	};
	window[deleteRowFunc] = 
	function(id){
		$('#'+rowIdPrefix+id).remove();
		if( $('#'+tableId+' tr').length == 1 )
			window[addRowFunc]();
	}
	window[addRowFunc]();
});
</script>
<?php
}
function printSlideForm($slideConfig){
	$slideGroupId = $slideConfig->group_id;
?>

<h5>编辑<?php echo $slideConfig->title; ?></h5>
<table id="slideTable_<?php echo $slideGroupId; ?>">
	<tr>
		<th>幻灯片标题</th><?php
		if( $slideConfig->linkurl == 'true' ){
		?><th>幻灯片链接</th><?php
		} 
		if( $slideConfig->picurl == 'true' ){
		?><th>幻灯图片</th><?php
		}
		?><th>操作</th>
	</tr>
</table>
<script>
$(document).ready(function(){
	var rowId = 0, tableId = "slideTable_<?php echo $slideGroupId; ?>", rowIdPrefix = "slideRow_<?php echo $slideGroupId; ?>_",addRowFunc = 'addSlideRow<?php echo $slideGroupId; ?>', deleteRowFunc = 'deleteSlideRow<?php echo $slideGroupId; ?>', 
	titleCell = '<td><input type="text" name="slide[<?php echo $slideGroupId; ?>][title][]"/></td>',
	linkurlCell = '<?php
if( $slideConfig->linkurl == 'true' ){
	?><td><input type="text" name="slide[<?php echo $slideGroupId; ?>][linkurl][]"/></td><?php
}?>',
	picurlCell = '<?php
if( $slideConfig->picurl == 'true' ){
	?><td><input type="text" name="slide[<?php echo $slideGroupId; ?>][picurl][]"/></td><?php
} ?>';
	window[addRowFunc] =
	function (){
		rowId++;
		$('<tr id="'+rowIdPrefix+rowId+'">'+titleCell+linkurlCell+picurlCell+'<td><button onclick="'+deleteRowFunc+'('+rowId+');return false;">删除</button> <button onclick="'+addRowFunc+'();return false;">添加</button></td></tr>').insertAfter($('#' + tableId +' tr:last-child'));
	};
	window[deleteRowFunc] = 
	function(id){
		$('#'+rowIdPrefix+id).remove();
		if( $('#'+tableId+' tr').length == 1 )
			window[addRowFunc]();
	}
	window[addRowFunc]();
});
</script>
<?php
}
function printAttributeForm($attrConfig){
?>
<div class="row">
	<?php echo $attrConfig->title;?>：<input name="attribute[<?php echo $attrConfig->name?>]" type="text" />
</div>
<?php
}
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cms-shop-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">带 <span class="required">*</span> 号的为必填项</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'sh_title'); ?>
		<?php echo $form->textField($model,'sh_title',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'sh_title'); ?>
	</div>
<?php 
	$temp = $this->templateConfig;
	/* 1. 菜单编辑 */
	// 1.1 如果有菜单 
	// 1.2 显示初始菜单个数
	// 1.3 根据配置，显示菜单配置项(是否有标题，链接地址，是否有图片等）
	// 1.4 后面跟添加删除按钮
	for( $i = 0 ; isset($temp->menus) && $i < count($temp->menus->menu) ; $i ++){
		printMenuForm( $temp->menus->menu[$i] );
	}
	
	/* 2. 幻灯片编辑 */
	for( $i = 0 ; isset($temp->slides) && $i < count($temp->slides->slide) ; $i ++){
		printSlideForm( $temp->slides->slide[$i] );
	}
	/* 3. 其他属性编辑 */
	// 3.1 属性名及其输入框
	for( $i=0 ; isset($temp->attributes) && $i < count($temp->attributes->attribute) ; $i ++ ){
		printAttributeForm( $temp->attributes->attribute[$i]);
	}
?>

	<div class="row buttons">
		<input type="button" onclick="save()" value="保存"/>
		<input type="button" onclick="preview()" value="预览"/>
	</div>
<script>
$(document).ready(function(){
	window.save = function(){
		$form = $('#cms-shop-form');
		$form.attr('action','?r=cmsShop/update');
		$form.attr('target','');
		$form.submit();
	};
	window.preview = function(){
		$form = $('#cms-shop-form');
		$form.attr('action','?r=template/preview&id=<?php echo$temp->id; ?>');
		$form.attr('target','_blank');
		$form.submit();
	};
});
</script>
<?php $this->endWidget(); ?>

</div><!-- form -->