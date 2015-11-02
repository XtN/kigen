<?php
/**
 * Main Template File
 *
 * This file is used to display a page when nothing more specific matches a query.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package themeHandle
 */

get_header(); ?>

<section id="primary" role="main">

	<?php if ( have_posts() ) : ?>

		<?php get_template_part( 'inc/archive-header' ); ?>

		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'templates/partials/content', get_post_format() ); ?>

		<?php endwhile; ?>

		<?php get_template_part( 'inc/pagination' ); ?>

	<?php else : ?>

		<?php get_template_part( 'templates/partials/content', 'none' ); ?>

	<?php endif; ?>

</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>