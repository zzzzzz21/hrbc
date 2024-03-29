<?php
/**

 *
 * @package WordPress
 * @subpackage HRBC株式会社

 */

get_header(); ?>


			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
				<?php comments_template( '', true ); ?>
			<?php endwhile; // end of the loop. ?>



<?php #get_sidebar(); ?>
<?php get_footer(); ?>