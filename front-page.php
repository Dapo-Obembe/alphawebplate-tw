<?php
/**
 * The Front-Page template file.
 *
 * This template is for the home page. Arrange the template files
 * to how you want it to show. or replace the content with what is in
 * page.php if you will be using blocks.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package alphawebplate-tw
 * @author Dapo Obembe | https://www.dapoobembe.com
 */
if(!defined('ABSPATH')) exit;

get_header();
?>
    <!-- Hero section -->
    <?php get_template_part( 'template-parts/frontpage/hero' ); ?>

    <!-- Recent Posts -->
    <?php get_template_part( 'template-parts/frontpage/recent-posts' ); ?>  

<?php
get_footer();