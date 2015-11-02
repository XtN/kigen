<?php
/**
 * The header template
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package themeHandle
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	
	<link rel="shortcut icon" href="<?php echo bloginfo('template_url'); ?>/dist/images/favicon.ico" type="image/x-icon">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<?php // Lets other plugins and files tie into our theme's <head>:
		wp_head(); 
	?>

	<!--[if lt IE 9]>
		<link rel='stylesheet' id='ie-legacy'  href='<?php echo bloginfo('template_url'); ?>/dist/styles/ie-legacy.min.css?ver=1.0.0' type='text/css' />
		<script src='<?php echo bloginfo('template_url'); ?>/dist/scripts/app-legacy-head.min.js' type='text/javascript'></script>
	<![endif]-->

</head>
 
<body>
	<div class="container">
		<header role="banner">            			
			<nav id="site-navigation" class="navbar navbar-default navbar-fixed-top" role="navigation">
			  <div class="container">  
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-navbar-collapse">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			      <a class="navbar-brand" href="<?php echo esc_url( home_url() ); ?>">
			      	<?php bloginfo( 'name' ); ?>
			      	<!-- <img src="<?php echo get_template_directory_uri(); ?>/dist/images/logo.png" alt="<?php bloginfo('name'); ?>"> -->
		      	</a>
			    </div>
			  <!--<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', '_s' ); ?></a>-->
			  
			  <?php wp_nav_menu( array( 
			  	'theme_location' 	  => 'primary',
			  	'container' 		    => 'div',
			  	'container_class' 	=> 'collapse navbar-collapse',
			  	'container_id'    	=> 'main-navbar-collapse',
			  	'menu_class'      	=> 'nav navbar-nav',
			  	'menu_id'         	=> '',
			  	'echo'            	=> true,
			  	'fallback_cb'     	=> 'wp_page_menu',
			  	'before'          	=> '',
			  	'after'           	=> '',
			  	'link_before'     	=> '',
			  	'link_after'      	=> '',
			  	'items_wrap'      	=> '<ul id="%1$s" class="%2$s">%3$s</ul>',
			  	'depth'           	=> 2,
			  	'walker'          	=> ''
			    )); ?>
			  </div>
			</nav>
		
		</header>


		<div id="main" role="main">