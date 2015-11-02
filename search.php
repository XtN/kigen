<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package themeHandle
 */

get_header(); ?>



<?php if ( have_posts() ) : ?>

	
	<h1><?php printf( __( 'Search Results for: %s', 'themeTextDomain' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
	

	<?php /* Start the Loop */ ?>
	<?php while ( have_posts() ) : the_post(); ?>

		<?php
			get_template_part( 'templates/partials/content');
		?>

	<?php endwhile; ?>

	<?php get_template_part( 'inc/pagination' ); ?>

<?php else : ?>

	<?php get_template_part( 'templates/partials/content', 'none' ); ?>

<?php endif; ?>



<?php// get_sidebar(); ?>
<?php get_footer(); ?>