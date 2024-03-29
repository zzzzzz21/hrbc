<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage HRBC株式会社

 */

get_header(); ?>

<main id="main" class="page">
	<div class="breadcrumb">
		<div class="page__wrapper">
<?php if(function_exists('bcn_display')) { bcn_display();} ?>
		</div>
	</div>
	<div class="page__body">
		<div class="page__wrapper">
			<section class="page__contents--full">
				<div class="section__body">
    				<div class="notfound__image">
        				<img src="<?php echo get_template_directory_uri(); ?>/img/notfound.png" />
    				</div>
    				<div class="notfount__text">
    					<p>お探しのページは見つかりませんでした。<br>
ページが移動または削除になった可能性があります。<br>
大変お手数をおかけしますが、トップページからお求めのページをお探しください。<br>
※このページをブックマークされていた方は、お手数ですが変更をお願いいたします。
</p>
                        <p><a href="<?php echo esc_url( home_url('/') ); ?>">&gt; トップページへ戻る</a></p>
    				</div>
				</div>
			</section>
		</div>
	</div>
	<!-- /.page__body -->
	<div class="pagetop"><a href="#top">TOP</a></div>
</main><!-- /main -->

<?php get_footer(); ?>