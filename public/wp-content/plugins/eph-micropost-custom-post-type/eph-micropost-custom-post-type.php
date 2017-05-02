<?php
/*
Plugin Name: Micropost - by Evan Hildreth
Plugin URI: http://eph.me/eph-micropost-custom-post-type
Description: A custom post type for short-form blogging. Designed to tie into <a href="http://micro.blog/">Micro.blog</a>.
Author: Evan Hildreth
Version: 1.0
Author URI: http://eph.me/
*/

// Register Custom Post Type
function eph_micropost_initialize() {

	$labels = array(
		'name'                  => _x( 'Microposts', 'Post Type General Name', 'eph' ),
		'singular_name'         => _x( 'Micropost', 'Post Type Singular Name', 'eph' ),
		'menu_name'             => __( 'Microposts', 'eph' ),
		'name_admin_bar'        => __( 'Micropost', 'eph' ),
		'archives'              => __( 'Micropost Archives', 'eph' ),
		'attributes'            => __( 'Micropost Attributes', 'eph' ),
		'parent_item_colon'     => __( 'Parent Micropost:', 'eph' ),
		'all_items'             => __( 'All Microposts', 'eph' ),
		'add_new_item'          => __( 'Add New Micropost', 'eph' ),
		'add_new'               => __( 'Add New', 'eph' ),
		'new_item'              => __( 'New Micropost', 'eph' ),
		'edit_item'             => __( 'Edit Micropost', 'eph' ),
		'update_item'           => __( 'Update Micropost', 'eph' ),
		'view_item'             => __( 'View Micropost', 'eph' ),
		'view_items'            => __( 'View Microposts', 'eph' ),
		'search_items'          => __( 'Search Micropost', 'eph' ),
		'not_found'             => __( 'Not found', 'eph' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'eph' ),
		'featured_image'        => __( 'Featured Image', 'eph' ),
		'set_featured_image'    => __( 'Set featured image', 'eph' ),
		'remove_featured_image' => __( 'Remove featured image', 'eph' ),
		'use_featured_image'    => __( 'Use as featured image', 'eph' ),
		'insert_into_item'      => __( 'Insert into micropost', 'eph' ),
		'uploaded_to_this_item' => __( 'Uploaded to this micropost', 'eph' ),
		'items_list'            => __( 'Microposts list', 'eph' ),
		'items_list_navigation' => __( 'Microposts list navigation', 'eph' ),
		'filter_items_list'     => __( 'Filter microposts list', 'eph' ),
	);
	$rewrite = array(
		'slug'                  => 'status',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Micropost', 'eph' ),
		'description'           => __( 'A short post for microblogging', 'eph' ),
		'labels'                => $labels,
		'supports'              => array( 'excerpt', 'author', 'revisions', 'custom-fields', ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-format-chat',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => 'status',
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'post',
		'show_in_rest'          => true,
	);
	register_post_type( 'eph_micropost', $args );

}
add_action( 'init', 'eph_micropost_initialize', 0 );