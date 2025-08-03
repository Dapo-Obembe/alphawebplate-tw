<?php
/**
 * Theme scripts and styles declarations.
 *
 * @package AlphaWebConsult
 *
 * @author Dapo Obembe <https://www.dapoobembe.com>
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Theme assets version.
define( 'THEME_VERSION', wp_get_theme()->get( 'Version' ) );

/**
 * This function enqueues the vite assets in the front and backend.
 * 
 * The backend block editor is necessary so that you can see a preview 
 * of a block even if that page is not previewed.
 *
 * @package AlphaWebConsult
 */
function awc_enqueue_assets_front_n_back() {
	if ( wp_get_environment_type() !== 'local' ) {
		return;
	}

	// Echo the Vite client and entry script for both frontend and block editor.
	add_action(
		'wp_print_footer_scripts',
		function () {
			echo '<script type="module" src="http://localhost:9000/@vite/client"></script>' . "\n"; // phpcs:ignore
			echo '<script type="module" src="http://localhost:9000/assets/js/main.js"></script>' . "\n"; // phpcs:ignore
		},
		1
	);

	add_action(
		'admin_print_footer_scripts',
		function () {
			echo '<script type="module" src="http://localhost:9000/@vite/client"></script>' . "\n"; // phpcs:ignore
			echo '<script type="module" src="http://localhost:9000/assets/js/main.js"></script>' . "\n"; // phpcs:ignore
		},
		1
	);
}
add_action( 'init', 'awc_enqueue_assets_front_n_back' );


if ( ! function_exists( 'awc_asset_loader' ) ) :
	/**
	 * Enqueues style.css on the front during production.
	 *
	 * @since 1.0
	 *
	 * @return void
	 */
	function awc_asset_loader() {
		$vite_dev_server = 'http://localhost:9000';

		if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
			$response = wp_remote_get( $vite_dev_server . '/@vite/client', array( 'timeout' => 1 ) );
		}

		if ( wp_get_environment_type() !== 'local' ) {
			// Production Mode.
			$manifest_path = get_theme_file_path( 'dist/manifest.json' );
			if ( file_exists( $manifest_path ) ) {
				$manifest = json_decode( wp_remote_get( $manifest_path ), true );

				$main = $manifest['assets/js/main.js'];

				// Enqueue main CSS.
				if ( isset( $main['css'] ) ) {
					foreach ( $main['css'] as $css_file ) {
						wp_enqueue_style( 'main-css', get_template_directory_uri() . '/dist/' . $css_file, array(), THEME_VERSION );
					}
				}

				// Enqueue main JS.
				wp_enqueue_script(
					'main-js',
					get_template_directory_uri() . '/dist/' . $main['file'],
					array(),
					THEME_VERSION,
					true
				);
			}
		}

        // Load script only on the "Contact" page (slug: 'contact') in production.
        if ( is_page( 'contact' ) ) {
            wp_enqueue_script(
                'contact-page-script', // A unique handle for your script
                get_template_directory_uri() . '/dist/js/contact-page.js', // Path to the script
                array( 'main-js' ), // This script will load after main-js
                THEME_VERSION, // Your theme version
                true // Load in the footer
            );
        }

		// Enqueue font.
		wp_enqueue_style( 'space-grotesk-font', get_template_directory_uri() . '/assets/fonts/space-grotesk/stylesheet.css', array(), THEME_VERSION );
	}
	add_action( 'wp_enqueue_scripts', 'awc_asset_loader' );

endif;
add_action( 'wp_enqueue_scripts', 'awc_asset_loader' );
