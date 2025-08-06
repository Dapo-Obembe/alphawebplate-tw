<?php
/**
 * Single Post or Page file.
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package AlphaWebConsult
 */

 if(!defined('ABSPATH')) exit;

$author_avatar = get_avatar( get_the_author_meta( 'ID' ), 60 );
$author_name  = get_the_author_meta( 'first_name', get_post_field( 'post_author', get_the_ID() ) );

get_header();
?>

<section data-animate="fadeInUp" class="single-post w-full py-[35px] lg:pt-[35px] lg:pb-[75px] px-[1rem] lg:px-[2.5rem]">
	<div class="container">
		<?php
		if ( have_posts() ) : ?>
			<div data-animate="fadeInUp" class="content">
				<?php while ( have_posts() ) : 
					the_post(); ?>

					<?php the_content(); ?>

				<?php endwhile; ?>
			</div>
		<?php endif; ?>
        
	</div>
     
</section>	
<!-- RELATED POSTS -->
<?php get_template_part( 'templates/components/related-posts' ); ?>
<?php
get_footer();
