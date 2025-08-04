<?php
/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package AlphaWebConsult
 */

 // ACF DATA.
 $contact_us_btn = get_field( 'contact_us_btn', 'option' );
 $home_hero_image = get_field( 'hero_image' );
 $home_hero_box_image = get_field( 'hero_box_image' );

 ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	<?php wp_head(); ?>
    
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

    <header class="min-h-[80px] flex items-center pb-0 border-b-2 border-secondary bg-body-bg sticky z-99999 top-0 px-[1rem] lg:px-[2.5rem]">
        <div class="container mx-auto flex justify-between items-center">
            <!-- Logo -->
            <div class="site-logo">
                <?php if ( has_custom_logo() ) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <h1 class="text-2xl font-bold">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                    </h1>
                <?php endif; ?>
            </div>

            <nav class="header-navigation hidden lg:flex flex-nowrap gap-8 items-center" role="navigation">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'primary',
                        'container'      => false,
                        'menu_class'     => 'header__menu',
                        'fallback_cb'    => false,
                    )
                );
                ?>

                <div class="header-cta ml-[2rem]">

                    <?php
                    if ( $contact_us_btn ) :
                    	$link_url    = $contact_us_btn['url'];
                    	$link_title  = $contact_us_btn['title'];
                    	$link_target = $contact_us_btn['target'] ? $contact_us_btn['target'] : '_self';
                        ?>
                        <a  href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" role="button" class="primary-button">
                        <?php echo esc_html( $link_title ); ?>
                        </a>
                    <?php endif; ?>

                </div>
                
            </nav>
            
            <!--Mobile Nav-->
            <?php get_template_part( 'template-parts/components/mobile-nav' ); ?>
        </div>
    </header>
    <main id="main" class="site-main mt-0 mb-0" role="main">
	    <div class="entry-content ">