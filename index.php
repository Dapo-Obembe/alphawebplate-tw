<?php
/**
 * The main blog archive template file.
 * Edit to match your design.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package AlphaWebConsult
 */

get_header();
?>

	<main id="main" class="site-main mt-0 mb-0" role="main">
		<div class="entry-content ">

		<?php
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();

				the_content();

			endwhile;
		endif;
		?>
				
		</div> <!-- .entry-content -->
	</main>

<?php
get_footer();
