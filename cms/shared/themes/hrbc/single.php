<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage HRBC株式会社

 */

get_header(); ?>

<main id="main" class="page">
	<header class="page__head">
		<div class="page__wrapper">
			<h1 class="page__title" title="Good & New"><a href="<?php echo esc_url( home_url('/blog/') ); ?>">Good & New</a></h1>
		</div>
	</header>
	<div class="breadcrumb">
		<div class="page__wrapper">
<?php if(function_exists('bcn_display')) { bcn_display();} ?>
		</div>
	</div>
<!--
<?php var_dump(is_single()); ?>
-->
	<div class="page__body">
		<section class="page__wrapper">
			<h1 class="section__title">HRBC株式会社のコンサルタントによる<br>ほぼ週刊不定期ブログです。</h1>
			<div class="page__contents">
			<?php if(have_posts()): ?>
               <?php while ( have_posts() ) : the_post(); ?>
				<article class="entry">
					<div class="entry__head">
						<h1 class="entry__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
						<div class="entry__meta">
							<time class="entry__meta--time" datetime="<?php the_time('c'); ?>"><?php the_time('Y-m-d H:i:s'); ?></time>
							<?php cat_list(); ?>
						</div>
					</div>
					<div class="entry__body">
                    <?php the_content( __( '', 'twentytwelve' ) ); ?>
					</div>
				</article>
				<?php endwhile; ?>
				<!-- /.entry -->
				<nav class="pager">
<?php
if(get_previous_post()):
    previous_post_link_t(12, '%link', '&laquo;&nbsp;%title');
endif;
if(get_next_post()):
    next_post_link_t(12, '%link', '%title&nbsp;&raquo;');
endif;
?>
				</nav>
			<?php endif; ?>
			</div>
			<!-- /.page__contents -->
            <?php get_sidebar(); ?>
		</section>
	</div>
	<div class="pagetop"><a href="#top">TOP</a></div>
</main>
<?php get_footer(); ?>
