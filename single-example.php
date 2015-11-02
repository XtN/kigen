<?php
/**
 * Single post template
 *
 * @package themeHandle
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

	<?php get_template_part( 'templates/partials/content', 'single-example' ); ?>

	<?php// comments_template( '', true ); ?>

<?php endwhile; // end of the loop. ?>

<?php// get_sidebar(); ?>
<?php get_footer(); ?>