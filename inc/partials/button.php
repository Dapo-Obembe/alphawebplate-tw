<?php
/**
 * Component: Button
 * 
 * @package AlphaWebConsult
 * 
 * @author Dapo Obembe <https://www.dapoobembe.com>
 * @since 2025
 * 
 */

 if(!defined('ABSPATH')) exit;
 
function awc_button( $text, $url = '#', $variant = 'primary', $classes = '' ) {
    // Button variants.
    $variants = [
        'primary' => 'bg-primary hover:bg-primary/80 text-white py-2 px-8 rounded-full whitespace-nowrap',
        'secondary' => 'bg-red-600 hover:bg-red-700 text-white py-2 px-8 rounded-full whitespace-nowrap',
        'custom' => 'py-2 px-8 rounded-full whitespace-nowrap',
    ];

    // Check if variant exists, otherwise use the primary as default.
    $variant_classes = $variants[$variant] ?? $variants['primary'];

    return "<a href='" . esc_url( $url ) . "' role='button' class='$variant_classes $classes'>" . esc_html( $text ) . "</a>";
}

/**
 * HOW TO USE: 
 * Use <?php echo awc_button( 'Click Me', 'https://example.com', 'primary', 'custom class name' ); ?> anywhere you want * the button and modify as you wish. 
 * Anchor text -> URL -> variant you want -> add cusom class 
 * if you want to change the style (with vanilla css or Tailwind).
 * 
 * Happy coding!!!
 */