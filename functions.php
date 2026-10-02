<?php
/**
 * Theme functions and definitions.
 *
 * For additional information on potential customization options,
 * read the developers' documentation:
 *
 * https://developers.elementor.com/docs/hello-elementor-theme/
 *
 * @package HelloElementorChild
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'HELLO_ELEMENTOR_CHILD_VERSION', '2.0.4' );

/**
 * Load child theme scripts & styles.
 *
 * @return void
 */
function hello_elementor_child_scripts_styles() {

	wp_enqueue_style(
		'hello-elementor-child-style',
		get_stylesheet_directory_uri() . '/style.css',
		[
			'hello-elementor-theme-style',
		],
		HELLO_ELEMENTOR_CHILD_VERSION
	);

}
add_action( 'wp_enqueue_scripts', 'hello_elementor_child_scripts_styles', 20 );


/**
 * Add custom meta tags to <head>.
 */
function ns_meta_tags() {
    ?>
    <meta name="robots" content="noindex">
    <?php
}
add_action('wp_head', 'ns_meta_tags');

// require_once get_stylesheet_directory() . '/inc/acf.php';
// require_once get_stylesheet_directory() . '/inc/elementor.php';
require_once get_stylesheet_directory() . '/inc/shortcode.php';
