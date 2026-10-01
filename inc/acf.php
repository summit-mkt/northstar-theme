<?php

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'ACF' ) ) {
    return;
}

/**
 * Load theme-managed ACF field groups.
 */
function hello_child_register_acf_fields() {

    // require_once get_stylesheet_directory() . '/acf/fields/global.php';
    // require_once get_stylesheet_directory() . '/acf/fields/hero.php';
    // require_once get_stylesheet_directory() . '/acf/fields/landing-page.php';
}

add_action( 'acf/init', 'hello_child_register_acf_fields' );