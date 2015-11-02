<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package themeHandle
 */
?>

	</div>

	<footer role="contentinfo">
		<nav class="navbar navbar-default navbar-fixed-bottom">
			<div class="container text-center">
				<div class="footer-copyright">
					&copy; <?php echo date( 'Y' ); echo '&nbsp;'; echo bloginfo( 'name' ); ?>
					Site by <a href="designerURI" target="_blank" rel="nofollow">themeDesigner</a> &amp;
					<a href="authorURI" target="_blank" rel="nofollow">themeAuthor</a>
				</div>
			</div>
	</nav>
</div>

<?php wp_footer(); ?>

<!--[if lte IE 9]>
	<script src='<?php echo bloginfo('template_url');?>/dist/scripts/app-legacy-footer.min.js' type='text/javascript'></script>
<![endif]-->

</body>
</html>