<?php

function child_theme_styles() {
    $parent_style = 'elementor-hello-theme-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-theme-css', get_stylesheet_directory_uri() .'/style.css' , array($parent_style), wp_get_theme()->get('Version'));
}
add_action( 'wp_enqueue_scripts', 'child_theme_styles' );

add_filter( 'elementor_hello_theme_add_woocommerce_support', '__return_false' );