<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package themeHandle
 */

get_header(); ?>

<div class="404">
	<h1><?php _e( 'Uh oh!', 'themeTextDomain' ); ?></h1>	
	<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for.', 'themeTextDomain' ); ?></p>

	<?php get_search_form(); ?>

</div>

<?php get_footer(); ?>