<?xml version="1.0" encoding="UTF-8" ?>
<goods-list>
<?php 
for( $i = 0 ; $i < count($goodsList) ; $i ++ ){
	$goods = $goodsList[$i];
?>
<goods>
	<id><![CDATA[<?php echo $goods->g_id; ?>]]></id>
	<title><![CDATA[<?php echo $goods->g_title; ?>]]></title>
	<price><![CDATA[<?php echo $goods->types[0]->gt_price; ?>]]></price>
	<picurl><![CDATA[/shops/images/upload/img<?php echo $goods->pictures[0]->gp_id; ?>.<?php echo $goods->pictures[0]->gp_pic; ?>]]></picurl>
</goods>
<?php
}
?>
</goods-list>