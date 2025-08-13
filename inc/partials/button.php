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

 /**
 * Outputs a styled HTML anchor tag functioning as a button.
 *
 * Supports predefined styling variants (`primary`, `secondary`, `custom`) and allows
 * appending additional custom classes. Escapes both URL and text content for safety.
 *
 * @param string $text    The button text to display.
 * @param string $url     The URL the button should link to. Defaults to '#'.
 * @param string $variant The style variant of the button. Accepts 'primary', 'secondary', or 'custom'. Defaults to 'primary'.
 * @param string $classes Additional CSS classes to append. Optional.
 *
 * @return string HTML markup for the button.
 */
function awc_button( $text, $url = '#', $variant = 'primary', $classes = '' ) {
	// Button variants.
	$variants = array(
		'primary'   => 'primary-button relative z-0',
		'secondary' => ' secondary-button relative z-0',
		'custom'    => 'py-2 px-8 rounded-full whitespace-nowrap relative z-0',
	);

	// Use admin-safe URL if in the admin area.
	if ( is_admin() ) {
		$url = '#';
	}

	// Check if variant exists, otherwise use the primary as default.
	$variant_classes = $variants[ $variant ] ?? $variants['primary'];

	return "<a href='" . esc_url( $url ) . "' role='button' class='$variant_classes $classes'>" . esc_html( $text ) . '</a>';
}

/**
 * HOW TO USE: 
 * Use <?php echo awc_button( 'Click Me', 'https://example.com', 'primary', 'custom class name' ); ?> anywhere you want * the button and modify as you wish. 
 * Anchor text -> URL -> variant you want -> add cusom class 
 * if you want to change the style (with vanilla css or Tailwind).
 * 
 * Happy coding!!!
 */