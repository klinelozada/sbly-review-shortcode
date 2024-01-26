<?php

// ========================================================================================================
// SBLY - REVIEW HEADER
// ========================================================================================================

function sbly_review_header($atts) {
    // Default attribute values
    $atts = shortcode_atts(
        array(
            'background_image' => '',
            'title' => '',
        ),
        $atts
    );

    // Get current year and month
    $current_year = date('Y');
    $current_month_year = date('F Y');

    // Replace [sbly_year] and [sbly_month_year] with actual values
    $title = str_replace('(sbly_year)', $current_year, $atts['title']);
    $title = str_replace('(sbly_month_year)', $current_month_year, $title);

    // Output the HTML
    $output = '<div class="sbly--review-header-section" style="background-image: url(' . esc_url($atts['background_image']) . ');">';
    $output .= '<div class="sbly--review-header">';
    $output .= '<h1>' . esc_html($title) . '</h1>';
    $output .= '<p>Updated: ' . esc_html($current_month_year) . '</p>';
    $output .= '</div>';
    $output .= '</div>';

    return $output;
}

add_shortcode('sbly_review_header', 'sbly_review_header');
