<?php
/**
 *
 * @package HRBC株式会社
 */
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html prefix="og: http://ogp.me/ns#">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<meta property="og:title" content="<?php bloginfo('name'); ?>">
	<meta property="og:type" content="website">
    <meta property="og:locale" content="ja_JP">
	<meta property="og:description" content="<?php bloginfo( 'description' ); ?>">
	<meta property="og:url" content="<?php the_permalink() ?>"/>
	<meta property="og:image" content="http://hrbc.jp/wordpress/wp-content/themes/hrbc/img/1.jpg">
	<meta property="og:site_name" content="<?php bloginfo('name'); ?>">







	

	<meta name="keywords" content="HRBC,HRBC株式会社,コンサルティング,人財開発,エイチアールビーシー株式会社,">
	<meta name="discription" content="<?php bloginfo( 'description' ); ?>">
    <meta name="revisit-after" content="2 days">
    <meta name="mssmarttagspreventparsing" content="true">
    <meta name="jajah" content="disable firefox extension">
    <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.ico" type="image/vnd.microsoft.icon">
	<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.ico" type="image/vnd.microsoft.icon">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/common.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/header.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/g_nav.css"/>
    <!--
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/top_focus_area.css"/>
	-->
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/contents.css"/>
	
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/footer.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/mailform.css"/>
    <!--
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/jquery.slider.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/lightbox.css"/>
	-->
    
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.smoothScroll.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.tile.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.toggleElements.js"></script>

    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/selectivizr.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/default.js"></script>
    
	<!--[if (gte IE 6)&(lte IE 8)]>
	  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/selectivizr.js"></script>
	<![endif]-->

	<!-- Google Analytics -->
	<!-- Google Analytics -->
	<script>
		$(function(){
			$(".logo,.index_nav li,.g_nav ul li,.circle1,.circle2,.circle3,.circle4").click(function(){
				window.location=$(this).find("a").attr("href");
				return false;
			});
		});
		$('.circlebox').children().hover(function() {
        $(this).siblings().stop().fadeTo(300, 0.3);
    }, function() {
        $(this).siblings().stop().fadeTo(300, 1);
    });
	</script>

	<script type="text/javascript">
	$(function(){
		$('a[href^=#]').click(function(){
			var speed = 800;
			var href= $(this).attr("href");
			var target = $(href == "#" || href == "" ? 'html' : href);
			var position = target.offset().top;
			$("html, body").animate({scrollTop:position}, speed, "swing");
			return false;
		});
	});
	</script>

	<script type="text/javascript">
		$(window).load(function() {
		　　$(".form_area dt,.form_area dd").tile(2);
		});
	</script>

<!-- fancyBox  -->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/source/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/source/jquery.fancybox.css?v=2.1.5" media="screen" />
<script type="text/javascript">
    $(document).ready(function() {
        
        $('.fancybox').fancybox();
        $("#fancybox-manual-b").click(function() {
            $.fancybox.open({
                href : '<?php echo get_template_directory_uri(); ?>/map.html',
                type : 'iframe',
                padding : 5
            });
        });

    });
</script>	
<style type="text/css">
.fancybox-overlay {z-index: 1000000000000000000000000000000000000000000000000000000000;}
</style>	
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-49442955-1', 'hrbc.jp');
  ga('require', 'displayfeatures');
  ga('send', 'pageview');

</script>
</head>
<script type="text/javascript">
		t = new Date();
		hours = parseInt(t.getHours());
		if (hours >= 8 && hours <= 16)
			document.write("<body name=\"myForm\" id=\"daytime\">");
		else
			document.write("<body name=\"myForm\" id=\"nighttime\">");
</script>
	<div class="wrap">
		<div class="header">
			<div class="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">HRBC株式会社</a></div>
			<div class="right_area"></div>
		</div>


<div class="g_nav">
	<ul>
    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>/message/"><img src="<?php echo get_template_directory_uri(); ?>/img/nav-message_off.png" /></a></li>
    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>/program/"><img src="<?php echo get_template_directory_uri(); ?>/img/nav-program_off.png" /></a></li>
    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>/consultant/"><img src="<?php echo get_template_directory_uri(); ?>/img/nav-consultant_off.png" /></a></li>
    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>/company/"><img src="<?php echo get_template_directory_uri(); ?>/img/nav-company_off.png" /></a></li>
    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>/contact/"><img src="<?php echo get_template_directory_uri(); ?>/img/nav-contact_off.png" /></a></li>
    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>/blog/"><img src="<?php echo get_template_directory_uri(); ?>/img/nav-blog_off.png" /></a></li>
	</ul>
</div>


