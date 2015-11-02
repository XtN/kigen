<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package themeHandle
 */
?>

<div class="no-results not-found">
	<h1><?php _e( 'Nothing Found', 'themeTextDomain' ); ?></h1>

	<?php if ( is_archive() ) : ?>
	
		<p><?php _e( 'There are no published posts for this archive. Try searching using keywords instead.', 'themeTextDomain' ); ?></p>
		<?php get_search_form(); ?>

	<?php elseif ( is_search() ) : ?>

		<p><?php _e( 'No matches were found for your search terms. Please try again with different keywords.', 'themeTextDomain' ); ?></p>
		<?php get_search_form(); ?>

	<?php else : ?>

		<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps a search would help?', 'themeTextDomain' ); ?></p>
		<?php get_search_form(); ?>

	<?php endif; ?>
</div>