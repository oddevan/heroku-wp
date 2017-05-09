<?php
/*
Plugin Name: CCDB Suite
Plugin URI: http://eph.me/cordcutdb
Description: Custom post types, taxonomies, and custom fields to enable Cordcut DB.
Author: Evan Hildreth
Version: 1.0
Author URI: http://eph.me/
*/

// Register Custom Post Type
function eph_ccdb_service_initposttype() {

	$labels = array(
		'name'                  => _x( 'Services', 'Post Type General Name', 'eph' ),
		'singular_name'         => _x( 'Service', 'Post Type Singular Name', 'eph' ),
		'menu_name'             => __( 'Services', 'eph' ),
		'name_admin_bar'        => __( 'Service', 'eph' ),
		'archives'              => __( 'Service Archives', 'eph' ),
		'attributes'            => __( 'Service Attributes', 'eph' ),
		'parent_item_colon'     => __( 'Parent Service:', 'eph' ),
		'all_items'             => __( 'All Services', 'eph' ),
		'add_new_item'          => __( 'Add New Service', 'eph' ),
		'add_new'               => __( 'Add New', 'eph' ),
		'new_item'              => __( 'New Service', 'eph' ),
		'edit_item'             => __( 'Edit Service', 'eph' ),
		'update_item'           => __( 'Update Service', 'eph' ),
		'view_item'             => __( 'View Service', 'eph' ),
		'view_items'            => __( 'View Services', 'eph' ),
		'search_items'          => __( 'Search Service', 'eph' ),
		'not_found'             => __( 'Not found', 'eph' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'eph' ),
		'featured_image'        => __( 'Featured Image', 'eph' ),
		'set_featured_image'    => __( 'Set featured image', 'eph' ),
		'remove_featured_image' => __( 'Remove featured image', 'eph' ),
		'use_featured_image'    => __( 'Use as featured image', 'eph' ),
		'insert_into_item'      => __( 'Insert into service', 'eph' ),
		'uploaded_to_this_item' => __( 'Uploaded to this service', 'eph' ),
		'items_list'            => __( 'Services list', 'eph' ),
		'items_list_navigation' => __( 'Services list navigation', 'eph' ),
		'filter_items_list'     => __( 'Filter services list', 'eph' ),
	);
	$rewrite = array(
		'slug'                  => 'services',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Service', 'eph' ),
		'description'           => __( 'Cordcutting service; child pages are higher tiers of service', 'eph' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields', 'page-attributes', ),
		'taxonomies'            => array( 'eph_ccdb_channel' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-video-alt3',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => 'services',
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'eph_ccdb_service', $args );

}
add_action( 'init', 'eph_ccdb_service_initposttype', 0 );

// Register Custom Taxonomy
function eph_ccdb_channel_generatetaxonomy() {

	$labels = array(
		'name'                       => _x( 'Channels', 'Taxonomy General Name', 'eph' ),
		'singular_name'              => _x( 'Channel', 'Taxonomy Singular Name', 'eph' ),
		'menu_name'                  => __( 'Channel', 'eph' ),
		'all_items'                  => __( 'All Channels', 'eph' ),
		'parent_item'                => __( 'Parent Channel', 'eph' ),
		'parent_item_colon'          => __( 'Parent Channel:', 'eph' ),
		'new_item_name'              => __( 'New Channel', 'eph' ),
		'add_new_item'               => __( 'Add New Channel', 'eph' ),
		'edit_item'                  => __( 'Edit Channel', 'eph' ),
		'update_item'                => __( 'Update Channel', 'eph' ),
		'view_item'                  => __( 'View Channel', 'eph' ),
		'separate_items_with_commas' => __( 'Separate channels with commas', 'eph' ),
		'add_or_remove_items'        => __( 'Add or remove channels', 'eph' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'eph' ),
		'popular_items'              => __( 'Popular Channels', 'eph' ),
		'search_items'               => __( 'Search Channels', 'eph' ),
		'not_found'                  => __( 'Not Found', 'eph' ),
		'no_terms'                   => __( 'No channels', 'eph' ),
		'items_list'                 => __( 'Channels list', 'eph' ),
		'items_list_navigation'      => __( 'Channels list navigation', 'eph' ),
	);
	$rewrite = array(
		'slug'                       => 'channels',
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
		'rewrite'                    => $rewrite,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'eph_ccdb_channel', array( 'eph_ccdb_service' ), $args );

}
add_action( 'init', 'eph_ccdb_channel_generatetaxonomy', 0 );