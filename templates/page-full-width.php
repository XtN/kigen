<?php
/**
 * _emplate Name: Full Width Page
 *
 * @package themeHandle
 */

get_header(); ?>

<section id="primary" class="full-width" role="main">

	<?php while ( have_posts() ) : the_post(); ?>
	
		<?php get_template_part( 'templates/partials/content', 'page' ); ?>
	
	<?php endwhile; // end of the loop. ?>

</section>

<?php get_footer(); ?>