<?php
/**
 * Functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package AlphaWebConsult
 * @since 1.0
 */

if(!defined('ABSPATH')) exit;

/**
 * This function includes all the files inside the inc/.
 *
 * @since 1.0.0
 */
function include_inc_files() {
	$files = array(
	
		'./inc/acf/', // ACF/SCF Functions.
		'./inc/custom-functions/', // Custom functions that act independently of the theme templates.
		'./inc/google-recaptcha/', // Google recaptcha setup.
		'./inc/head-and-footer-codes/', // Adds codes/tags to the theme head.
		'./inc/partials/', // Custom functions re-usable UI elements used across the theme.
		'./inc/post-types/', // Register all your post types.
		'./inc/shortcodes/', // Shortcodes used in the theme.
		'./inc/filters/', // All filtering actions.
		'./inc/setup/', // Theme setup files.
		'./inc/template-tags/', // Template tags.
	);

	foreach ( $files as $include ) {
		$include = trailingslashit( get_template_directory() ) . $include;

		// Allows inclusion of individual files or all .php files in a directory.
		if ( is_dir( $include ) ) {
			foreach ( glob( $include . '*.php' ) as $file ) {
				require_once $file;
			}
		} else {
			require_once $include;
		}
	}
}

include_inc_files();

/**
 * NOTE: Developer, do not add any custom functions in this file. 
 * Find the relevant file to add your custom functions in the inc/ folder.
 * Or add them like inc/custom-functions/your-function-name.
 * 
 * Happy coding!!!
 */



