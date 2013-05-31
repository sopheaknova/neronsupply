<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>" />
<meta name="google-site-verification" content="xvTpKiGIfucQuAtSBFD2h2oYfE77LXQmhB8Ei1K4vIc" />
<title>
	<?php if(is_home() ) { bloginfo('name'); ?> | <?php bloginfo('description'); } ?>
	<?php if(is_single() || is_page() || is_archive() || is_tag() || is_category() ) { wp_title('',true); ?> | <?php bloginfo('name'); } ?>
    <?php if(is_404()) { ?> Product not found | <?php bloginfo('name'); } ?>
    <?php if(is_search()) { ?>Search Result <?php echo wp_specialchars($s, 1); ?> | <?php bloginfo('name'); } ?>	
</title>
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<style type="text/css">
	@import "<?php bloginfo('template_url'); ?>/styles/uibase.css";
	@import "<?php bloginfo('template_url'); ?>/styles/colorbox.css";
	@import "<?php bloginfo('template_url'); ?>/styles/jslidernews.css";
</style>

<script src="<?php bloginfo('template_url'); ?>/js/jquery-1.4.2.min.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_url'); ?>/js/jquery.colorbox-min.js" type="text/javascript"></script>
<script language="javascript" type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.easing.js"></script>
<script language="javascript" type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jslidernews.js"></script>
<script language="javascript" type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/custom.js"></script>

<script type="text/javascript">
<?php if ( is_home() || is_page()) : ?>

$(document).ready(function(){
	
	ddsmoothmenu.init({
		mainmenuid: "menu-bar", //menu DIV id
		orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
		classname: 'ddsmoothmenu', //class added to menu's outer DIV
		//customtheme: ["#1c5a80", "#18374a"],
		contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
	});

});
<?php else : ?>

$(document).ready(function(){

	ddsmoothmenu.init({
		mainmenuid: "menu-left-glove", //menu DIV id
		orientation: 'v', //Horizontal or vertical menu: Set to "h" or "v"
		classname: 'ddsmoothmenuleftglove', //class added to menu's outer DIV
		//customtheme: ["#1c5a80", "#18374a"],
		contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
	});
	
	ddsmoothmenu.init({
		mainmenuid: "menu-bar", //menu DIV id
		orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
		classname: 'ddsmoothmenu', //class added to menu's outer DIV
		//customtheme: ["#1c5a80", "#18374a"],
		contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
	});
	
});	
<?php endif ?>
</script>


<?php wp_head(); ?>
</head>

<body>
<!--start wrap-->
<div id="wrap">

	<!--star header-->
    <div id="header">
    	
        <div id="logo">
        <h1><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/logo.jpg" alt="Neron Supply" /></a></h1>
        </div>
        
        <!--start newsletter and social network-->
    	<div id="header-right">        
        <form name="newsletter" action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=NeronSupply', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
            <label>Sign Up Our Newsletter</label><input name="email" type="text" class="email-txt" />
            <input type="hidden" value="NeronSupply" name="uri"/><input type="hidden" name="loc" value="en_US"/><input type="submit" value="Subscribe" />
            <input name="submit" type="submit" class="email-btn" />                
        </form>    
        
            <div class="call-support">
            	<!--<a href="#"><img src="/images/feed.png" alt="rss feed" /></a>
                <a href="#"><img src="/images/facebook.png" alt="facebook" /></a>
                <a href="#"><img src="/images/twitter.png" alt="twitter" /></a> -->
                <strong>24/7 Sale &amp; Support <span>1 (562) 366-0790</span></strong>
            </div>
        </div>
        <!--/newseltter and social network-->
        <div class="clear"></div>
    </div>
    <!--/header-->
    
    <!--start menu-->
    <div id="menu-bar" class="ddsmoothmenu">
        <ul>
            <li class="<?php if ( is_home() ) { ?>current_page_item selected<?php } ?>"><a href="<?php echo get_option('home'); ?>/">Home</a></li>
            <?php wp_list_categories('exclude=1,63&title_li='); ?>
            <?php wp_list_pages('sort_column=menu_order&title_li='); ?>
            <div class="clear"></div>
        </ul>
        <?php include (TEMPLATEPATH . '/searchform.php'); ?>        	        
        <div class="clear"></div>
    </div>
    <!--/menu-->