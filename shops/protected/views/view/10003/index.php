<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo CHtml::encode($model->sh_title); ?></title>
<base  />
<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<meta charset="utf-8">
<link href="templates/10003/pwximg/css/news.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="templates/10003/pwximg/css/plugmenu.css">
<script src="templates/10003/js/iscroll4.1.9.js"></script>
<script type="text/javascript">
var myScroll;

function loaded() {
myScroll = new iScroll('wrapper', {
snap: true,
momentum: false,
hScrollbar: false,
onScrollEnd: function () {
document.querySelector('#indicator > li.active').className = '';
document.querySelector('#indicator > li:nth-child(' + (this.currPageX+1) + ')').className = 'active';
}
 });
 
 
}

document.addEventListener('DOMContentLoaded', loaded, false);
</script>

</head>

<body id="cate7">
<div class="banner">

<div id="wrapper">
<div id="scroller">

<ul id="thelist">
<?php 

	$slideGroup = array();
	for( $i = 0 ; $i < count( $model->slides ) ; $i ++ ) {
		if( $model->slides[$i]->ss_group_id == 'index' )
			array_push( $slideGroup , $model->slides[$i]);
	}
	function slideCompare($s1, $s2){
		if( $s1->ss_index > $s2->ss_index )
			return 1;
		return -1;
	}
	usort( $slideGroup, 'slideCompare');
	for( $i = 0 ; $i < count( $slideGroup ) ; $i ++ ){
		$curSlide = $slideGroup[$i];
	?>
<li><p></p><a href="<?php echo CHtml::encode($curSlide->ss_linkurl); ?>" ><img src="<?php echo CHtml::encode($curSlide->ss_picurl);?>"></a></li>
	<?php
	}
?></ul>
</div>
</div>

<div id="nav">
<div id="prev" onclick="myScroll.scrollToPage('prev', 0,400,3);return false">&larr; prev</div>
<ul id="indicator">
<?php 
for( $i = 0 ; $i < count($slideGroup) ; $i ++ ){
	?><li  <?php if( $i == 0 ) echo 'class="active"';?>  ><?php echo ($i+1); ?></li><?php
}
?>
</ul>
<div id="next" onclick="myScroll.scrollToPage('next', 0,400,3);return false">next &rarr;</div>
</div>
<div class="clr"></div>
</div>
<ul class="cateul">
<?php
	$menuGroup = array();
	for( $i = 0 ; $i < count( $model->menus ) ; $i ++ ) {
		if( $model->menus[$i]->sm_group_id == 'default' )
			array_push( $menuGroup , $model->menus[$i]);
	}
	function menuCompare($m1, $m2){
		if( $m1->sm_index > $m2->sm_index )
			return 1;
		return -1;
	}
	usort( $menuGroup, 'menuCompare');
	for( $i = 0 ; $i < count( $menuGroup ) ; $i ++ ){
		$curMenu = $menuGroup[$i];
		?>
	<li class="li ">
        <a href="<?php echo CHtml::encode($curMenu->sm_linkurl);?>">
            <div class="menubtn">
                <div class="menuimg">
                    <img src="http://www.ansuocn.com/attachment/201309/12/119_13789916656aqT.png"
                    />
                </div>
                <div class="menutitle">
                    <?php echo CHtml::encode($curMenu->sm_title);?>
                </div>
            </div>
        </a>
    </li>
		<?php
	}
 ?>
    
    <div class="clr">
    </div>
</ul>

<script>
var count = document.getElementById("thelist").getElementsByTagName("img").length;	

for(i=0;i<count;i++){
 document.getElementById("thelist").getElementsByTagName("img").item(i).style.cssText = " width:"+document.body.clientWidth+"px";

}
document.getElementById("scroller").style.cssText = " width:"+document.body.clientWidth*count+"px";

 setInterval(function(){
myScroll.scrollToPage('next', 0,400,count);
},3500 );
window.onresize = function(){ 
for(i=0;i<count;i++){
document.getElementById("thelist").getElementsByTagName("img").item(i).style.cssText = " width:"+document.body.clientWidth+"px";
}
 document.getElementById("scroller").style.cssText = " width:"+document.body.clientWidth*count+"px";
} 

</script>

<div style="display:none"> </div>
 </body>
</html>
