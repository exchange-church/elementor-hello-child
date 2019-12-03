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

add_filter( 'elementor_hello_theme_add_woocommerce_support', '__return_false' );