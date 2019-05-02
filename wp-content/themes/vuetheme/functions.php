<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'ms_theme_editor_parent_css' ) ):
    function ms_theme_editor_parent_css() {
        wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array(  ) );
        wp_enqueue_script('vue', 'https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.js', [], '2.5.17');
        wp_enqueue_script('vueapp', get_stylesheet_directory_uri() . '/main.js', [], '1.0', true);   
    }
endif;
add_action( 'wp_enqueue_scripts', 'ms_theme_editor_parent_css', 10 );

// END ENQUEUE PARENT ACTION

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