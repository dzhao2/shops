<html>
    
    <head>
        <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
        <meta content="telephone=no" name="format-detection">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>
            最新教育资讯
        </title>
        <link href="templates/10023/css/global.css" rel="stylesheet" type="text/css">
        <link href="templates/10023/css/style.css" rel="stylesheet" type="text/css">
        <link href="templates/10023/css/style2.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" type="text/css" href="templates/10023/css/font-awesome.css" media="all">
		<link rel="stylesheet" type="text/css" href="templates/10023/css/common.css" media="all">
		<link rel="stylesheet" type="text/css" href="templates/10023/css/ui-1-1.css" media="all">
    </head>
    
    <body>
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
        <div id="web_page_contents" style="padding-top:36px;">
            <div class="wrap" id="column">
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
                <div class="list-type-0">
                    <a href="?r=view&id=1&page=read&n_id=<?php echo CHtml::encode($news->n_id);?>" target="_self">
                        <div class="item">
						<?php if( $news->n_picurl != '' ){?>
                            <div class="img">
                                <img src="<?php echo CHtml::encode($news->n_picurl); ?>">
                            </div>
						<?php } ?>
                            <div class="info" <?php
		if( $news->n_picurl == '' )
			echo 'style="left:0px;"';
							?>>
                                <h1>
                                    <?php echo CHtml::encode($news->n_title);?>
                                </h1>
                                <h2>
								<?php echo CHtml::encode($news->n_summary);?>
                                </h2>
                            </div>
                            <div class="detail">
                                <span>
                                </span>
                            </div>
                        </div>
                    </a>
                </div>
				<?php 
				}
				?>
                <input type="hidden" name="ShareTitle" value="最新动态">
            </div>
        </div>
    </body>

</html>