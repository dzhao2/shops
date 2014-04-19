<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo CHtml::encode( $model->sh_title ); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="keywords" content="<?php echo CHtml::encode( $model->sh_title ); ?>">
<meta name="description" content="<?php echo CHtml::encode( $model->sh_title ); ?>">
<link type="text/css" rel="stylesheet" href="templates/10006/css/style.css">
<script type="text/javascript" src="templates/10006/js/html5.js"></script>
<script type="text/javascript" src="templates/10006/js/jquery.1.4.2-min.js"></script>
</head>
<body>
<div class="pw">
	<header class="body_header">
		<div class="top">
			<div class="logo"><img src="<?php echo CHtml::encode($model->getCmsAttribute('logo_url')); ?>"></div>
			<div class="menu">
				<?php echo CHtml::encode($model->getCmsAttribute('top_desc')); ?>
			</div>
		</div>
	</header>
	<section class="body_banner">
		<!--演示内容开始-->
		<div class="swipe">
			<ul id="slider"><?php 
			$slideGroup = $model->getMenuGroup('index_slide');
		for( $i = 0 ; $i < count($slideGroup) ; $i ++ ){
			$slide = $slideGroup[$i];
			?><li><img width="100%" src="<?php echo CHtml::encode( $slide->sm_picurl ); ?>"/></li><?php
		}
		?></ul>
			<div id="pagenavi">
			<?php for( $i = 0 ; $i < count($slideGroup) ; $i ++ ){
			?><a href="javascript:void(0);" <?php if($i==0) echo 'class="active"';?>><?php echo $i+1;?></a><?php
			}?>
			</div>
		</div>
		<script type="text/javascript" src="templates/10006/js/touchScroll.js"></script>
		<script type="text/javascript" src="templates/10006/js/touchslider.dev.js"></script>
		<script type="text/javascript" src="templates/10006/js/run.js"></script>
		<!--演示内容结束-->
	</section>
	<section class="body_main">
		<div class="trip" id="nav">
			<ul class="nav"><?php
		$menuGroup = $model->getMenuGroup('default');
		for( $i = 0 ; $i < count($menuGroup) ; $i ++ ){
				$menu = $menuGroup[$i];
			?><li><a href="<?php echo CHtml::encode($menu->sm_linkurl); ?>"><img src="<?php echo CHtml::encode($menu->sm_picurl); ?>"><br><?php echo CHtml::encode( $menu->sm_title); ?></a></li><?php
		}
			?>
			</ul>
		</div>
		<div class="trip">
			<div class="index_left">
				<ul>
					<li><a href="<?php echo CHtml::encode($model->getCmsAttribute('left_img1_linkurl')); ?>"><img src="<?php echo CHtml::encode($model->getCmsAttribute('left_img1')); ?>"></a></li>
					<li><a href="<?php echo CHtml::encode($model->getCmsAttribute('left_img2_linkurl')); ?>"><img src="templates/10006/images/tuijian.png"><img src="<?php echo CHtml::encode($model->getCmsAttribute('left_img2')); ?>"></a></li>
					<li><a href="<?php echo CHtml::encode($model->getCmsAttribute('left_img3_linkurl')); ?>"><img src="<?php echo CHtml::encode($model->getCmsAttribute('left_img3')); ?>"><img src="templates/10006/images/meiwei.png"></a></li>
				</ul>
			</div>
			<div class="index_right">
				<ul>
					<li class="emem"><a href="<?php echo CHtml::encode($model->getCmsAttribute('right_img1_linkurl')); ?>"><img src="<?php echo CHtml::encode($model->getCmsAttribute('right_img1')); ?>"></a></li>
					<li class="bmbm">
						<img src="templates/10006/images/zzh.png"><br><?php echo CHtml::encode($model->getCmsAttribute('right_desc')); ?><br>
						<span><a href="<?php echo CHtml::encode($model->getCmsAttribute('right_linkurl')); ?>"><img src="templates/10006/images/more.png"></a></span>
					</li>
				</ul>
			</div>
		</div>
	</section>
	<div class="body_footer">
		<ul><?php
	$menuGroup = $model->getMenuGroup('index_bottom');
	for( $i = 0 ; $i < count($menuGroup) ; $i ++ ){
		$menu = $menuGroup[$i];
		?><li><a href="<?php echo CHtml::encode($menu->sm_linkurl); ?>">
			<dl>
				<dt><img alt="<?php echo CHtml::encode($menu->sm_title);?>" src="<?php echo CHtml::encode($menu->sm_picurl);?>"></dt>
				<dd><?php echo CHtml::encode($menu->sm_title);?></dd>
			</dl></a></li><?php
	}
	?>
	</ul>
	</div>
</div>
</body>
</html>
