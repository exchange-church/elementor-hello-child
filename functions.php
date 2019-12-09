<?php

function child_theme_styles() {
    $parent_style = 'hello-elementor';
    wp_enqueue_style(
        'elementor-hello-child',
        get_stylesheet_directory_uri() .'/style.css',
        array($parent_style),
        wp_get_theme()->get('Version')
    );
}

function load_dashicons_front_end() {
    wp_enqueue_style( 'dashicons' );
}

add_action( 'wp_enqueue_scripts', 'child_theme_styles' );
add_action( 'wp_enqueue_scripts', 'load_dashicons_front_end' );

function set_viewport_content_header( $content ) {
    $viewport_content = 'viewport-fit=cover';
    return $viewport_content;
}

add_filter( 'hello_elementor_viewport_content', 'set_viewport_content_header' );
add_filter( 'hello_elementor_add_woocommerce_support', '__return_false' );