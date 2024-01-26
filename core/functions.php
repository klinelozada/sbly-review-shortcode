<?php

/**
 * Enqueue styles
 */
function child_enqueue_styles() {

    wp_enqueue_style('review-shortcode-css', plugin_dir_url( __FILE__ ) . 'style.css', array(), '1.0', 'all');

}

add_action( 'wp_enqueue_scripts', 'child_enqueue_styles', 15 );

// Enqueue Script
function enqueue_custom_scripts() {
    // Enqueue jQuery from Google CDN
    wp_enqueue_script('rp-jq', 'http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js', array(), '2.0.0', true);

    // Enqueue star-rating-svg script from jsDelivr CDN
    wp_enqueue_script('star-rating-svg', 'https://cdn.jsdelivr.net/npm/star-rating-svg@3.5.0/dist/jquery.star-rating-svg.min.js', array('jquery'), '3.5.0', true);

    // Enqueue Total Rating
    wp_enqueue_script('rp-circle-progress-js', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-circle-progress/1.1.3/circle-progress.min.js', array('jquery'), '1.1.3', true);

    // Enqueue RP App
    wp_enqueue_script('rp-app', plugin_dir_url( __FILE__ ) . 'js/rp.app.js', array(), '1.0.0', true);

}

add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');

// ========================================================================================================
// SBLY - BIO
// ========================================================================================================

require_once(plugin_dir_path(__FILE__) . '/shortcodes/sbly-author-bio.php');

// ========================================================================================================
// SBLY - PRODUCT SPECIFICATIONS
// ========================================================================================================

require_once(plugin_dir_path(__FILE__) . '/shortcodes/sbly-product-specifications.php');

// ========================================================================================================
// SBLY - GLANCE
// ========================================================================================================

require_once(plugin_dir_path(__FILE__) . '/shortcodes/sbly-glance.php');

// ========================================================================================================
// SBLY - PRODUCT REVIEW
// ========================================================================================================

require_once(plugin_dir_path(__FILE__) . '/shortcodes/sbly-product-review.php');

// ========================================================================================================
// SBLY - RECOMMEND SLIDER
// ========================================================================================================

require_once(plugin_dir_path(__FILE__) . '/shortcodes/sbly-recommend-slider.php');

// ========================================================================================================
// SBLY CHECKLIST
// ========================================================================================================

require_once(plugin_dir_path(__FILE__) . '/shortcodes/sbly-checklist.php');