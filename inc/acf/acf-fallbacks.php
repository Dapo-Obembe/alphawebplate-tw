<?php
/**
 * Advanced Custom Fields fallback functions.
 *
 * This file defines fallback functions for Advanced Custom Fields plugin
 * to prevent fatal errors in case the plugin is deactivated.
 *
 * @package AlphaWebConsult
 */
if(!defined('ABSPATH')) exit;
// Check if ACF function get_field() exists, if not, define a fallback.
// if ( ! function_exists( 'get_field' ) ) {
// 	/**
// 	 * Fallback function for ACF's get_field().
// 	 *
// 	 * @param string $selector The field name or field key.
// 	 * @param mixed  $post_id The post ID where the value is saved. Default is false (current post).
// 	 * @param bool   $format_value Whether to apply formatting functions. Default is true.
// 	 *
// 	 * @return null
// 	 */
// 	function get_field( $selector, $post_id = false, $format_value = true ) {
// 		return null;
// 	}
// }
