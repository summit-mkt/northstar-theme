<?php

defined( 'ABSPATH' ) || exit;

/**
 * Elementor integration.
 */
function hello_child_elementor_init() {

    if ( ! did_action( 'elementor/loaded' ) ) {
        return;
    }

    // Custom Elementor integration will be added here.
}
add_action( 'elementor/init', 'hello_child_elementor_init' );