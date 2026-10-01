<?php
/**
 * Theme Shortcodes
 *
 * @package Hello_Child
 */

defined( 'ABSPATH' ) || exit;


/**
 * Last day of the current month.
 *
 * Usage:
 * [last_day_of_month]
 */
function last_day_of_month_shortcode() {
    return date('F jS, Y', strtotime('last day of this month'));
}
add_shortcode('last_day_of_month', 'last_day_of_month_shortcode');

/**
 * Current year.
 *
 * Usage:
 * [current_year]
 */
function current_year_shortcode() {
    return date('Y');
}
add_shortcode('current_year', 'current_year_shortcode');

/**
 * Default or seminar thank you message.
 *
 * Usage:
 * [thankyou]
 */
function thankyou_shortcode() {
	$thankyou = "A member of our team will contact you shortly.";

	if ((strpos(home_url(), 'seminar') !== false) || (strpos(home_url(), 'flsteversonhamlinhilbish') !== false)) {
        $thankyou = "Your Spot At Our Seminar Has Been Reserved.";
    }
    return $thankyou;
}
add_shortcode('thankyou', 'thankyou_shortcode');

// Create shortcode [location_years]
/**
 * Dynamic years open based on established year.
 *
 * Usage:
 * [location_years]
 */
function location_years_shortcode() {
	$established = get_field('brand_established', 'option');
	$years = date('Y')-$established;
    return $years;
}
add_shortcode('location_years', 'location_years_shortcode');

/**
 * Location Name.
 *
 * Usage:
 * [location_name]
 */
function location_name_shortcode() {
    return get_field('option_location_name', 'option');
}
add_shortcode('location_name', 'location_name_shortcode');

// Create shortcode [brand_video]
/**
 * Default or seminar thank you message.
 *
 * Usage:
 * [thankyou]
 */
function brand_video_shortcode() {
    return get_field('brand_video', 'option');
}
add_shortcode('brand_video', 'brand_video_shortcode');
