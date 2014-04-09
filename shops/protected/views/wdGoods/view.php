<?php
/* @var $this WdGoodsController */
/* @var $model WdGoods */

$this->menu=array(
	array('label'=>'添加商品', 'url'=>array('create')),
	array('label'=>'编辑商品', 'url'=>array('update', 'id'=>$model->g_id)),
	array('label'=>'删除商品', 'url'=>array('delete', 'id'=>$model->g_id), 'linkOptions'=>array('submit'=>array('delete','id'=>$model->g_id),'confirm'=>'您确定要删除该商品吗？')),
	array('label'=>'商品列表', 'url'=>array('admin')),
);
?>

<h1>查看商品 (ID：<?php echo $model->g_id; ?>)</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'g_id',
		'g_title',
	),
)); ?>
<h5>商品类型</h5>
<table class="detail-view">
<?php
$types = $model->types;
for( $i = 0 ; $i < count( $types ) ; $i++){
	$type = $types[$i];
	?>
	<tr class="<?php echo $i%2 == 0 ? 'odd':'even'; ?>">
		<td><?php echo CHtml::encode($type->gt_title); ?></td>
		<td><?php echo CHtml::encode($type->gt_price); ?></td>
	</tr>
	<?php
}
?>
</table>
<h5>商品图片</h5>
	<?php 
		$pictures = $model->pictures;
		for( $i = 0 ; $i < count($pictures) ; $i++){
			echo '<img src="/shops/images/upload/img'.$pictures[$i]->gp_id.'.'.$pictures[$i]->gp_pic.'" style="width:100%"/><br/>';
		}
	?>
