<?php
/**
 * Template Name: Blog Template
 * @package WordPress
 * @subpackage HRBC株式会社
 */
get_header(); ?>
<style type="text/css">
.w638{width:623px;
padding-right:15px;}
.pr5{padding-right:5px;
h1{height:25px;}
</style>
<div class="contents">
  <div class="area_cons">
    <h1 class="cf"><div class="w638"><span class="fl">Good &amp; New</span>　<span class="fr pr5 stamp"><img src="<?php echo get_template_directory_uri(); ?>/img/stamp.png" width=""> </span></div></h1>
    <div class="clear"></div>
    <div id="blog">
      <div class="blog-contents">
        <?php 
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$arg = array(
				'post_type' => 'post',
				'post_status'=>array('publish'),
				'showposts'=>5,
				'offset'=>0,
				'paged' => $paged,
			);
			$myposts = new WP_Query($arg);
			//query_post($arg);
			?>
        <?php $count = 0; if ( have_posts() ) : ?>
        <?php while ( $myposts->have_posts() ) : $myposts->the_post(); ?>
        <!-- BLOG POST AREA START -->
        <div class="blog-postarea">
          <div class="entry-meta">
            <h3><a href="<?php the_permalink(); ?>">
              <?php the_title(); ?>
              </a></h3>
          </div>
          <div class="entry-meta-date"><?php echo $post->post_date; ?></div>
          <div class="entry-block">
            <?php if ($count == 0){?>
            <p>
              <?php the_content();?>
            </p>
            <?php } else { ?>
            <p><?php echo mb_substr(get_the_excerpt(), 0, 100); ?></p>
            <p class="readmore"><a href="<?php the_permalink(); ?>">続きを読む&nbsp;&raquo;</a></p>
            <?php } $count ++; ?>
          </div>
        </div>
        <!-- BLOG POST AREA END -->
        
        <?php endwhile; ?>
   
      <?php endif; ?>
      <div class="pagination mb24">
        <div class="alignleft fl">
          <?php previous_posts_link( '&laquo; 前へ', $myposts->max_num_pages) ?>
        </div>
        <div class="alignright fr">
          <?php next_posts_link( '次へ &raquo;', $myposts->max_num_pages) ?>
      </div>
    </div>
  </div>
  <?php get_sidebar(); ?>
</div>
</div>
<?php get_footer(); ?>
