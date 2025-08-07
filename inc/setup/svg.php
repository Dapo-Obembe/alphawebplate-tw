<?php
/**
 * Return SVG markup.
 *
 * @package  AlphaWebConsult
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Returns inline SVG markup from raw SVG file.
 *
 * This function loads an SVG file from the theme's icons directory and allows you to inject
 * common attributes like class, width, height, role, and title into the <svg> element.
 *
 * @param string $icon_name The name of the icon (without .svg extension).
 * @param array  $args {
 *     Optional. Additional attributes to add to the <svg> element.
 *
 *     @type string $class  CSS class(es) to apply to the SVG.
 *     @type string $title  Text content for a <title> tag, for accessibility.
 *     @type int    $width  Width of the SVG.
 *     @type int    $height Height of the SVG.
 *     @type string $role   ARIA role, defaults to 'img'.
 * }
 *
 * @return string The SVG markup string, or HTML comment if the icon is missing or invalid.
 */
function the_svg( $icon_name, $args = array() ) {
	$defaults = array(
		'class'  => '',
		'title'  => '',
		'width'  => '',
		'height' => '',
		'role'   => 'img',
	);

	$args = wp_parse_args( $args, $defaults );

	$path = get_template_directory() . "/assets/icons/{$icon_name}.svg";

	if ( ! file_exists( $path ) ) {
		return "<!-- Icon '{$icon_name}' not found -->";
	}

	$svg = file_get_contents( $path ); // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents

	if ( ! $svg ) {
		return "<!-- Icon '{$icon_name}' could not be loaded -->";
	}

	// Load SVG into DOMDocument to safely manipulate it.
	$dom = new DOMDocument();
	libxml_use_internal_errors( true ); // Suppress warnings from invalid SVGs.
	$dom->loadXML( $svg );
	libxml_clear_errors();

	$svg_element = $dom->getElementsByTagName( 'svg' )->item( 0 );

	if ( ! $svg_element ) {
		return "<!-- Icon '{$icon_name}' is not valid SVG -->";
	}

	// Set attributes if provided.
	if ( $args['class'] ) {
		$svg_element->setAttribute( 'class', esc_attr( $args['class'] ) );
	}
	if ( $args['width'] ) {
		$svg_element->setAttribute( 'width', esc_attr( $args['width'] ) );
	}
	if ( $args['height'] ) {
		$svg_element->setAttribute( 'height', esc_attr( $args['height'] ) );
	}
	if ( $args['role'] ) {
		$svg_element->setAttribute( 'role', esc_attr( $args['role'] ) );
	}

	// Add <title> if provided.
	if ( $args['title'] ) {
		$title = $dom->createElement( 'title', esc_html( $args['title'] ) );
		$svg_element->insertBefore( $title, $svg_element->firstChild );
	}

	return $dom->saveXML( $svg_element );
}
