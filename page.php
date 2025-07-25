<?php
/**
 * The page template file.
 * 
 * This is the template file for all single page.
 * 
 * To override this template, create e.g page-about.php and modify the structure.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package AlphaWebConsult
 */

get_header();
?>
	<main id="main" class="site-main mt-0 mb-0" role="main">
		<div class="entry-content ">

		<?php if ( have_posts() ) : ?>
		
			<?php
			while ( have_posts() ) :
				the_post();
				?>
				<?php the_content(); ?>
			<?php endwhile; ?>
			<?php endif; ?>
				
		</div> <!-- .entry-content -->
	</main>
<?php
get_footer();
