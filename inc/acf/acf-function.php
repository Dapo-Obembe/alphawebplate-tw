<?php
/**
 * ACF functions and definitions
 *
 * Sets up the Advanced Custom Fields (ACF) plugin related functions.
 * This includes setting up options pages, defining custom fields and related features.
 *
 * @package AlphaWebConsult
 */
if(!defined('ABSPATH')) exit;
/**
 * Add the ACF options page.
 */
if ( function_exists( 'acf_add_options_page' ) ) {
	acf_add_options_page( array(
		'page_title'  => 'Website Settings', // Title displayed on the options page.
		'menu_title'  => 'Website Settings', // Title displayed in the WordPress admin menu.
		'menu_slug'   => 'theme-settings', // The slug for the menu item.
		'capability'  => 'manage_options', // Capability required to access the page.
		'redirect'    => false,            // Keep the user on the same page after saving.
        'position'     => 60
	) );
}

/**
 * Save ACF JSON directly into the acf-json/ folder.
 */
add_filter('acf/settings/save_json', function( $path ) {
    // Save ACF JSON files in the specified directory.
    $path = get_stylesheet_directory() . '/acf-json';
    return $path;
});

add_filter('acf/settings/load_json', function( $paths ) {
    // Load ACF JSON files from the specified directory.
    $paths[] = get_stylesheet_directory() . '/acf-json';
    return $paths;
});


/**
 * AWC Blocks registration.
 */
function awc_block_registration(){
    $blocks_dir = get_stylesheet_directory() . '/acf-blocks/';
    $block_folders = glob($blocks_dir . '*', GLOB_ONLYDIR);


    foreach ($block_folders as $block_path) {
        if (file_exists($block_path . '/block.json')) {
            register_block_type($block_path);
        }
    }
}
add_action( 'acf/init', 'awc_block_registration' );

/**
 * Register the Blocks Style and Script
 * 
 * NOTE: Register the script and Style here and use them in the
 * block.json of the each block. Check the example block.
 */
function register_script_for_block(){
    
    // Register Swiper assets once, so any block can declare them as a dependency.
    wp_register_style( 'swiper-style', get_stylesheet_directory_uri() . '/assets/swiperjs/swiper-bundle.min.css', array(), null );
    wp_register_script( 'swiper-script', get_stylesheet_directory_uri() . '/assets/swiperjs/swiper-bundle.min.js', array(), null, true );

    // Check if we are local environment.
    $is_local = wp_get_environment_type() === 'local';

    // Register Tailwind based on the environment.
    $path = $is_local ? get_stylesheet_directory() . '/assets/css/output.css' : get_stylesheet_directory() . 'dist/css/tailwind.css';
    $uri = $is_local ? get_stylesheet_directory_uri() . '/assets/css/output.css' : get_stylesheet_directory_uri() . 'dist/css/tailwind.css';

    if ( file_exists( $path ) ) {
        wp_register_style(
            'awc-tailwind-style',
            $uri,
            array(),
            filemtime( $path ),
            'all'
        );

    } 
     
    $blocks_dir = get_stylesheet_directory() . '/acf-blocks/';
    $blocks_uri = get_stylesheet_directory_uri() . '/acf-blocks/';

    // Find all subdirectories inside awc-blocks/
    $block_folders = glob($blocks_dir . '*', GLOB_ONLYDIR);

    foreach( $block_folders as $block_path ) {
        $block_name = basename($block_path);

        $script_path = $blocks_dir . "{$block_name}/script.js";
        $script_uri  = $blocks_uri . "{$block_name}/script.js";

        if( file_exists( $script_path ) ) {
            $script_handle = $block_name . '-script';
            
            wp_register_script(
                $script_handle, 
                $script_uri, 
                array('swiper-script'),  
                filemtime( $script_path), 
                true 
            );
        }
    }
	
}
add_action( 'wp_enqueue_scripts', 'register_script_for_block');
add_action( 'admin_enqueue_scripts', 'register_script_for_block');