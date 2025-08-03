<?php
/**
 * Register project CPT.
 * 
 * @package AlphaWebConsult
 * @since 1.0.0
 */

if(!defined('ABSPATH')) exit;

/**
 * This function registers the Custom Project Post type.
 */
function projects_post_types() {
	register_post_type(
		'project',
		array(
			'supports'     => array( 'title', 'editor', 'thumbnail' ),
			'public'       => true,
			'show_in_rest' => true,
			'menu_icon'    => 'dashicons-businessman',
			'has_archive'  => true,
			'rewrite'      => array( 'slug' => 'project', 'with_front' => false ),
			'has_category' => true,
			'taxonomies'   => array( 'post_tag' ),
			'labels'       => array(
				'name'          => 'Projects',
				'add_new_item'  => 'Add New Project',
				'edit_item'     => 'Edit Project',
				'all_items'     => 'All Projects',
				'singular_name' => 'Project',
			),

		)
	);
}
add_action( 'init', 'projects_post_types' );