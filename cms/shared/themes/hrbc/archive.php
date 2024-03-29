<?php
/**
 *
 * @package WordPress
 * @subpackage HRBC株式会社
 */

get_header();

?>
<?php
$issday = 0;
$ismonth = 0;
$isyear = 0;
if (is_day())
	$isday = 1;
else if (is_month())
	$ismonth = 1;
else if (is_year())
	$isyear = 1;
?>

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
	<div class="page__body">
		<section class="page__wrapper">
			<h1 class="section__title">HRBC株式会社のコンサルタントによる<br>ほぼ週刊不定期ブログです。</h1>
			<div class="page__contents">
                <?php if ( have_posts() ) : ?>
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
    					<?php the_excerpt(); ?>
					</div>
					<div class="entry__foot">
    					<a href="<?php the_permalink(); ?>" class="entry__more">続きを読む&nbsp;&raquo;</a>
    					<?php #cat_list(); ?>
					</div>
				</article>
				<?php endwhile; endif; ?>
<?php global $wp_query;?>
<nav class="pager">
<?php previous_posts_link( '&laquo;&nbsp;前へ', $wp_query->max_num_pages) ?>
<?php next_posts_link( '次へ&nbsp;&raquo;', $wp_query->max_num_pages) ?>
</nav>
			</div>
 		  <?php get_sidebar(); ?>
		</section>
	</div>
	<div class="pagetop"><a href="#top">TOP</a></div>
</main>
<?php get_footer(); ?>
