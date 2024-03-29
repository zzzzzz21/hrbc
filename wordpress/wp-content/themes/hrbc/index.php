<?php get_header(index);?>
  <div id="index-header">
    <h2><img src="<?php echo get_template_directory_uri(); ?>/img/logo-index.png" /></h2>
  </div>

<div id="index-wrapper">
<div class="g_nav_index">
  <ul>
    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>/message/"><img src="<?php echo get_template_directory_uri(); ?>/img/nav-message_off.png" /></a></li>
    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>/program/"><img src="<?php echo get_template_directory_uri(); ?>/img/nav-program_off.png" /></a></li>
    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>/consultant/"><img src="<?php echo get_template_directory_uri(); ?>/img/nav-consultant_off.png" /></a></li>
    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>/company/"><img src="<?php echo get_template_directory_uri(); ?>/img/nav-company_off.png" /></a></li>
    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>/contact/"><img src="<?php echo get_template_directory_uri(); ?>/img/nav-contact_off.png" /></a></li>
    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>/blog/"><img src="<?php echo get_template_directory_uri(); ?>/img/nav-blog_off.png" /></a></li>
  </ul>
</div>
</div>
<style type="text/css">
.news-top{position:absolute;bottom:50px;left:20px;display:none;}
</style>
<div class="news-top">
<img src="http://hrbc.jp/news_201504.png" />
</div>
<?php get_footer();?>