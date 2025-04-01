<?php
/**
 * Block: FAQS.
 * 
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   int|string $post_id The post ID this block is saved to.
 * @package alpha-web-consult
 */

// Create id attribute allowing for custom "anchor" value.
$block_id = 'example';
if ( ! empty( $block['anchor'] ) ) {
	$block_id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$block_class = 'example';

if ( ! empty( $block['className'] ) ) {
	$block_class .= ' ' . $block['className'];
}

if ( ! empty( $block['align'] ) ) {
	$block_class .= ' align' . $block['align'];
}


?>


<section id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $block_class ); ?>">
    <h2>Example Block</h2>
</section>
    