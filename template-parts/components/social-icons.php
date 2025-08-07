<?php
/**
 * Social Icons template part
 *
 * This template is used for displaying the social icons.
 *
 * @package AlphaWebConsult
 */
if(!defined('ABSPATH')) exit;

// Template data.
$social_icons = get_field( 'site_social_icons', 'option' );
?>

<?php if ( $social_icons ) : ?>

	<div class="social-icons">

		<?php foreach ( $social_icons as $item ) : ?>

			<a class="social-icons__item"
				href="<?php echo esc_url( $item['url'] ); ?>"
				aria-label="<?php echo esc_attr( ucfirst( $item['network'] ) . ' ' . __( 'Link', 'alphawebplate-tw' ) ); ?>"
				target="_blank" rel="noopener">
				<?php
				the_svg(
					$item['network'],
					array(
						'aria_hidden' => false,
						'height'      => 20,
						'width'       => 20,
					)
				);
				?>
			</a>

		<?php endforeach; ?>

	</div>

<?php endif; ?>
