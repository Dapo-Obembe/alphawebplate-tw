<?php
/**
 * Mobile navigation template part
 *
 * This template is used for displaying the mobile navigation.
 *
 * @package alphawebplate-tw
 */
if(!defined('ABSPATH')) exit;

 $contact_us_btn = get_field( 'contact_us_btn', 'option' );
?>

<button class="menu-toggle lg:hidden" aria-expanded="false" aria-label="<?php esc_attr_e( 'Menu', 'alphawebplate-tw' ); ?>">
	<?php
	the_svg(
		'menu',
		array(
			'class'  => 'menu-toggle__icon menu-toggle__icon--open',
			'height' => 32,
			'width'  => 32,
		)
	);
	?>
	<?php
	the_svg(
		'close',
		array(
			'class'  => 'menu-toggle__icon menu-toggle__icon--close',
			'height' => 32,
			'width'  => 32,
		)
	);
	?>
</button>

<nav class="mobile-nav bg-body-bg lg:hidden justify-between" hidden>
	<?php
	wp_nav_menu(
		array(
			'theme_location' => 'primary',
			'container'      => false,
			'menu_class'     => 'mobile-nav__menu',
			'fallback_cb'    => false,
		)
	);
	?>

	<div class="header-cta flex flex-col gap-8 items-center justify-center">

		<?php
			if ( $contact_us_btn ) :
				$link_url    = $contact_us_btn['url'];
				$link_title  = $contact_us_btn['title'];
				$link_target = $contact_us_btn['target'] ? $contact_us_btn['target'] : '_self';
				?>
				<a  href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" role="button" class="primary-button w-[50%] mx-auto flex justify-center">
				<?php echo esc_html( $link_title ); ?>
				</a>
		<?php endif; ?>

		<!-- Social Icons -->
		<?php get_template_part( 'template-parts/components/social-icons' ); ?>

	</div>
	
</nav>
