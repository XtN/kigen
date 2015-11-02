<?php
/**
 * The default template for displaying content
 *
 * @package themeHandle
 */
?>

<div>
	<header class="result-header">
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'themeTextDomain' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h2>
	</header>

	<div class="result-main">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'themeTextDomain' ) . '</span>', 'after' => '</div>' ) ); ?>
	</div>

	<footer class="result-footer">
		
		<?php the_tags( '<div class="post-tags">' . __( 'Tagged: ', 'themeTextDomain' ) , ', ', '</div>' ); ?>
		
	</footer>
</div>
<hr />