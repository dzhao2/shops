<?php
/* @var $this WdGoodsController */
/* @var $model WdGoods */
/* @var $form CActiveForm */
$isUpdate = isset($model->g_id);
?>
<link rel="stylesheet" href="kindeditor/themes/default/default.css" />
<script charset="utf-8" src="kindeditor/kindeditor-min.js"></script>
<script charset="utf-8" src="kindeditor/lang/zh_CN.js"></script>
<script>
KindEditor.ready(function(K) {
	var editor = K.editor({
		uploadJson : '?r=wdGoodsPicture/create',
		allowFileManager : true,
		allowImageUpload : true
	});
	K('#selectImg1').click(function() {
		editor.loadPlugin('image', function() {
			editor.plugin.imageDialog({
			showRemote : false,
			clickFn : function(url, title, width, height, border, align) {
				K('#selectedImg1').attr('src',url);
				K('#selectedImg1').show();
				editor.hideDialog();
			}
			});
		});
	});
});
</script>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'wd-goods-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">带<span class="required">*</span>的为必填项。</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'g_title'); ?>
		<?php echo $form->textField($model,'g_title',array('size'=>82,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'g_title'); ?>
	</div>
	<div class="row">
	<table id="goodsTypeTable" border="1" style="width:680px;margin-left: -5px">
		<tr>
			<th style="width:380px">类型名称</th>
			<th style="width:100px">对应价格</th>
			<th style="width:200px">操作</th>
		</tr>
	</table>
	<script>
	// 类型操作
	(function(){
		var lastId = 0;
		window.addGoodsTypeRow = function (t_title, t_price){
			t_title = t_title || '';
			t_price = typeof t_price === 'number' ? t_price : '';
			lastId++;
			$('<tr id="goods_type_row_'+lastId+'"><td><input name="goods_type_title[]" type="text" style="width:320px;"  value="' + t_title +'"/></td><td><input name="goods_type_price[]" type="text" value="' + t_price +'"/></td><td><button onclick="deleteGoodsTypeRow('+lastId+');return false;">删除</button> <button onclick="addGoodsTypeRow();return false;">添加</button></td></tr>').insertAfter($('#goodsTypeTable tr:last-child'));
		};
		window.deleteGoodsTypeRow = function(id){
			$('#goods_type_row_'+id).remove();
			if( $('#goodsTypeTable tr').length == 1 )
				addGoodsTypeRow();
		}
<?php
	if($isUpdate){
		for( $i = 0 ; $i < count( $model->types ) ; $i ++ ){
			echo 'addGoodsTypeRow("'. 
				CHtml::encode($model->types[$i]->gt_title).'",'.
				CHtml::encode($model->types[$i]->gt_price).');';
		}
	} else {
		echo 'addGoodsTypeRow();';
	}
?>
	})()
	</script>
	</div>
	<div class="row">
	<label>商品图片</label>
	<table id="goodsPictureTable" border="1" style="width:480px;margin-left: -5px">
		<tr>
			<th style="">选择图片</th>
			<th style="width:200px">操作</th>
		</tr>
	</table>
	<script>
	// 图片操作
	(function(){
		var lastId = 1,
		CREATE_URL = '?r=wdGoodsPicture/create<?php 
			if($isUpdate) 
			echo '&goods_id='.$model->g_id;
		?>',
		UPDATE_URL = '?r=wdGoodsPicture/update&id=';
		window.addPictureRow = function (url, imgId){
			imgId = imgId || '';
			lastId++;
			$('<tr id="goods_picture_row_'+lastId+'"><td><input id="selectImg' + lastId + '" type="button" value="选择图片"><img id="selectedImg' + lastId + '" src="'+url+'" style="display:' + (url?'block':'none')+';max-width:200px; max-height:200px"><input id="selectedImgValue' + lastId + '" type="hidden" name="goods_picture[]" value="' + imgId + '"/></td><td><input type="button" onclick="deletePictureRow('+lastId+', \'' + imgId + '\');return false;" value="删除"> <input type="button" onclick="addPictureRow();return false;" value="添加"></td></tr>').insertAfter($('#goodsPictureTable tr:last-child'));
			var curId = lastId;
			KindEditor.ready(function(K) {
				editor = K.editor({
					uploadJson : CREATE_URL,
					allowFileManager : true,
					allowImageUpload : true
				});
				
				K('#selectImg' + curId).click(function() {
					var imgId = $('#selectedImgValue' + curId ).val();
					if( imgId != '' ){
						if( !window.confirm('请注意，更改图片操作不可恢复，是否确认继续') )
							return;
						editor.uploadJson=CREATE_URL + imgId;
					}
					editor.loadPlugin('image', function() {
						editor.plugin.imageDialog({
						showRemote : false,
						clickFn : function(url, title, width, height, border, align) {
							K('#selectedImg' + curId).attr('src',url);
							K('#selectedImgValue'+curId).val(title);
							K('#selectedImg' + curId).show();
							editor.hideDialog();
						}
						});
					});
				});
			});
		};
		window.deletePictureRow = function(id,imgId){
			if( window.confirm('你确定要删除图片么，删除操作不可恢复。') ) {
				$.get('?r=wdGoodsPicture/delete&id='+imgId);
				$('#goods_picture_row_' + id).remove();
				if( $('#goodsPictureTable tr').length == 1)
					addPictureRow();
			}
		}
<?php 
	if($isUpdate){
		for( $i = 0 ; $i < count($model->pictures) ; $i ++ ){
			echo 'addPictureRow("/shops/images/upload/img'.
				$model->pictures[$i]->gp_id.'.'.
				CHtml::encode($model->pictures[$i]->gp_pic).'",'.
				$model->pictures[$i]->gp_id.');';
		}
	}else{
		?>addPictureRow();<?php
	}
?>
	})()
	</script>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? '创建' : '保存'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->