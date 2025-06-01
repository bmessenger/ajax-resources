<?php
/**
* An Include to register the custom post types.
* It helps keep the functions file a little cleaner
**/

/**
 * Register Custom Post Types
 */

add_action( 'init', 'cpt_register_init' );

function cpt_register_init() {

	/* Resources Post Type */
	$labels = array(
		'name'               => _x( 'Resources', 'post type general name', 'website' ),
		'singular_name'      => _x( 'Resource', 'post type singular name', 'website' ),
		'menu_name'          => _x( 'Resources', 'admin menu', 'website' ),
		'name_admin_bar'     => _x( 'Resource', 'add new on admin bar', 'website' ),
		'add_new'            => _x( 'Add New', 'asset', 'website' ),
		'add_new_item'       => __( 'Add Resource', 'website' ),
		'new_item'           => __( 'New Resource', 'website' ),
		'edit_item'          => __( 'Edit Resource', 'website' ),
		'view_item'          => __( 'View Resource', 'website' ),
		'all_items'          => __( 'All Resources', 'website' ),
		'search_items'       => __( 'Search Resources', 'website' ),
		'parent_item_colon'  => __( 'Parent Resources:', 'website' ),
		'not_found'          => __( 'No Resource found.', 'website' ),
		'not_found_in_trash' => __( 'No Resources found in Trash.', 'website' )
	);

	$asset_args = array(
		'labels'             => $labels,
		'description'        => __( 'Description.', 'website' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'resource', 'with_front' => false ),
		'capability_type'    => 'post',
		'map_meta_cap'       => true,
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 21,
		'menu_icon'			 => 'dashicons-admin-tools',
		'show_in_rest' 		 => true,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail'),
	);

	register_post_type( 'resource', $asset_args );

}