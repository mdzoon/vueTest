<?php 
/*
Plugin name: Pollka King
Description: Live-updating polls for your Wordpress website
Version: 1.0
Author: Jeffrey Gould/ mdzoon
*/


if ( !class_exists( 'PollkaKing' ) ) {
    class PollkaKing {
        
        private $shortcode_name = 'pollka';

        public function register() {
            add_shortcode( $this->shortcode_name, [$this, 'shortcode'] );
            add_action( 'wp_enqueue_scripts', [$this, 'scripts'] );
        }

        public function shortcode( $atts ) { 

            $answers = [];
            
            foreach ( $atts as $key => $val ) {
                if( strstr( $key, 'answer-' ) ) {
                    $answers[ str_replace( 'answer-', '', $key ) ] = $val;
                }
            } 

            $vue_atts = esc_attr( json_encode( [
                'id'       => sanitize_title_with_dashes( $atts['id'], '', 'save' ),
                'question' => $atts['question'],
                'answers'  => $answers,
            ] ) );
            
            return "<div data-pk-atts='{$vue_atts}'>loading poll...</div>";

        }

        public function scripts() {
            global $post;
            // Only enqueue scripts if we're displaying a post that contains the shortcode 
            if( has_shortcode( $post->post_content, $this->shortcode_name ) ) {
                wp_enqueue_script( 'vue', 'https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.16/vue.js', [], '2.5.16' );
                wp_enqueue_script( 'pollka-king', plugin_dir_url( __FILE__ ) . 'js/pollka-king.js', [], '0.1', true );
                wp_enqueue_style( 'pollka-king', plugin_dir_url( __FILE__ ) . 'css/pollka-king.css', [], '0.1' ); 
            }
        }
    }
    ( new PollkaKing() )->register();
}