<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );

if ( !function_exists( 'chld_thm_cfg_parent_css' ) ):
    function chld_thm_cfg_parent_css() {
        wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array(  ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css', 10 );

// END ENQUEUE PARENT ACTION

if ( !function_exists( 'vue_template_scripts' ) ):
    function vue_template_scripts() {
        wp_enqueue_script( 'vue_template', 'https://cdn.jsdelivr.net/npm/vue');
        wp_enqueue_script( 'vueapp_template', get_stylesheet_directory_uri() . '/vueTemplate.js', array(), '', true);  
    }
endif;
add_action( 'wp_enqueue_scripts', 'vue_template_scripts', 10 );

// includes for the callbacks.
include_once( get_stylesheet_directory() . '/includes/enqueue-scripts.php' );
// enqueue-scripts.php.
add_action( 'wp_enqueue_scripts', 'enqueue_markers_scripts' );

function markers_endpoint( $request_data ) {
    $args = array(
        'post_type' => 'post',
        'post_per_page' => -1,
        'numberposts' => -1
    );

    $posts = get_posts( $args );
    foreach( $posts as $key => $post ) {
        $posts[$key]->acf = get_fields($post->ID);
    }
    return $posts;
}

add_action( 'rest_api_init', function() {
    register_rest_route( 'markers/v1', '/post/', array(
        'methods' => 'GET',
        'callback' => 'markers_endpoint'
     ));
});