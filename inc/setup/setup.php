<?php
/**
 * Theme setup files.
 */
if(!defined('ABSPATH')) exit;

// Adds theme support for post formats.
if ( ! function_exists( 'awc_tw_plate_setup' ) ) :

	/* Add theme support for title tag
	*/
    add_theme_support( 'title-tag' );
	/**
	 * Adds theme support for post formats.
	 *
	 * @since AWC TW Plate 1.0
	 *
	 * @return void
	 */
	function awc_tw_plate_setup() {
		add_theme_support( 'post-formats', array( 'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video' ) );
	}

	/**
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// Register navigation menus.
	register_nav_menus(
		array(
			'primary' => esc_html__( 'Primary Menu', 'alphawebplate-tw' ),
			'footer'  => esc_html__( 'Footer Menu', 'alphawebplate-tw' ),
		)
	);

	/**
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

	// Custom logo support.
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 500,
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => array( 'site-title', 'site-description' ),
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Gutenberg support for full-width/wide alignment of supported blocks.
	add_theme_support( 'align-wide' );

	// Gutenberg defaults for font sizes.
	add_theme_support(
		'editor-font-sizes',
		array(
			array(
				'name' => __( 'Small', 'alphawebplate-tw' ),
				'size' => 12,
				'slug' => 'small',
			),
			array(
				'name' => __( 'Normal', 'alphawebplate-tw' ),
				'size' => 16,
				'slug' => 'normal',
			),
			array(
				'name' => __( 'Large', 'alphawebplate-tw' ),
				'size' => 36,
				'slug' => 'large',
			),
			array(
				'name' => __( 'Huge', 'alphawebplate-tw' ),
				'size' => 50,
				'slug' => 'huge',
			),
		)
	);

	// Gutenberg responsive embed support.
	add_theme_support( 'responsive-embeds' );

endif;
add_action( 'after_setup_theme', 'awc_tw_plate_setup' );