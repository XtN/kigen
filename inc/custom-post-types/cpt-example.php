<?php 
/**
 * Custom Post Type Sample - Examples
 *
 * @package themeHandle
 */

function cpt_sample() {

	// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => _x( 'Examples', 'Post Type General Name', 'themeTextDomain' ),
		'singular_name'       => _x( 'Example', 'Post Type Singular Name', 'themeTextDomain' ),
		'menu_name'           => __( 'Examples', 'themeTextDomain' ),
		'parent_item_colon'   => __( 'Parent Example', 'themeTextDomain' ),
		'all_items'           => __( 'All Examples', 'themeTextDomain' ),
		'view_item'           => __( 'View Example', 'themeTextDomain' ),
		'add_new_item'        => __( 'Add New Example', 'themeTextDomain' ),
		'add_new'             => __( 'Add New', 'themeTextDomain' ),
		'edit_item'           => __( 'Edit Example', 'themeTextDomain' ),
		'update_item'         => __( 'Update Example', 'themeTextDomain' ),
		'search_items'        => __( 'Search Example', 'themeTextDomain' ),
		'not_found'           => __( 'Not Found', 'themeTextDomain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'themeTextDomain' ),
	);
	
	// Set other options for Custom Post Type
	$args = array(
		'label'               => __( 'Examples', 'themeTextDomain' ),
		'description'         => __( 'Example news and reviews', 'themeTextDomain' ),
		'labels'              => $labels,
		// Features this CPT supports in Post Editor
		'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'revisions' ),
		// You can associate this CPT with a taxonomy or custom taxonomy. 
		'taxonomies'          => array( 'genres' ),
		/* A hierarchical CPT is like Pages and can have
		* Parent and child items. A non-hierarchical CPT
		* is like Posts.
		*/	
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	
	// Registering your Custom Post Type
	register_post_type( 'example', $args );

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/

add_action( 'init', 'cpt_sample', 0 );
?>