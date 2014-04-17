<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<link href="html/css/css.css" type="text/css" rel="stylesheet">
<link href="html/css/index.css" type="text/css" rel="stylesheet">
<link href="html/css/item.css" type="text/css" rel="stylesheet">
</head>
<body>
<div id="item_show_wrap">
    <header id="common_hd" class="c_txt rel"><!--通用顶部 按钮 文字 按钮-->
        <a id="hd_back" class="abs comm_p8 hide" href="?r=front" style="display: block;">返回</a>
        <h1 class="hd_tle bold">商品详情</h1>
        <!--a href="##" id="hd_edit" class="abs comm_p8">编辑/删除 等等 右侧按钮 本页不需要</a-->
    </header>
    
    <section id="item_info" class="rel">
        <article id="item_show" class="loading c_txt">
            <img width="100%" src="/shops/images/upload/img<?php echo $model->pictures[0]->gp_id; ?>.<?php echo $model->pictures[0]->gp_pic; ?>" >
        </article>
        <h2 id="item_name"><?php echo CHtml::encode($model->g_title); ?></h2>
        <span id="item_price" class="i_pri">￥<?php echo $model->types[0]->gt_price; ?></span>
        <span id="express_money_show" class="hide" style="display: inline-block;"></span>
    </section>
    
    
    
    <section id="item_seller" style="display:none">
        <div id="seller_wrap">
            <div id="seller_info" class="rel"><img src="http://wd.geilicdn.com/vshop902181-1394174224.jpg?w=110&amp;h=110&amp;cp=1" width="50" height="50" id="seller_thumb" class="abs"><p id="seller_name" class="abs over_hidden ellipsis">挑选礼物</p><p id="seller_weixin" class="index_p8 abs">微信: itseva</p></div>
            <a id="enter_shop" class="block c_txt" href="/index.html?userid=902181&amp;urlScrollToViewed=1"><img src="html/images/enter_shop.png" width="17" height="17">&nbsp;进入店铺</a>
        </div>
    </section>
    
    <section id="item_detail">
        <div id="detail_wrap">
            <h3 class="i_title">商品详情</h3>
            <!--图片loading 删除元素-->
	<?php 
		for( $i = 0 ; $i < count( $model->pictures) ; $i ++ ){
		?><img src="/shops/images/upload/img<?php echo $model->pictures[$i]->gp_id ?>.<?php echo $model->pictures[$i]->gp_pic; ?>" width="100%"><?php
		}
	?>
	</div>    
        <!--a href="http://weidian.koudai.com/weidian_offical_PC/?from=iWantItem" target="_blank" id="iWantAShop" class="block c_txt">我也要开微店</a-->
    </section>
    
    <footer>
    </footer>
</div>
</body>
</html>