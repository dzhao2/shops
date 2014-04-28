<?php
/* @var $this CmsShopController */
/* @var $model CmsShop */
/* @var $form CActiveForm */
function printMenuForm($menuConfig, $menuGroup){
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
	titleCell = ['<td><input type="text" name="menu[<?php echo $groupId; ?>][title][]" value="','','"/></td>'],
	linkurlCell = [<?php
if( $menuConfig->linkurl == 'true' ){
	?>'<td><input type="text" name="menu[<?php echo $groupId; ?>][linkurl][]" value="','','"/></td>'<?php
}?>],
	picurlCell = [<?php
if( $menuConfig->picurl == 'true' ){
	?>'<td><input type="text" name="menu[<?php echo $groupId; ?>][picurl][]" value="','','"/></td>'<?php
} ?>];
	function getCellHtml(temp,value){
		if( temp && temp.length > 0 ){
			temp[1] = value;
			return temp.join('');
		}
		return '';
	}
	window[addRowFunc] =
	function (menuData){
		console.log('menuData', menuData);
		menuData = menuData || {'title':'','picurl':'','linkurl':'','desc':''}
		rowId++;
		$('<tr id="'+rowIdPrefix+rowId+'">'+getCellHtml(titleCell,menuData.title)+getCellHtml(linkurlCell,menuData.linkurl)+getCellHtml(picurlCell,menuData.picurl)+'<td><button onclick="'+deleteRowFunc+'('+rowId+');return false;">删除</button> <button onclick="'+addRowFunc+'();return false;">添加</button></td></tr>').insertAfter($('#' + tableId +' tr:last-child'));
	};
	window[deleteRowFunc] = 
	function(id){
		$('#'+rowIdPrefix+id).remove();
		if( $('#'+tableId+' tr').length == 1 )
			window[addRowFunc]();
	}
	<?php
		if( isset( $menuGroup ) && count($menuGroup) > 0 ){
		for( $i=0 ; $i < count( $menuGroup ) ; $i ++ ){
			$curmenu = $menuGroup[$i];
		?>window[addRowFunc]({
		'picurl':'<?php echo CHtml::encode($curmenu->sm_picurl); ?>',
		'title':'<?php echo CHtml::encode($curmenu->sm_title); ?>',
		'desc':'<?php echo CHtml::encode($curmenu->sm_desc); ?>',
		'linkurl':'<?php echo CHtml::encode($curmenu->sm_linkurl); ?>'
		});<?php
		}
	} 
	else 
	{ 
	?>window[addRowFunc]();<?php 
	} 
	?>
});
</script>
<?php
}
function printAttributeForm($attrConfig, $attrValue){
?>
<div class="row">
	<?php echo $attrConfig->title;?>：<input name="attribute[<?php echo $attrConfig->name?>]" type="text" value="<?php echo $attrValue; ?>" />
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
	<input type="hidden" name="CmsShop[sh_tempid]" value="<?php echo $model->sh_tempid ?>"/>
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
		$groupId = (string)$temp->menus->menu[$i]->group_id;//->__toString();
		
		$groupData = $model->getMenuGroup($groupId);
		printMenuForm( $temp->menus->menu[$i], $groupData );
	}
	
	/* 2. 其他属性编辑 */
	// 2.1 属性名及其输入框
	for( $i=0 ; isset($temp->attributes) && $i < count($temp->attributes->attribute) ; $i ++ ){
		if( $this->id == 'template' )
			$attrValue = (string)$temp->attributes->attribute[$i]->default_value;
		else
			$attrValue = $model->getCmsAttributeValue((string)$temp->attributes->attribute[$i]->name);//->__toString());
		
		printAttributeForm( $temp->attributes->attribute[$i], $attrValue);
	}
?>

	<div class="row buttons">
		<input type="button" onclick="save()" value="保存"/>
		<input type="button" onclick="preview()" value="预览"/>
		<?php if($this->id == 'cmsShop'){ ?>
		<input type="button" onclick="publish()" value="发布"/>
		<?php } ?>
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
	window.publish = function(){
		window.location = '?r=cmsShop/publish';
	}
});
</script>
<?php $this->endWidget(); ?>

</div><!-- form -->
