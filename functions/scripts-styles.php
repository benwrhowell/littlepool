<?php
/**
 * Scripts & Styles
 *
 * @package Bulmapress
 */

/**
 * Enqueue scripts and styles.
 */

function modify_jquery_version() {
    if (!is_admin()) {
        wp_deregister_script('jquery');
        wp_register_script('jquery',
'http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js', false, '2.0.s');
        wp_enqueue_script('jquery');
    }
}
add_action('init', 'modify_jquery_version');


function bulmapress_scripts() {
	wp_enqueue_style( 'bulmapress-style', get_stylesheet_uri() );
	wp_enqueue_script('jquery');
	wp_enqueue_script( 'bulmapress-vendor', get_template_directory_uri() . '/build/js/vendor.min.js?v=1', true);
	wp_enqueue_script( 'bulmapress-custom', get_template_directory_uri() . '/build/js/custom.min.js?v=1', true);


}
add_action( 'wp_enqueue_scripts', 'bulmapress_scripts' );
