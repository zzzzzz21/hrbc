<?php
/**
 * Template Name: Blog Template
 * @package WordPress
 * @subpackage HRBC株式会社
 */
get_header(); ?>

<main id="main" class="page">
	<header class="page__head">
		<div class="page__wrapper">
			<h1 class="page__title" title="Good & New"><a href="<?php echo esc_url( home_url('/good-new/') ); ?>">Good & New</a></h1>
		</div>
	</header>
	<div class="breadcrumb">
		<div class="page__wrapper">
<?php if(function_exists('bcn_display')) { bcn_display();} ?>
		</div>
	</div>
	<div class="page__body">
		<div class="page__background">
    		<div class="bg-am"></div>
    		<div class="bg-pm"></div>
    		<div class="bg-night"></div>
		</div>
		<section class="page__wrapper">
			<?php /*<h1 class="section__title">HRBC株式会社のコンサルタントによる<br>ほぼ週刊不定期ブログです。</h1>*/ ?>
			<div class="page__contents">
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
				<article class="entry">
					<div class="entry__head">
						<h1 class="entry__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
						<div class="entry__meta">
							<time class="entry__meta--time" datetime="<?php the_time('c'); ?>"><?php the_time('Y-m-d H:i:s'); ?></time>
							<?php cat_list(); ?>
						</div>
					</div>
					<div class="entry__body">
    					<?php
        				if($count === 0) {
            				the_content();
        				} else {
            				the_excerpt();
        				}
    					?>
					</div>
					<?php if($count > 0): ?>
					<div class="entry__foot">
    					<a href="<?php the_permalink(); ?>" class="entry__more">続きを読む&nbsp;&raquo;</a>
    					<?php #cat_list(); ?>
					</div>
					<?php endif; ?>
				</article>
				<?php $count++; endwhile; endif; ?>
				<!-- /.entry -->
<?php global $wp_query;?>
<nav class="pager">
    <div class="prev" style="float: left;"><?php previous_posts_link( '&laquo;&nbsp;前へ', $myposts->max_num_pages) ?></div>
    <div class="next" style="text-align: right;"><?php next_posts_link( '次へ&nbsp;&raquo;', $myposts->max_num_pages) ?></div>
</nav>
			</div>
			<!-- /.page__contents -->
			<?php get_sidebar(); ?>
		</section>
	</div>
	<!-- /.page__body -->
	<div class="pagetop"><a href="#top">TOP</a></div>
</main>
<?php get_footer(); ?>
