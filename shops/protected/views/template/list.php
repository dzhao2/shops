<?php
/* @var $this TemplateController */

$this->breadcrumbs=array(
	'Template'=>array('/template'),
	'List',
);
?>
<style>
li.temp-item{
	display:block;
	float:left;
	width:210px;
	text-align:center;
	margin-bottom:20px;
}
</style>
<ul>
	<?php foreach( $tempList as $id=>$temp ) { 
	
	?>
	<li class="temp-item"><a href="templates/<?php echo $id; ?>/index.html">
		<img src="templates/<?php echo $id; ?>/<?php echo $temp->thumbnail; ?>" style="width:200px;height:300px"></a><a href="templates/<?php echo $id; ?>/index.html" style="line-height:23px;text-align:center;padding-bottom:4px;">
		<?php echo CHtml::encode( (string)$temp->title ); ?>
	</a><br/>
	<button onclick="location='?r=template/use&id=<?php echo $id;?>'">应用</button>
	</li>
	<?php }?>
</ul>