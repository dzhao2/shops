<?php
/*
 * @var $model WdShop
 * @var $this FrontController
 */
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="html/css/css1.css">
		<link rel="stylesheet" type="text/css" href="html/css/css2.css">
		<script src="/shops/js/jquery-1.9.1.js"></script>
	</head>
	<body>			
		<div id="wd_show">
			<header class="rel" id="index_hd">
				<h1 class="abs over_hidden ellipsis" id="hd_name"><?php echo CHtml::encode($model->sh_title);?> </h1>
				<!--h2 id="hd_weixin" class="abs index_p8">微信:XXXXXX</h2-->
				<h3 class="abs" id="vshop_icon"><img width="100%" height="100%" src="http://wd.geilicdn.com/vshop902181-1394174224.jpg?w=110&amp;h=110&amp;cp=1"></h3>
				<div class="over_hidden" id="hd_bg" style="background-image: url(&quot;http://wd.geilicdn.com/vshop-default-shoplogo-logo1.jpg&quot;);"><i class="abs" id="hd_i_l">“</i><h4 class="margin_auto" id="hd_intro"><?php echo CHtml::encode($model->sh_desc)?></h4><i class="abs" id="hd_i_r">”</i></div>
			<h2 class="abs index_p8" id="hd_weixin">微信:<?php echo CHtml::encode($model->sh_weixin)?></h2></header>
			
			<section id="index_sec">
				<div class="loading" id="index_loading" style="display: none;">&nbsp;</div>
				<!--单个首页列表容器 开始-->
				<div class="i_wrap margin_auto rel hide" style="display: block;">
					<h3 class="i_title abs">店长推荐</h3>
					<ul id="top_ul" class="i_ul rel">
					<li class="i_li left"><a href="?r=front/item&id=<?php echo $model->recommend_1->g_id; ?>"><img width="137" height="137" src="/shops/images/upload/img<?php echo $model->recommend_1->pictures[0]->gp_id; ?>.<?php echo $model->recommend_1->pictures[0]->gp_pic; ?>"><p class="i_txt"><?php echo CHTML::encode($model->recommend_1->g_title); ?></p><p class="i_pri">￥<?php echo $model->recommend_1->types[0]->gt_price; ?></p></a></li>
					<li class="i_li left"><a href="?r=front/item&id=<?php echo $model->recommend_2->g_id; ?>"><img width="137" height="137" src="/shops/images/upload/img<?php echo $model->recommend_2->pictures[0]->gp_id; ?>.<?php echo $model->recommend_2->pictures[0]->gp_pic; ?>"><p class="i_txt"><?php echo CHTML::encode($model->recommend_2->g_title); ?></p><p class="i_pri">￥<?php echo $model->recommend_2->types[0]->gt_price; ?></p></a></li></ul>
					<div class="clear"></div>
				</div>
				<!--单个首页列表容器 结束-->
			
				<!--单个首页列表容器 开始-->
				<div class="i_wrap margin_auto rel hide" style="display: block;">
					<h3 class="i_title abs">热卖商品</h3>
					<ul id="hot_ul" class="i_ul rel">
					<?php 
						for( $i = 0 ; $i < count($goodsList) ; $i ++ ){
							$goods = $goodsList[$i];
					?>
						<li class="i_li left">
						<a href="?r=front/item&id=<?php echo $goods->g_id?>"><img width="137" height="137" src="/shops/images/upload/img<?php echo $goods->pictures[0]->gp_id?>.<?php echo $goods->pictures[0]->gp_pic?>"><p class="i_txt"><?php echo CHtml::encode($goods->g_title); ?></p><p class="i_pri">￥<?php echo $goods->types[0]->gt_price; ?></p></a></li>	
					<?php }
					?>
					</ul>
					<div class="clear"></div>
				</div>
				
				<p class="c_txt hide" id="scroll_loading_txt" style="display: block;"><img width="20" height="20" src="html/images/common/loading.gif"></p>
				
				<a class="block c_txt" id="iWantAShopIndex" target="_blank" href="http://weidian.koudai.com/weidian_offical_PC/?from=iWantIndex">我也要开微店</a>
				<!--单个首页列表容器 结束-->
				<div class="hide c_txt" id="item_empty">小店新开张，客官稍后来。</div>
			</section>
		</div>

		<div class="hide" id="noShop">
			<header class="c_txt" id="common_hd"><!--通用顶部 按钮 文字 按钮-->
				<h1 class="hd_tle bold">微店</h1>
			</header>
			<div class="c_txt" id="noShopShow">您访问的店铺不存在</div>
		</div>
	<script>
	// 瀑布流代码
	(function(){
	function ajaxGet(url, successCB, failedCB)
	{
		var trys =0, AJAX_TIMEOUT=10000, AJAX_MAX_TRYS=3;
		(function(){
			var xhr =  new XMLHttpRequest(),
			retry = arguments.callee,
			// 超时重连
			reAjaxTimer = setTimeout(function(){
				xhr.abort();
				if( ++trys <= AJAX_MAX_TRYS ) 
					retry();
				else 
					failedCB&&failedCB(url);
			}, AJAX_TIMEOUT);
			xhr.onreadystatechange = function(){
				if( xhr.readyState==4 && xhr.status == 200 ){
					//下载成功处理
					clearTimeout( reAjaxTimer );
					successCB&&successCB(url, xhr.responseText);
				} else if( xhr.readyState==4 ){
					// 失败重连
					clearTimeout( reAjaxTimer );
					if( ++trys <= AJAX_MAX_TRYS )
						retry();
					else 
						failedCB && failedCB(url);
				}
			}	
			xhr.open( "GET", url , true );
			xhr.send( "" ); 
		})();
		
	}
	function getScrollTop(){
	　　var scrollTop = 0, bodyScrollTop = 0, documentScrollTop = 0;
	　　if(document.body){
	　　　　bodyScrollTop = document.body.scrollTop;
	　　}
	　　if(document.documentElement){
	　　　　documentScrollTop = document.documentElement.scrollTop;
	　　}
	　　scrollTop = (bodyScrollTop - documentScrollTop > 0) ? bodyScrollTop : documentScrollTop;
	　　return scrollTop;
	}

	//文档的总高度

	function getScrollHeight(){
	　　var scrollHeight = 0, bodyScrollHeight = 0, documentScrollHeight = 0;
	　　if(document.body){
	　　　　bodyScrollHeight = document.body.scrollHeight;
	　　}
	　　if(document.documentElement){
	　　　　documentScrollHeight = document.documentElement.scrollHeight;
	　　}
	　　scrollHeight = (bodyScrollHeight - documentScrollHeight > 0) ? bodyScrollHeight : documentScrollHeight;
	　　return scrollHeight;
	}

	//浏览器视口的高度

	function getWindowHeight(){
	　　var windowHeight = 0;
	　　if(document.compatMode == "CSS1Compat"){
	　　　　windowHeight = document.documentElement.clientHeight;
	　　}else{
	　　　　windowHeight = document.body.clientHeight;
	　　}
	　　return windowHeight;
	}
		var pageNum = 1, pageCount = 10, inLastPage = false;
		window.addEventListener('scroll', function(){
			if( getScrollHeight() - getScrollTop() - getWindowHeight() <= 90 && !inLastPage ){
				// console.log( 'ajax', getScrollHeight() - getScrollTop() - getWindowHeight() );
				ajaxGet('?r=front/goodsList&page='+pageNum, function(url, str){
					var parser=new DOMParser(),
					xmlobject =parser.parseFromString(str,"text/xml");
					window.xmlobject = xmlobject;
					
					var html = [];
					var goodsNodes = xmlobject.getElementsByTagName('goods');
					for( var i = 0 ; i < goodsNodes.length ; i ++ ){
						html.push('	<li class="i_li left"><a href="?r=front/item&id=');
						html.push( goodsNodes[i].getElementsByTagName('id')[0].firstChild.nodeValue);
						html.push('"><img width="137" height="137" src="');
						html.push(goodsNodes[i].getElementsByTagName('picurl')[0].firstChild.nodeValue);
						html.push('"><p class="i_txt">');
						html.push(goodsNodes[i].getElementsByTagName('title')[0].firstChild.nodeValue);
						html.push('</p><p class="i_pri">￥');
						html.push(goodsNodes[i].getElementsByTagName('price')[0].firstChild.nodeValue);
						html.push('</p></a></li>');
					}
					document.getElementById('hot_ul').insertAdjacentHTML('beforeEnd',html.join(''));
					pageNum ++;
					if( goodsNodes.length < 10 ){
						inLastPage = true;
						document.getElementById('scroll_loading_txt').style.display = 'none';
					}
				});
			} 
		});
	})();
	

	</script>
</body>
	
</html>