<?php
/**
 * Dequeue Contact Form 7 and reCAPTCHA scripts/styles
 * on pages where the shortcode is not present.
 * 
 * @package AlphaWebConsult
 */

function awc_dequeue_cf7_assets() {
    // Check if we are on a singular page or post.
    if ( ! is_singular() ) {
        return;
    }

    global $post;

    // Check if the post content does NOT have the shortcode.
    if ( $post && ! has_shortcode( $post->post_content, 'contact-form-7' ) ) {
        // Dequeue Scripts
        wp_dequeue_script( 'contact-form-7' );
        wp_dequeue_script( 'google-recaptcha' );
        wp_dequeue_script( 'wpcf7-recaptcha' );

        // Dequeue Styles
        wp_dequeue_style( 'contact-form-7' );
    }
}
// Use a late priority (like 99) to run after the plugin adds its assets.
add_action( 'wp_enqueue_scripts', 'awc_dequeue_cf7_assets', 99 );