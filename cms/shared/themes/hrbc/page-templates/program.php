<?php
/**
 * Template Name: program Template
 * @package WordPress
 * @subpackage HRBC株式会社
 */
get_header(); ?>
<?php
$page_id = 8;    //固定ページIDを入力
$content = get_page($page_id);
echo $content->post_content;
?>
<?php get_footer(); ?>
