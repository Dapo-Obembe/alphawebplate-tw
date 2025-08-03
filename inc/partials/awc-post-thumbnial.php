<?php
/**
 * Reusable responsive post thumbnail HTML
 * 
 * NOTE: Image placeholder path may difer per project.
 * 
 * @param int|null $post_id Optional. Post ID to get thumbnail for.
 * @param string $size Optional. Image size to use.
 * @param string $image_class Optional. Additional classes for the image.
 * @param bool $lazy_load Optional. Whether to lazy load.
 * @param bool $include_srcset Optional. Whether to include srcset/sizes.
 * @return string HTML for the image element
 * 
 * Use inside a figure tag
 * <figure class="h-[240px] overflow-hidden mb-0">
 *  <?php echo awc_post_thumbnail(); ?>
 * </figure>
 */

 if( !defined( 'ABSPATH' ) ){
    exit;
 }

function awc_post_thumbnail(
    $post_id = null,
    $size = 'full',
    $image_class = 'w-full h-full object-cover scale-100 group-hover:scale-[1.095] duration-500 ease-in',
    $include_srcset = true,
    $lazy_load = null
) {
    global $wp_query;
    
    $post_id = $post_id ?: get_the_ID();
    $thumbnail_id = get_post_thumbnail_id($post_id);
    $has_thumbnail = !empty($thumbnail_id);

    // Auto-detect above-the-fold if lazy_load is null
    if ($lazy_load === null) {
        $is_above_fold = wp_is_mobile() 
            ? ($wp_query->current_post < 1) 
            : ($wp_query->current_post < 3);
        $lazy_load = !$is_above_fold;
    }

    // Get image attributes
    if ($has_thumbnail) {
        $image_url = get_the_post_thumbnail_url($post_id, $size);
        $srcset = $include_srcset ? wp_get_attachment_image_srcset($thumbnail_id, $size) : '';
        $sizes = $include_srcset ? '(max-width: 1024px) 100vw, 60vw' : '';
        $alt = get_the_title($post_id);
        
        $image_meta = wp_get_attachment_metadata($thumbnail_id);
        $width = $image_meta['width'] ?? 1200;
        $height = $image_meta['height'] ?? 800;
    } else {
        $image_url = get_theme_file_uri('/assets/images/thumbnail-placeholder.webp');
        $srcset = '';
        $sizes = '';
        $alt = __('No image available', 'alphawebplate-tw');
        $width = 1200;
        $height = 800;
    }

    ob_start();
    ?>
    <img 
        class="<?php echo esc_attr($image_class); ?>" 
        src="<?php echo esc_url($image_url); ?>" 
        <?php if ($has_thumbnail && $include_srcset) : ?>
            srcset="<?php echo esc_attr($srcset); ?>" 
            sizes="<?php echo esc_attr($sizes); ?>"
        <?php endif; ?>
        alt="<?php echo esc_attr($alt); ?>" 
        <?php if ($lazy_load) : ?>
            loading="lazy"
        <?php else : ?>
            loading="eager"
        <?php endif; ?>
        width="<?php echo esc_attr($width); ?>" 
        height="<?php echo esc_attr($height); ?>" 
    >
    <?php
    return ob_get_clean();
}