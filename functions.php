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
add_action( 'wp_enqueue_scripts', 'child_theme_styles' );

function load_dashicons_front_end() {
    wp_enqueue_style( 'dashicons' );
}
add_action( 'wp_enqueue_scripts', 'load_dashicons_front_end' );

function set_viewport_content_header( $content ) {
    $viewport_content = 'viewport-fit=cover';
    return $viewport_content;
}
add_filter( 'hello_elementor_viewport_content', 'set_viewport_content_header' );

add_filter( 'hello_elementor_add_woocommerce_support', '__return_false' );


/**
 * Use one Google Maps API Key for JavaScript Map displays (The Events Calendar)
 * and a different API Key for venue geolocation lookups (Events Calendar PRO).
 *
 * You need this in order to have API Key restrictions.
 * Your "Maps JavaScript API" key should select "HTTP referrers (web sites)" restriction.
 * Your "Geocoding API" key should select "IP addresses (web servers, cron jobs, etc.)" restriction.
 * Screenshot: https://cl.ly/300k2I1s321N
 *
 * @link https://gist.github.com/cliffordp/a2ec320313afbc1ffb5f0e5ac654b7fb This snippet.
 **/

function ecp_separate_gmaps_api_key_for_geocoding( $api_url ) {
    $api_keys = parse_ini_file( 'api_keys.ini' );
    $js_api_key = tribe_get_option( 'google_maps_js_api_key' );
    $api_url = str_replace( 'key=' . $js_api_key, 'key=' . $api_keys['geocode_key'], $api_url );
    // esc_url() will break it so esc_url_raw() or don't escape at all
    return esc_url_raw( $api_url );
}
add_filter( 'tribe_events_pro_geocode_request_url', 'ecp_separate_gmaps_api_key_for_geocoding' );