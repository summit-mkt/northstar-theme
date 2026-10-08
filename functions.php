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

define( 'HELLO_ELEMENTOR_CHILD_VERSION', '2.0.10' );

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

// ACF custom fields
// require_once get_template_directory() . '/includes/acf-fields.php';

// Block xmlrpc
// add_filter('xmlrpc_enabled', '__return_false');

// Create shortcode [last_day_of_month]
function last_day_of_month_shortcode() {
    return date('F jS, Y', strtotime('last day of this month'));
}
add_shortcode('last_day_of_month', 'last_day_of_month_shortcode');

// Create shortcode [current_year]
function current_year_shortcode() {
    return date('Y');
}
add_shortcode('current_year', 'current_year_shortcode');

// Create shortcode [thankyou]
function thankyou_shortcode() {
	$thankyou = "A member of our team will contact you shortly.";

	if ((strpos(home_url(), 'seminar') !== false) || (strpos(home_url(), 'flsteversonhamlinhilbish') !== false)) {
        $thankyou = "Your Spot At Our Seminar Has Been Reserved.";
    }
    return $thankyou;
}
add_shortcode('thankyou', 'thankyou_shortcode');

// Robots noindex
function ns_meta_tags() {
    ?>
    <meta name="robots" content="noindex">
    <?php
}
add_action('wp_head', 'ns_meta_tags');

// Create shortcode [location_years]
function location_years_shortcode() {
	$established = get_field('brand_established', 'option');
	$years = date('Y')-$established;
    return $years;
}
add_shortcode('location_years', 'location_years_shortcode');

// Create shortcode [location_name]
function location_name_shortcode() {
    return get_field('option_location_name', 'option');
}
add_shortcode('location_name', 'location_name_shortcode');

// Create shortcode [brand_video]
function brand_video_shortcode() {
    return get_field('brand_video', 'option');
}
add_shortcode('brand_video', 'brand_video_shortcode');

// Close comments on the front-end
add_filter( 'comments_open', '__return_false', 20, 2 );
add_filter( 'pings_open', '__return_false', 20, 2 );

// Hide existing comments
add_filter( 'comments_array', '__return_empty_array', 10, 2 );

// Remove comments from post type support
add_action( 'admin_init', function () {
    foreach ( get_post_types() as $post_type ) {
        if ( post_type_supports( $post_type, 'comments' ) ) {
            remove_post_type_support( $post_type, 'comments' );
            remove_post_type_support( $post_type, 'trackbacks' );
        }
    }
} );

// Remove Comments from the admin sidebar
add_action( 'admin_menu', function () {
    remove_menu_page( 'edit-comments.php' );
} );

// Remove the Recent Comments dashboard widget
add_action( 'wp_dashboard_setup', function () {
    remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
} );

// Remove the comment count from the admin bar
add_action( 'wp_before_admin_bar_render', function () {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu( 'comments' );
} );

// Redirect anyone who tries to load wp-admin/edit-comments.php directly
add_action( 'admin_init', function () {
    global $pagenow;
    if ( $pagenow === 'edit-comments.php' ) {
        wp_safe_redirect( admin_url() );
        exit;
    }
} );