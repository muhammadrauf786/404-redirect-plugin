<?php
/**
 * Plugin Name: 404 to Homepage Redirect
 * Description: Automatically redirects all 404 Not Found errors to the site's homepage using a 301 redirect.
 * Version: 1.0
 * Author: Antigravity
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

function redirect_404_to_homepage() {
    if ( is_404() ) {
        wp_redirect( home_url(), 301 );
        exit;
    }
}
add_action( 'template_redirect', 'redirect_404_to_homepage' );

// Add X-Robots-Tag: noindex to all feed URLs
function add_noindex_to_feeds() {
    if ( is_feed() ) {
        header( 'X-Robots-Tag: noindex, follow', true );
    }
}
add_action( 'template_redirect', 'add_noindex_to_feeds', 1 );
add_action( 'wp_headers', 'add_noindex_to_feeds' );
