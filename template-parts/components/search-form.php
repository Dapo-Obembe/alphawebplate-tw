<?php
/**
 * Search Form template part
 *
 * This template is used for displaying the search form.
 *
 * @package AlphaWebConsult
 */
if(!defined('ABSPATH')) exit;

?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="site-search">
		<span class="screen-reader-text"><?php esc_html_e( 'Search for:', 'alphawebplate-tw' ); ?></span>
		<input id="site-search" type="search" class="search-form__input" placeholder="<?php esc_attr_e( 'Search...', 'alphawebplate-tw' ); ?>" value="<?php echo get_search_query(); ?>" name="s" required>
	</label>
	<button type="submit" class="search-form__button">
		<?php
		the_svg(
			'search',
			array(
				'height' => 20,
				'width'  => 20,
			)
		);
		?>
		<span class="screen-reader-text"><?php esc_html_e( 'Search', 'alphawebplate-tw' ); ?></span>
	</button>
</form>
