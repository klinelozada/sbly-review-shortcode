<?php


// ========================================================================================================
// SBLY - RECOMMEND SLIDER
// ========================================================================================================

function sbly_slider_review_shortcode($atts, $content = null) {
    // Parse shortcode attributes
    extract(shortcode_atts(array(
        'headline' => '',
    ), $atts));

    // Process the content enclosed within the shortcode
    $content = do_shortcode($content);

    // Output the HTML structure
    $output = '<div class="sbly--review-container">';
    $output .= '<div class="sbly--review-headline"><h1>' . $headline . '</h1></div>';
    $output .= '<div class="sbly--review-slider-section">';
    $output .= '<div class="sbly--review-slider">';
    $output .= $content; // Output the processed content
    $output .= '</div>';
    $output .= '</div>';
    $output .= '</div>';

    return $output;
}
add_shortcode('sbly_slider_review', 'sbly_slider_review_shortcode');

function sbly_slider_item_shortcode($atts) {
    // Parse shortcode attributes
    extract(shortcode_atts(array(
        'item_headline' => '',
        'item_image' => '',
        'item_title' => '',
        'item_link' => '',
        'item_label' => '',
        'item_description' => '',
        'item_buying_options_1' => '',
        'item_buying_options_2' => '',
        'item_buying_options_3' => '',
        'item_buying_options_4' => '',
    ), $atts));

    // Create an array to hold the buying options
    $buying_options = array();

    // Check and add each buying option
    for ($i = 1; $i <= 4; $i++) {
        $option_key = 'item_buying_options_' . $i;
        if (!empty($$option_key)) {
            $buying_options[] = $$option_key;
        }
    }

    // Output the HTML structure for an individual item
    $output = '<div class="sbly--item">';
    $output .= '<div class="sbly--item-info">';
    $output .= '<div class="item-headline"><h1>' . $item_headline . '</h1></div>';
    $output .= '<div class="item-image"><img src="' . $item_image . '"></div>';
    $output .= '<div class="item-title"><a href="' . $item_link . '">' . $item_title . '</a></div>';
    $output .= '<div class="item-label">' . $item_label . '</div>';
    $output .= '<div class="item-description">' . $item_description . '</div>';
    $output .= '<div class="item-buying-options">';
    $output .= '<h3>Buying Options</h3>';
    $output .= '<div class="item-buying-options-list">';
    
    // Output the buying options as links
    foreach ($buying_options as $option) {
        $option_parts = explode(',', trim($option));
        if (count($option_parts) === 2) {
            $output .= '<a href="' . trim($option_parts[1]) . '" target="_blank">' . trim($option_parts[0]) . '</a>';
        }
    }
    
    $output .= '</div>';
    $output .= '</div>';
    $output .= '</div>';
    $output .= '</div>';

    return $output;
}
add_shortcode('sbly_slider_item', 'sbly_slider_item_shortcode');