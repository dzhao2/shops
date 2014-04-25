<html>
    <head>
        <meta charset="utf-8">
        <title>
            <?php echo CHtml::encode( $model->sh_title ); ?>
        </title>
		<link rel="stylesheet" type="text/css" href="templates/10023/css/common.css" media="all">
		<link rel="stylesheet" type="text/css" href="templates/10023/css/font-awesome.css" media="all">
		<link rel="stylesheet" type="text/css" href="templates/10023/css/home.css" media="all">
		<link rel="stylesheet" type="text/css" href="templates/10023/css/reset.css" media="all">
		<link rel="stylesheet" type="text/css" href="templates/10023/css/snower.css" media="all">
		<link rel="stylesheet" type="text/css" href="css/idangerous.swiper.css" media="all">
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
        <!-- Mobile Devices Support @begin -->
        <meta content="application/xhtml+xml;charset=UTF-8" http-equiv="Content-Type">
        <meta content="no-cache,must-revalidate" http-equiv="Cache-Control">
        <meta content="no-cache" http-equiv="pragma">
        <meta content="0" http-equiv="expires">
        <meta content="telephone=no, address=no" name="format-detection">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <!-- apple devices fullscreen -->
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
	<meta name="viewport" content="width=device-width, initial-scale=1" /> 
		<meta name="description" content="Font Awesome, the iconic font designed for Bootstrap">
        <!-- Mobile Devices Support @end -->
		<script src="js/jquery-1.7.1.min.js"></script>
		<script src="js/idangerous.swiper.js"></script>
		<script src="js/idangerous.swiper.scrollbar-1.2.js"></script>
    </head>
    
    <body onselectstart="return true;" ondragstart="return false;">
	
<script>
$(function(){
	
	//Main Swiper
	var swiper = new Swiper('.swiper1', {
		pagination : '.pagination1',
		loop:true,
		grabCursor: true
	});
	});
</script>
	  
	  
        <div class="body">
		
		
            <!-- 幻灯片管理 -->
            <div style="-webkit-transform:translate3d(0,0,0);">
                <div id="banner_box" class="box_swipe" style="visibility: visible;">
				  <div class="swiper-container swiper1" style="
					width:100%;
					height:300px;
				  ">
					<div class="swiper-wrapper"><?php 
						$slideGroup = $model->getMenuGroup('index_slide');
					for( $i = 0 ; $i < count($slideGroup) ; $i ++ ){
						$slide = $slideGroup[$i];
						?><div class="swiper-slide"><a onclick="return false;"><img width="100%" height="100%" src="<?php echo CHtml::encode( $slide->sm_picurl ); ?>"/></a></div><?php
					}
					?>
					</div>
				  </div>
                    <ol class="pagination1"></ol>
                </div>
            </div>
            <br>
            <section>
                <div>
					<style>
						.h80{height:80px;}
					</style>
                    <ul class="list_ul">
                        <li class="box">
<?php 
	if($model->getCmsAttributeValue('menu1_title') != '' ){
?>
                            <dl class="h80" style="
							-webkit-box-flex:<?php echo CHtml::encode($model->getCmsAttributeValue('menu1_width'));?>;
							background-color:<?php echo CHtml::encode($model->getCmsAttributeValue('menu1_color'));?>
							">
                                <a href="<?php echo CHtml::encode($model->getCmsAttributeValue('menu1_linkurl'));?>">
                                    <dd>
                                        <div>
                                            <span class="<?php echo CHtml::encode($model->getCmsAttributeValue('menu1_icon'));?>">
                                            </span>
                                        </div>
                                    </dd>
                                    <dt>
                                        <?php echo CHtml::encode($model->getCmsAttributeValue('menu1_title'));?>
                                    </dt>
                                </a>
                            </dl>
<?php
	} 
	if($model->getCmsAttributeValue('menu2_title') != '' ) {
?>
                            <dl class="h80" style="
							-webkit-box-flex:<?php echo CHtml::encode($model->getCmsAttributeValue('menu2_width'));?>;
							background-color:<?php echo CHtml::encode($model->getCmsAttributeValue('menu2_color'));?>
							">
                                <a href="<?php echo CHtml::encode($model->getCmsAttributeValue('menu2_linkurl'));?>">
                                    <dd>
                                        <div>
                                            <span class="<?php echo CHtml::encode($model->getCmsAttributeValue('menu2_icon'));?>">
                                            </span>
                                        </div>
                                    </dd>
                                    <dt>
                                        <?php echo CHtml::encode($model->getCmsAttributeValue('menu2_title'));?>
                                    </dt>
                                </a>
                            </dl>
<?php
	} 
	if($model->getCmsAttributeValue('menu3_title') != '' ) {
?>
                            <dl class="h80" style="
							-webkit-box-flex:<?php echo CHtml::encode($model->getCmsAttributeValue('menu3_width'));?>;
							background-color:<?php echo CHtml::encode($model->getCmsAttributeValue('menu3_color'));?>
							">
                                <a href="<?php echo CHtml::encode($model->getCmsAttributeValue('menu3_linkurl'));?>">
                                    <dd>
                                        <div>
                                            <span class="<?php echo CHtml::encode($model->getCmsAttributeValue('menu3_icon'));?>">
                                            </span>
                                        </div>
                                    </dd>
                                    <dt>
                                        <?php echo CHtml::encode($model->getCmsAttributeValue('menu3_title'));?>
                                    </dt>
                                </a>
                            </dl>
<?php 
	}
?>
                        </li>
<?php
	if($model->getCmsAttributeValue('menu4_title') != '' ) {
?>
                        <li class="box">
                            <dl class="h80" style="
							-webkit-box-flex:<?php echo CHtml::encode($model->getCmsAttributeValue('menu4_width'));?>;
							background-color:<?php echo CHtml::encode($model->getCmsAttributeValue('menu4_color'));?>
							">
                                <a href="<?php echo CHtml::encode($model->getCmsAttributeValue('menu4_linkurl'));?>">
                                    <dd>
                                        <div>
                                            <span class="<?php echo CHtml::encode($model->getCmsAttributeValue('menu4_icon'));?>">
                                            </span>
                                        </div>
                                    </dd>
                                    <dt>
                                        <?php echo CHtml::encode($model->getCmsAttributeValue('menu4_title'));?>
                                    </dt>
                                </a>
                            </dl>
<?php 
	if($model->getCmsAttributeValue('menu5_title') != '' ) {
?>
                            <dl class="h80" style="
							-webkit-box-flex:<?php echo CHtml::encode($model->getCmsAttributeValue('menu5_width'));?>;
							background-color:<?php echo CHtml::encode($model->getCmsAttributeValue('menu5_color'));?>
							">
                                <a href="<?php echo CHtml::encode($model->getCmsAttributeValue('menu5_linkurl'));?>">
                                    <dd>
                                        <div>
                                            <span class="<?php echo CHtml::encode($model->getCmsAttributeValue('menu5_icon'));?>">
                                            </span>
                                        </div>
                                    </dd>
                                    <dt>
                                        <?php echo CHtml::encode($model->getCmsAttributeValue('menu5_title'));?>
                                    </dt>
                                </a>
                            </dl>
<?php
	}
?>
                        </li>
<?php
	} 
	if($model->getCmsAttributeValue('menu6_title') != '' ) {
?>
						<li class="box">
                            <dl class="h80" style="
							-webkit-box-flex:<?php echo CHtml::encode($model->getCmsAttributeValue('menu6_width'));?>;
							background-color:<?php echo CHtml::encode($model->getCmsAttributeValue('menu6_color'));?>
							">
                                <a href="<?php echo CHtml::encode($model->getCmsAttributeValue('menu6_linkurl'));?>">
                                    <dd>
                                        <div>
                                            <span class="<?php echo CHtml::encode($model->getCmsAttributeValue('menu6_icon'));?>">
                                            </span>
                                        </div>
                                    </dd>
                                    <dt>
                                        <?php echo CHtml::encode($model->getCmsAttributeValue('menu6_title'));?>
                                    </dt>
                                </a>
                            </dl>
<?php 
	if($model->getCmsAttributeValue('menu7_title') != '' ) {
?>
                            <dl class="h80" style="
							-webkit-box-flex:<?php echo CHtml::encode($model->getCmsAttributeValue('menu7_width'));?>;
							background-color:<?php echo CHtml::encode($model->getCmsAttributeValue('menu7_color'));?>
							">
                                <a href="<?php echo CHtml::encode($model->getCmsAttributeValue('menu7_linkurl'));?>">
                                    <dd>
                                        <div>
                                            <span class="<?php echo CHtml::encode($model->getCmsAttributeValue('menu7_icon'));?>">
                                            </span>
                                        </div>
                                    </dd>
                                    <dt>
                                        <?php echo CHtml::encode($model->getCmsAttributeValue('menu7_title'));?>
                                    </dt>
                                </a>
                            </dl>
<?php
	} 
	if($model->getCmsAttributeValue('menu8_title') != '' ) {
?>
                            <dl class="h80" style="
							-webkit-box-flex:<?php echo CHtml::encode($model->getCmsAttributeValue('menu8_width'));?>;
							background-color:<?php echo CHtml::encode($model->getCmsAttributeValue('menu8_color'));?>
							">
                                <a href="<?php echo CHtml::encode($model->getCmsAttributeValue('menu8_linkurl'));?>">
                                    <dd>
                                        <div>
                                            <span class="<?php echo CHtml::encode($model->getCmsAttributeValue('menu8_icon'));?>">
                                            </span>
                                        </div>
                                    </dd>
                                    <dt>
                                        <?php echo CHtml::encode($model->getCmsAttributeValue('menu8_title'));?>
                                    </dt>
                                </a>
                            </dl>
<?php 
	}
?>
                        </li>
<?php
	}
?>
                    </ul>
                </div>
            </section>
        </div>
        <footer style="overflow:visible;">
            <div class="weimob-copyright" style="padding-bottom:50px;">
                <a href="/weisite/home?pid=20539&amp;bid=37786&amp;wechatid=oOyWgjgeBwD1WBNzQvE7gpKEs448&amp;wxref=mp.weixin.qq.com">
                    © <?php echo CHtml::encode($model->getCmsAttributeValue('copyright'));?>
                </a>
            </div>
        </footer>
        <div mark="stat_code" style="width:0px; height:0px; display:none;">
        </div>
    </body>

</html>
