<html><head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="templates/wm/css/reset.css" media="all">
<link rel="stylesheet" type="text/css" href="templates/wm/css/snower.css" media="all">
<link rel="stylesheet" type="text/css" href="templates/wm/css/common.css" media="all">
<link rel="stylesheet" type="text/css" href="templates/wm/css/home-0.css" media="all">
<link rel="stylesheet" type="text/css" href="templates/wm/css/font-awesome.css" media="all">
<script type="text/javascript" charset="utf-8" async="" src="http://lxbjs.baidu.com/lxb.js?sid=3049852"></script>
<script type="text/javascript" src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="templates/wm/js/swipe.js"></script>
<script type="text/javascript" src="templates/wm/js/zepto.js"></script>
<title><?php echo CHtml::encode($model->sh_title);?></title>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
		<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
        <!-- Mobile Devices Support @begin -->
            <meta content="application/xhtml+xml;charset=UTF-8" http-equiv="Content-Type">
            <meta content="no-cache,must-revalidate" http-equiv="Cache-Control">
            <meta content="no-cache" http-equiv="pragma">
            <meta content="0" http-equiv="expires">
            <meta content="telephone=no, address=no" name="format-detection">
            <meta name="apple-mobile-web-app-capable" content="yes"> <!-- apple devices fullscreen -->
            <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
        <!-- Mobile Devices Support @end -->
        <link rel="shortcut icon" href="favicon.ico">
   </head>
  
  <body onselectstart="return true;" ondragstart="return false;">
        


<div class="weimob-page" style="display:block; padding-bottom:55px;">
    
		<!--
	幻灯片管理
	-->
	<div style="-webkit-transform:translate3d(0,0,0);">
		<div id="banner_box" class="box_swipe" style="visibility: visible;">
			<ul style="list-style: none; width: 1536px; transition: 500ms; -webkit-transition: 500ms; -webkit-transform: translate3d(-768px, 0px, 0px);"><?php 
	$slideGroup = $model->getMenuGroup('index_slide');
	for( $i = 0 ; $i < count($slideGroup) ; $i ++ ){
		$slide = $slideGroup[$i];
		?><li style="width: 384px; height:280px; display: table-cell; vertical-align: top;">
			<a href="#"><img src="<?php echo CHtml::encode( $slide->sm_picurl ); ?>" alt="<?php echo CHtml::encode( $slide->sm_title); ?>" style="width:100%;height:100%;"></a></li><?php
	}
	?></ul>
	<ol><?php
	for( $i = 0 ; $i < count($slideGroup) ; $i ++ ){
		$clsName = '';
		if( $i == 0 ) $clsName = 'on';
		echo  '<li class="'.$clsName.'"></li>';
	}
	?></ol>
		</div>
	</div>
		<script>
		$(function(){
			new Swipe(document.getElementById('banner_box'), {
				speed:500,
				auto:3000,
				callback: function(){
					var lis = $(this.element).next("ol").children();
					lis.removeClass("on").eq(this.index).addClass("on");
				}
			});
		});
	</script>
<header>
        <div class="snower">
            <script type="text/javascript"></script>
        </div>
    </header>             <!--
		用户分类管理
        -->
		<div class="weimob-content">
            <div class="weimob-list"><?php 
	$slideGroup = $model->getMenuGroup('index_menu');
	for( $i = 0 ; $i < count($slideGroup) ; $i ++ ){
		$slide = $slideGroup[$i];
		?><a href="<?php echo CHtml::encode( $slide->sm_linkurl ); ?>" class="weimob-list-item">
			<div class="weimob-list-item-bg">
                <div>
					<img src="<?php echo CHtml::encode( $slide->sm_picurl ); ?>" alt="111" style="width:100%;">
				</div>
                <div class="weimob-list-item-box">
                    <div class="weimob-list-item-line">
                        <div class="weimob-list-item-title"><?php echo CHtml::encode( $slide->sm_title ); ?></div>
                    </div>
             </div>
         </div>
      </a>
	<?php
	}
	?>
		</div>
        </div>
    </div>

<!--
导航菜单
   后台设置的快捷菜单
-->

<!--
分享前控制
-->
	<script type="text/javascript">
		
		window.shareData = {
			"imgUrl": "http://img.weimob.com/static/b0/3f/6e/image/20140426/20140426220528_85099.jpg",
			"timeLineLink": "http://www.weimob.com/weisite/home?pid=123828&bid=252784&wechatid=fromUsername&wxref=mp.weixin.qq.com",
			"sendFriendLink": "http://www.weimob.com/weisite/home?pid=123828&bid=252784&wechatid=fromUsername&wxref=mp.weixin.qq.com",
			"weiboLink": "http://www.weimob.com/weisite/home?pid=123828&bid=252784&wechatid=fromUsername&wxref=mp.weixin.qq.com",
			"tTitle": "官网测试",
			"tContent": "测试测试",
			"fTitle": "官网测试",
			"fContent": "测试测试",
			"wContent": "测试测试"
		};
			</script>
        			<footer style="overflow:visible;">
				<div class="weimob-copyright" style="padding-bottom:50px;">
											<a href="/weisite/home?pid=123828&amp;bid=252784&amp;wechatid=fromUsername&amp;wxref=mp.weixin.qq.com">© <?php echo CHtml::encode($model->getCmsAttributeValue('copyright')); ?></a>
									</div>
			</footer>
				<div mark="stat_code" style="width:0px; height:0px; display:none;">
					</div>
	
		<script type="text/javascript">
(function() {
	var wtj = document.createElement('script'); wtj.type = 'text/javascript'; wtj.async = true;
	wtj.src = 'http://tj.weimob.com/wtj.js?url=' + encodeURIComponent(location.href);
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(wtj, s);
})();
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3Fd80741dd59de91e1846b2add2c0ad2a2' type='text/javascript'%3E%3C/script%3E"));
function weimobAfterShare(shareFromWechatId,sendFriendLink,shareToPlatform){
	var wmShare = document.createElement('script'); wmShare.type = 'text/javascript'; wmShare.async = true;
    wmShare.src = 'http://tj.weimob.com/api-share.js?fromWechatId=' + shareFromWechatId + '&shareToPlatform=';
	wmShare.src += shareToPlatform + '&pid=123828&sendFriendLink=' + encodeURIComponent(sendFriendLink);
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(wmShare, s);
}

/**
 * 默认分享出去的数据
 *
 */
function getShareImageUrl(){
	var share_imgurl = "";
	if("" == share_imgurl){
		var shareImgObj = document.getElementsByClassName("shareImgUrl")[0];
		if('undefined' != typeof(shareImgObj)){
			share_imgurl = shareImgObj.src;
		}
	}
	return window.shareData.imgUrl || share_imgurl;
}

window.shareData = window.shareData || {
		"timeLineLink": "http://www.weimob.com/Weisite/Home?pid=123828&bid=252784&wechatid=fromUsername",
	"sendFriendLink": "http://www.weimob.com/Weisite/Home?pid=123828&bid=252784&wechatid=fromUsername",
	"weiboLink": "http://www.weimob.com/Weisite/Home?pid=123828&bid=252784&wechatid=fromUsername",
	"tTitle": document.title,
	"tContent": document.title,
	"fTitle": document.title,
	"fContent": document.title,
	"wContent": document.title
}
document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
	// 发送给好友
	WeixinJSBridge.on('menu:share:appmessage', function (argv) {
		WeixinJSBridge.invoke('sendAppMessage', { 
			"img_url": getShareImageUrl(),
			"img_width": "640",
			"img_height": "640",
			"link": window.shareData.sendFriendLink,
			"desc": window.shareData.fContent,
			"title": window.shareData.fTitle
		}, function (res) {
			weimobAfterShare("",window.shareData.sendFriendLink,'appmessage');
			_report('send_msg', res.err_msg);
		})
	});

	// 分享到朋友圈
	WeixinJSBridge.on('menu:share:timeline', function (argv) {
		WeixinJSBridge.invoke('shareTimeline', {
			"img_url": getShareImageUrl(),
			"img_width": "640",
			"img_height": "640",
			"link": window.shareData.timeLineLink,
			"desc": window.shareData.tContent,
			"title": window.shareData.tTitle
		}, function (res) {
			weimobAfterShare("",window.shareData.timeLineLink,'timeline');
			_report('timeline', res.err_msg);
		});
	});

	// 分享到微博
	WeixinJSBridge.on('menu:share:weibo', function (argv) {
		WeixinJSBridge.invoke('shareWeibo', {
			"content": window.shareData.wContent,
			"url": window.shareData.weiboLink
		}, function (res) {
			weimobAfterShare("",window.shareData.weiboLink,'weibo');
			_report('weibo', res.err_msg);
		});
	});
}, false);
</script><script src=" http://hm.baidu.com/h.js?d80741dd59de91e1846b2add2c0ad2a2" type="text/javascript"></script>




</body>
  
  </html>
