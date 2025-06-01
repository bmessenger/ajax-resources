<?php
/**
* An Include to register the custom taxonomies.
* It helps keep the functions file a little cleaner
**/

/* Resource Types */
add_action( 'init', 'resource_taxonomy', 0 );

function resource_taxonomy() {

	$labels = array(
			'name'              => _x( 'Types', 'taxonomy general name' ),
			'singular_name'     => _x( 'Type', 'taxonomy singular name' ),
			'search_items'      => __( 'Search Types' ),
			'all_items'         => __( 'All Types' ),
			'parent_item'       => __( 'Parent Type' ),
			'parent_item_colon' => __( 'Parent Type:' ),
			'edit_item'         => __( 'Edit Type' ),
			'update_item'       => __( 'Update Type' ),
			'add_new_item'      => __( 'Add New Type' ),
			'new_item_name'     => __( 'New Type Name' ),
			'menu_name'         => __( 'Resource Types' ),
	);

	$args = array(
			'supports'			=> array('title', 'editor'),
			'hierarchical'      => true,
			'public'			=> true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'show_in_rest' 		=> true,
			'rewrite'           => array( 'slug' => 'resource-type', 'with_front' => false ),
	);

	register_taxonomy( 'resource-type', array('resource'), $args );

}

/* Resource Tags */
add_action( 'init', 'resource_tags', 0 );

function resource_tags() {

	$labels = array(
			'name'              => _x( 'Tag', 'taxonomy general name' ),
			'singular_name'     => _x( 'Tag', 'taxonomy singular name' ),
			'search_items'      => __( 'Search Tags' ),
			'all_items'         => __( 'All Tags' ),
			'parent_item'       => __( 'Parent Tag' ),
			'parent_item_colon' => __( 'Parent Tag:' ),
			'edit_item'         => __( 'Edit Tag' ),
			'update_item'       => __( 'Update Tag' ),
			'add_new_item'      => __( 'Add New Tag' ),
			'new_item_name'     => __( 'New Tag Name' ),
			'menu_name'         => __( 'Resource Tags' ),
	);

	$args = array(
			'supports'			=> array('title', 'editor'),
			'hierarchical'      => false,
			'public'			=> true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'show_in_rest' 		=> true,
			'rewrite'           => array( 'slug' => 'resource-tag', 'with_front' => false ),
	);

	register_taxonomy( 'resource-tags', array('resource'), $args );

}

/* Industries */
add_action( 'init', 'industry_tags', 0 );

function industry_tags() {

	$labels = array(
			'name'              => _x( 'Industry', 'taxonomy general name' ),
			'singular_name'     => _x( 'Industry', 'taxonomy singular name' ),
			'search_items'      => __( 'Search Industries' ),
			'all_items'         => __( 'All Industries' ),
			'parent_item'       => __( 'Parent Industry' ),
			'parent_item_colon' => __( 'Parent Industry:' ),
			'edit_item'         => __( 'Edit Industry' ),
			'update_item'       => __( 'Update Industry' ),
			'add_new_item'      => __( 'Add New Industry' ),
			'new_item_name'     => __( 'New Industry Name' ),
			'menu_name'         => __( 'Industries' ),
	);

	$args = array(
			'supports'			=> array('title', 'editor'),
			'hierarchical'      => false,
			'public'			=> false,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => false,
			'query_var'         => true,
			'show_in_rest' 		=> true,
			'rewrite'           => array( 'slug' => 'industry-tag', 'with_front' => false ),
	);

	register_taxonomy( 'industry-tags', array('resource'), $args );

}

/* Locations */
add_action( 'init', 'location_tags', 0 );

function location_tags() {

	$labels = array(
			'name'              => _x( 'Locations', 'taxonomy general name' ),
			'singular_name'     => _x( 'Location', 'taxonomy singular name' ),
			'search_items'      => __( 'Search Locations' ),
			'all_items'         => __( 'All Locations' ),
			'parent_item'       => __( 'Parent Location' ),
			'parent_item_colon' => __( 'Parent Location:' ),
			'edit_item'         => __( 'Edit Location' ),
			'update_item'       => __( 'Update Location' ),
			'add_new_item'      => __( 'Add New Location' ),
			'new_item_name'     => __( 'New Location Name' ),
			'menu_name'         => __( 'Locations' ),
	);

	$args = array(
			'supports'			=> array('title', 'editor'),
			'hierarchical'      => false,
			'public'			=> false,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => false,
			'query_var'         => true,
			'show_in_rest' 		=> true,
			'rewrite'           => array( 'slug' => 'location-tag', 'with_front' => false ),
	);

	register_taxonomy( 'location-tags', array('resource'), $args );

}

/* Integrations */
add_action( 'init', 'integration_tags', 0 );

function integration_tags() {

	$labels = array(
			'name'              => _x( 'Integrations', 'taxonomy general name' ),
			'singular_name'     => _x( 'Integration', 'taxonomy singular name' ),
			'search_items'      => __( 'Search Integrations' ),
			'all_items'         => __( 'All Integrations' ),
			'parent_item'       => __( 'Parent Integration' ),
			'parent_item_colon' => __( 'Parent Integration:' ),
			'edit_item'         => __( 'Edit Integration' ),
			'update_item'       => __( 'Update Integration' ),
			'add_new_item'      => __( 'Add New Integration' ),
			'new_item_name'     => __( 'New Integration Name' ),
			'menu_name'         => __( 'Integrations' ),
	);

	$args = array(
			'supports'			=> array('title', 'editor'),
			'hierarchical'      => false,
			'public'			=> false,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => false,
			'query_var'         => true,
			'show_in_rest' 		=> true,
			'rewrite'           => array( 'slug' => 'integration-tag', 'with_front' => false ),
	);

	register_taxonomy( 'integration-tags', array('resource'), $args );

}