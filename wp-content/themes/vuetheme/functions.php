<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'ms_theme_editor_parent_css' ) ):
    function ms_theme_editor_parent_css() {
        wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array(  ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'ms_theme_editor_parent_css', 10 );

if ( !function_exists( 'vue_template_scripts' ) ):
    function vue_template_scripts() {
        wp_enqueue_script( 'vue_template', 'https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.js', [], '2.5.17' );
        wp_enqueue_script( 'vueapp_template', get_stylesheet_directory_uri() . '/vueTemplate.js', [], '1.0', true );   
    }
endif;
add_action( 'wp_enqueue_scripts', 'vue_template_scripts', 10 );

// if ( !function_exists( 'vue_geolocation_scripts' ) ):
//     function vue_geolocation_scripts() {
//         wp_enqueue_script('vue_geolocation', 'https://api.tiles.mapbox.com/mapbox-gl-js/v0.53.1/mapbox-gl.js' );
//         wp_enqueue_stylesheet( 'vueapp_geolocation', 'https://api.tiles.mapbox.com/mapbox-gl-js/v0.53.1/mapbox-gl.css' );   
//     }
// endif;
// add_action( 'wp_enqueue_scripts', 'vue_geolocation_scripts', 10 );


// END ENQUEUE PARENT ACTION

// function markers_endpoint( $request_data ) {
//     $args = array(
//         'post_type' => 'post',
//         'post_per_page' => -1,
//         'numberposts' => -1
//     );

//     $posts = get_posts( $args );
//     foreach( $posts as $key => $post ) {
//         $posts[$key]->acf = get_fields($post->ID);
//     }
//     return $posts;
// }

// add_action( 'rest_api_init', function() {
//     register_rest_route( 'markers/v1', '/post/', array(
//         'methods' => 'GET',
//         'callback' => 'markers_endpoint'
//     ));
// });