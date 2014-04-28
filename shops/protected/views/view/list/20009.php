<html><head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="templates/wm/css/reset.css" media="all">
<link rel="stylesheet" type="text/css" href="templates/wm/css/ui-1-1.css" media="all">
<link rel="stylesheet" type="text/css" href="templates/wm/css/common.css" media="all">
<link rel="stylesheet" type="text/css" href="templates/wm/css/list-7.css" media="all">
<link rel="stylesheet" type="text/css" href="templates/10023/css/font-awesome.css" media="all">
<script type="text/javascript" charset="utf-8" async="" src="http://lxbjs.baidu.com/lxb.js?sid=3049852"></script>
<script type="text/javascript" src="js/jquery-1.9.1.js"></script>
<?php 
$category = null;
if(isset($_GET['n_category_id'])){
	$category = CmsCategory::model()->findByPk($_GET['n_category_id']);
}
?>
<title><?php 
	if( $category == null ) echo '资讯列表';
	else echo CHtml::encode($category->sca_title);
?></title>
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
    <script charset="utf-8" src="http://trust.baidu.com/vcard/v.js?siteid=3049852&amp;url=http%3A%2F%2Fwww.weimob.com%2Fweisite%2Flist%3Fpid%3D4158%26bid%3D8544%26wechatid%3DoafmnuHzQd7vg8fzulgoNgmWlDcM%26ltid%3D4604%26wxref%3Dmp.weixin.qq.com&amp;source=&amp;rnd=985583552"></script></head>
    <body onselectstart="return true;" ondragstart="return false;">
        

<div class="weimob-page">
		<div style="height:35px!important;"></div>
	<div class="top_bar">
			<nav>
				<ul class="top_menu">
					<li onclick="window.history.go(-1);">
						<span class="icon-chevron-sign-left">
						</span>
					</li>
					<li onclick="location.href='?r=view&id=<?php echo CHtml::encode($model->sh_id); ?>'">
						<span class="icon-home">
						</span>
					</li>
					<li>
						<a href="tel:<?php echo CHtml::encode($model->getCmsAttributeValue('phone')); ?>">
							<span class="icon-phone">
							</span>
						</a>
					</li>
				</ul>
			</nav>
		</div>

<!--
分享前控制
-->
	<script>
		document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
			
			window.shareData = {
				"imgUrl": "http://img.weimob.com/static/ef/94/ec/image/20131231/20131231165005_60689.jpg",
				"timeLineLink": "http://www.weimob.com/weisite/list?pid=4158&bid=8544&wechatid=fromUsername&ltid=4604&wxref=mp.weixin.qq.com",
				"sendFriendLink": "http://www.weimob.com/weisite/list?pid=4158&bid=8544&wechatid=fromUsername&ltid=4604&wxref=mp.weixin.qq.com",
				"weiboLink": "http://www.weimob.com/weisite/list?pid=4158&bid=8544&wechatid=fromUsername&ltid=4604&wxref=mp.weixin.qq.com",
				"tTitle": "在售车型",
				"tContent": "在售车型",
				"fTitle": "在售车型",
				"fContent": "在售车型",
				"wContent": "在售车型"
			};

			// 发送给好友
			WeixinJSBridge.on('menu:share:appmessage', function (argv) {
				WeixinJSBridge.invoke('sendAppMessage', {
					"img_url": window.shareData.imgUrl,
					"img_width": "640",
					"img_height": "640",
					"link": window.shareData.sendFriendLink,
					"desc": window.shareData.fContent,
					"title": window.shareData.fTitle
				}, function (res) {
					_report('send_msg', res.err_msg);
				})
			});

			// 分享到朋友圈
			WeixinJSBridge.on('menu:share:timeline', function (argv) {
				WeixinJSBridge.invoke('shareTimeline', {
					"img_url": window.shareData.imgUrl,
					"img_width": "640",
					"img_height": "640",
					"link": window.shareData.timeLineLink,
					"desc": window.shareData.tContent,
					"title": window.shareData.tTitle
				}, function (res) {
					_report('timeline', res.err_msg);
				});
			});

			// 分享到微博
			WeixinJSBridge.on('menu:share:weibo', function (argv) {
				WeixinJSBridge.invoke('shareWeibo', {
					"content": window.shareData.wContent,
					"url": window.shareData.weiboLink,
				}, function (res) {
					_report('weibo', res.err_msg);
				});
			});
		}, false)
	</script>
	        <div class="weimob-content">
            <div class="weimob-list">
			<?php 
				$criteria = new CDbCriteria;
				$criteria->select = 'n_id,n_title,n_summary,n_picurl';
				$criteria->compare('n_shop_id', $model->sh_id);
				if(isset($_GET['n_category_id']))
					$criteria->compare('n_category_id', $_GET['n_category_id']);
				$criteria->order = 'n_updatedate desc';
				$list = CmsNews::model()->findAll($criteria);
				for( $i = 0 ; $i <count($list); $i ++ ){
					$news = $list[$i];
				?>
				<a class="weimob-list-item" href="?r=view&id=1&page=read&n_id=<?php echo CHtml::encode($news->n_id);?>">
				<?php if( $news->n_picurl != '' ){?>
					<div class="weimob-list-item-image" style="background-image:url(<?php echo CHtml::encode($news->n_picurl); ?>)"></div>
				<?php } ?>
                        <div class="weimob-list-item-line">
                            <div class="weimob-list-item-title"><?php echo CHtml::encode($news->n_title); ?></div>
                            <div class="weimob-list-item-summary"><?php echo CHtml::encode($news->n_summary); ?></div>
                        </div>
                        <div class="weimob-list-item-icon icon-arrow-r"></div>
                    </a>
				<?php 
				}
				?>                                      
                            </div>
        </div>
    </div>        			<footer style="overflow:visible;">
				<div class="weimob-copyright" style="padding-bottom:50px;">
											<a href="#">? <?php echo CHtml::encode($model->getCmsAttributeValue('copyright'));?></a>
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
	wmShare.src += shareToPlatform + '&pid=4158&sendFriendLink=' + encodeURIComponent(sendFriendLink);
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
		"timeLineLink": "http://www.weimob.com/weisite/list?pid=4158&bid=8544&wechatid=fromUsername&ltid=4604&wxref=mp.weixin.qq.com",
	"sendFriendLink": "http://www.weimob.com/weisite/list?pid=4158&bid=8544&wechatid=fromUsername&ltid=4604&wxref=mp.weixin.qq.com",
	"weiboLink": "http://www.weimob.com/weisite/list?pid=4158&bid=8544&wechatid=fromUsername&ltid=4604&wxref=mp.weixin.qq.com",
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
			weimobAfterShare("oafmnuHzQd7vg8fzulgoNgmWlDcM",window.shareData.sendFriendLink,'appmessage');
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
			weimobAfterShare("oafmnuHzQd7vg8fzulgoNgmWlDcM",window.shareData.timeLineLink,'timeline');
			_report('timeline', res.err_msg);
		});
	});

	// 分享到微博
	WeixinJSBridge.on('menu:share:weibo', function (argv) {
		WeixinJSBridge.invoke('shareWeibo', {
			"content": window.shareData.wContent,
			"url": window.shareData.weiboLink
		}, function (res) {
			weimobAfterShare("oafmnuHzQd7vg8fzulgoNgmWlDcM",window.shareData.weiboLink,'weibo');
			_report('weibo', res.err_msg);
		});
	});
}, false);
</script><script src=" http://hm.baidu.com/h.js?d80741dd59de91e1846b2add2c0ad2a2" type="text/javascript"></script>

</body></html>