<?php
/**
 *
 * @package HRBC株式会社
 */
?>
<!doctype html>
<!--[if IE 9 ]>
<html id="top" class="lt-ie10" lang="ja" dir="ltr">
<![endif]-->
<!--[if (gte IE 10)|!(IE)]><!-->
<html id="top" lang="ja" dir="ltr">
<!--<![endif]-->
<head<?php head_attr(); ?>>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<meta name="discription" content="<?php bloginfo( 'description' ); ?>">
<meta name="revisit-after" content="2 days">
<meta name="mssmarttagspreventparsing" content="true">
<meta name="jajah" content="disable firefox extension">
<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
<meta name="msapplication-config" content="browserconfig.xml">
<title><?php wp_title(); ?></title>
<link rel="icon" href="/favicon.ico">
<link rel="icon" sizes="192x192" href="/common/img/apple-touch-icon.png">
<link rel="apple-touch-icon" href="/common/img/apple-touch-icon.png">
<link rel="stylesheet" href="/common/js/fullpage/jquery.fullpage.min.css" media="all">
<link rel="stylesheet" href="/common/css/common.css?20220130" media="all">
<!--[if lte IE 9]>
<link rel="stylesheet" href="/common/css/animations-ie-fix.css">
<![endif]-->
<!--[if lte IE 8]>
<script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv-printshiv.min.js"></script>
<![endif]-->
<meta name="keywords" content="HRBC,HRBC株式会社,コンサルティング,人財開発,エイチアールビーシー株式会社">
<?php wp_head(); ?>
<script src="/common/js/head.js"></script>
<?php include get_template_directory().'/inc/gtag.php'; ?>
</head>
<body <?php body_class(); ?>>
<header id="header" class="clearfix">
<h1><a href="/"><img src="/common/img/header-logo.png" alt="HRBC Human Resource Brain Consulting"></a></h1>
<div id="js-menuBtn" class="menu-btn">
  <span></span>
  <span></span>
  <span></span>
</div>
<nav class="gnav">
<?php
wp_nav_menu(array(
    'theme_location' => 'primary',
    'container' => null,
    'items_wrap' => '<ul>%3$s</ul>',
    'link_before' => '<span>',
    'link_after' => '</span>',
    'walker' => new GlobalNavi_Nav_Menu
));
?>
<?php /*
<ul>
<li><a href="/#message">Message<span>メッセージ</span></a></li>
<li><a href="/#program">Program<span>プログラム</span></a></li>
<li><a href="/#consultants">Consultants<span>講師紹介</span></a></li>
<li><a href="/#company">Company<span>会社案内</span></a></li>
<li><a href="/contact/">Contact<span>お問い合わせ</span></a></li>
<li><a href="/blog/">Blog<span>ほぼ週刊ブログ</span></a></li>
</ul> */ ?>
</nav>
</header>

