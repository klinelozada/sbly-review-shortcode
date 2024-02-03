<?php

// ========================================================================================================
// SBLY - REVIEW TOP 3
// ========================================================================================================

function sbly_top_3($atts, $content = null) {
    $output = '<div class="sbly--review-top-3-section">';

    // Header
    $output .= '<div class="sbly--review-top-3-header">';
    $output .= '<div class="sbly--item-label">Product</div>';
    $output .= '<div class="sbly--item-label">Our Score</div>';
    $output .= '<div class="sbly--item-label">Key Features</div>';
    $output .= '</div>';

    // Items
    $output .= '<div class="sbly--review-top-3">' . do_shortcode($content) . '</div>';

    // Advertiser Disclosure
    $output .= '<div class="sbly--advertiser">';
    $output .= '<div class="sbly--hidden-bubble">';
    $output .= '<p>Moms Favorite Sheets is made up of our own views and opinions. The scoring is determined at our own discretion and should not be used for accuracy purposes. We are able to provide this service for free thanks to the referral fees we receive from a number of service providers. These referral fees may affect the rankings and score assigned to specific vendors. Furthermore, though many vendors appear on the Moms Favorite Sheets, this DOES NOT imply endorsement of any kind. The information and vendors which appear on Moms Favorite Sheets is subject to change at any time.</p>';
    $output .= '</div>';
    $output .= '<a href="#" class="sbly--ads-btn">Advertiser Disclosure</a>';
    $output .= '</div>';

    $output .= '</div>';

    return $output;
}

add_shortcode('sbly_top_3', 'sbly_top_3');

function sbly_top_3_item($atts) {
    $atts = shortcode_atts(
        array(
            'item_image' => '',
            'item_rate' => '',
            'item_rate_label' => '',
            'item_title' => '',
            'item_specs' => '',
            'item_link' => '',
            'item_save' => '',
            'item_visitors' => '',
        ),
        $atts
    );

    $output = '<div class="sbly--review-top-3-item">';

    $output .= '<div class="item-left">';
    $output .= '<div class="item-image">';
    $output .= '<img src="' . esc_url($atts['item_image']) . '">';
    $output .= '</div>';

    $output .= '<div class="item-rating">';
    $output .= '<h2>' . esc_html($atts['item_rate']) . '</h2>';
    $output .= '<div class="item-stars">';
    $output .= '<span>' . esc_html($atts['item_rate_label']) . '</span>';
    $output .= '<div class="sbly--stars"><i class="fa-sharp fa-solid fa-star"></i><i class="fa-sharp fa-solid fa-star"></i><i class="fa-sharp fa-solid fa-star"></i><i class="fa-sharp fa-solid fa-star"></i><i class="fa-sharp fa-solid fa-star"></i></div>';
    $output .= '</div>';
    $output .= '</div>';
    $output .= '</div>';

    $output .= '<div class="item-right">';
    $output .= '<div class="item-specs">';
    $output .= '<div class="item-title">';
    $output .= '<h2>' . esc_html($atts['item_title']) . '</h2><hr>';
    $output .= '</div>';
    $output .= '<ul>';
    $specs = explode(", ", $atts['item_specs']);
    foreach ($specs as $spec) {
        $output .= '<li>' . esc_html($spec) . '</li>';
    }
    $output .= '</ul>';
    $output .= '</div>';

    $output .= '<div class="item-buy-btn">';
    if (!empty($atts['item_save'])) {
        $output .= '<div class="item-bubble">Save up to ' . esc_html($atts['item_save']) . ' <br/> ' . number_format(esc_html($atts['item_visitors'])) . ' VISITORS BOUGHT<br/> DURING SALE</div>';
    }
    $output .= '<a href="' . esc_url($atts['item_link']) . '">Visit ' . esc_html($atts['item_title']) . ' ></a>';
    $output .= '</div>';
    $output .= '</div>';

    $output .= '</div>';

    return $output;
}

add_shortcode('sbly_top_3_item', 'sbly_top_3_item');