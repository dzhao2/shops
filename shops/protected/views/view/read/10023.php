<html>
<?php 
	if( isset($_GET['n_id']) ){
		$news = CmsNews::model()->findByPk( $_GET['n_id'] );
	} else {
		$news = new CmsNews;
	}
	
?>
    <head>
        <meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="templates/10023/css/common.css" media="all">
		<link rel="stylesheet" type="text/css" href="templates/10023/css/font-awesome.css" media="all">
		<link rel="stylesheet" type="text/css" href="templates/10023/css/reset.css" media="all">
		<link rel="stylesheet" type="text/css" href="templates/10023/css/peak.css" media="all">
		<link rel="stylesheet" type="text/css" href="templates/10023/css/ui-1-1.css" media="all">
        <title>
            <?php echo CHtml::encode($news->n_title); ?> - <?php echo CHtml::encode($model->sh_title); ?>
        </title>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
        <meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"
        name="viewport">
        <!-- Mobile Devices Support @begin -->
        <meta content="application/xhtml+xml;charset=UTF-8" http-equiv="Content-Type">
        <meta content="no-cache,must-revalidate" http-equiv="Cache-Control">
        <meta content="no-cache" http-equiv="pragma">
        <meta content="0" http-equiv="expires">
        <meta content="telephone=no, address=no" name="format-detection">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <!-- apple devices fullscreen -->
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
        <!-- Mobile Devices Support @end -->
        <style>
            img{max-width:100%!important;}
        </style>
    </head>
    
    <body onselectstart="return true;" ondragstart="return false;">
        <div class="weimob-page">
            <div style="height:35px!important;">
            </div>
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
            <div class="weimob-content">
                <h3>
					<?php echo CHtml::encode($news->n_title); ?>
                </h3>
                <div class="pub_time">
                    <?php echo CHtml::encode($news->n_createdate);?>
                </div>
                <div class="head_logo" onclick="location.href='?r=view&id=<?php echo CHtml::encode($model->sh_id); ?>'">
                    <div>
                        <span style="background-image:url('<?php echo CHtml::encode($model->getCmsAttributeValue('logo_url')); ?>');">
                        </span>
                    </div>
                    <div style="width:100%;">
                        <label>
                            <?php echo CHtml::encode($model->sh_title); ?>
                        </label>
                        <div style="color:#ccc;">
                            <?php echo CHtml::encode($model->sh_weixin); ?>
                        </div>
                    </div>
                </div>
                <article>
				<?php echo $news->n_content; ?>
                </article>
            </div>
            <section style="width:95%; margin:0px auto;">
                <div id="mcover" onclick="document.getElementById('mcover').style.display='';"
                style="display:none;">
                    <img src="http://stc.weimob.com/img/guide.png?=2014-03-07-1">
                </div>
                <div class="text" id="content">
                    <div id="mess_share">
                        <div id="share_1">
                            <button class="button2" onclick="document.getElementById('mcover').style.display='block';">
                                <img src="http://stc.weimob.com/img/icon_msg.png?=2014-03-07-1">
                                &nbsp;发送给朋友
                            </button>
                        </div>
                        <div id="share_2">
                            <button class="button2" onclick="document.getElementById('mcover').style.display='block';">
                                <img src="http://stc.weimob.com/img/icon_timeline.png?=2014-03-07-1">
                                &nbsp;分享到朋友圈
                            </button>
                        </div>
                        <div class="clr">
                        </div>
                    </div>
                </div>
            </section>
            <div style="padding-bottom:5px!important;">
                <a href="javascript:window.scrollTo(0,0);" style="font-size:12px;margin:5px auto;display:block;color:#fff;text-align:center;line-height:35px;background:#333;margin-bottom:-10px;">
                    返回顶部
                </a>
            </div>
            <!-- 分享前控制 -->
        </div>
        <footer style="overflow:visible; margin-top:0px">
            <div class="weimob-copyright" style="padding-bottom:50px;">
                <a href="/weisite/home?pid=20539&amp;bid=37786&amp;wechatid=oOyWgjgeBwD1WBNzQvE7gpKEs448&amp;wxref=mp.weixin.qq.com">© <?php echo CHtml::encode($model->getCmsAttributeValue('copyright')); ?>
                </a>
            </div>
        </footer>
    </body>

</html>
