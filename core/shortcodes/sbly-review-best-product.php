<?php

// ========================================================================================================
// SBLY - REVIEW BEST PRODUCT
// ========================================================================================================

// Main product section shortcode
function sbly_top_product_shortcode($atts, $content = null) {
    $output = '<div class="sbly--review-top-1-section">';
    $output .= '<div class="sbly--review-top-1-header"><h1>' . esc_html($atts['headline']) . '</h1></div>';
    $output .= do_shortcode($content); // Ensure nested shortcodes are processed
    $output .= '</div>';
    return $output;
}
add_shortcode('sbly_top_product', 'sbly_top_product_shortcode');

// Product item shortcode, including features
function sbly_top_product_item_shortcode($atts, $content = null) {
    extract(shortcode_atts([
        'item_image' => '',
        'item_rate' => '',
        'item_rate_label' => '',
        'item_title' => '',
        'item_specs' => '',
        'item_link' => '',
        'item_save' => '',
        'item_visitors' => ''
    ], $atts));

    $specs = explode(',', $item_specs);
    $specs_list = '<ul>';
    foreach ($specs as $spec) {
        $specs_list .= '<li>' . esc_html(trim($spec)) . '</li>';
    }
    $specs_list .= '</ul>';

    // Start with the main item wrapper
    $output = '<div class="sbly--review-top-1">';

    // Item detail structure
    $output .= '<div class="sbly--review-top-1-item">';
    $output .= '<div class="item-left">';
    $output .= '<div class="item-image"><img src="' . esc_url($item_image) . '"></div>';
    $output .= '<div class="item-rating"><h2>' . esc_html($item_rate) . '</h2><div class="item-stars"><span>' . esc_html($item_rate_label) . '</span><div class="sbly--stars"><i class="fa-sharp fa-solid fa-star"></i><i class="fa-sharp fa-solid fa-star"></i><i class="fa-sharp fa-solid fa-star"></i><i class="fa-sharp fa-solid fa-star"></i><i class="fa-sharp fa-solid fa-star"></i></div></div></div>';
    $output .= '</div>'; // Close item-left
    $output .= '<div class="item-right">';
    $output .= '<div class="item-specs"><div class="item-title"><h2>' . esc_html($item_title) . '</h2><hr></div>' . $specs_list . '</div>';
    $output .= '<div class="item-buy-btn"><div class="item-bubble">Save up to ' . esc_html($item_save) . ' <br>' . number_format(esc_html($item_visitors)) . ' VISITORS BOUGHT<br> DURING SALE</div>';
    $output .= '<p><a href="' . esc_url($item_link) . '">Visit ' . esc_html($item_title) . ' &gt;</a></p></div>';
    $output .= '</div>'; // Close item-right
    $output .= '</div>'; // Close sbly--review-top-1-item

    // Footer section for features
    $output .= do_shortcode($content); // Process nested feature shortcodes
    
    $output .= '</div>'; // This closes the main item wrapper, sbly--review-top-1

    return $output;
}
add_shortcode('sbly_top_product_item', 'sbly_top_product_item_shortcode');

// Feature shortcode
function sbly_top_product_item_feature_shortcode($atts) {

    $output = '<div class="sbly--review-top-1-footer">';    
    // Check if 'item_feature' is provided
    if (!empty($atts['item_feature'])) {
        // Separate multiple features using a unique delimiter, like '||'
        $features = explode('||', $atts['item_feature']);
        
        foreach ($features as $feature) {
            // Now split each feature into its parts: image, title, and text
            $parts = explode('|', $feature);
            
            if (count($parts) === 3) {
                // Assign parts to variables
                list($img, $title, $text) = $parts;

                // Construct HTML for each feature
                $output .= '<div class="sbly--review-top-1-feature">';
                $output .= '<div class="item-left"><img src="' . esc_url(trim($img)) . '"></div>';
                $output .= '<div class="item-right">';
                $output .= '<p class="feature-title">' . esc_html(trim($title)) . '</p>';
                $output .= '<p class="feature-text">' . esc_html(trim($text)) . '</p>';
                $output .= '</div>';
                $output .= '</div>';
            }
            // Optionally handle the else case if the format does not match
        }
    }
    $output .= '</div>'; // Close sbly--review-top-1-footer

    return $output;
}
add_shortcode('sbly_top_product_item_feature', 'sbly_top_product_item_feature_shortcode');
