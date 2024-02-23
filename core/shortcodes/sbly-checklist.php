<?php
// ========================================================================================================
// SBLY CHECKLIST
// ========================================================================================================

// Add the shortcode function to your theme's functions.php file or a custom plugin
function sbly_checklist_shortcode($atts, $content = null) {
    // Extract shortcode attributes
    $atts = shortcode_atts(array(
        'headline' => '',
        'link' => '',
    ), $atts);

    // Split the 'link' attribute into title and URL
    $link_parts = explode(', ', $atts['link']);
    $link_title = $link_parts[0];
    $link_url = $link_parts[1];

    // Parse the checklist items within the shortcode
    $checklist_items = do_shortcode($content);

    // Create the HTML for the checklist section
    $output = '<div class="sbly--checklist-section">';
    $output .= '<div class="sbly--checklist-header">';
    $output .= '<div class="sbly--headline">';
    $output .= '<h1>' . esc_html($atts['headline']) . '</h1>';
    $output .= '</div>';
    $output .= '<div class="sbly--read-more">';
    $output .= '<a href="' . esc_url($link_url) . '" target="_blank">' . esc_html($link_title) . ' ';
    $output .= '<svg width="18" height="11" viewBox="0 0 18 11" fill="currentColor" xmlns="http://www.w3.org/2000/svg">';
    $output .= '<path fill-rule="evenodd" clip-rule="evenodd" d="M15.3302 6.13884L1.11684e-07 6.13884L0 4.86133L15.3302 4.86133L15.3302 6.13884Z"></path>';
    $output .= '<path fill-rule="evenodd" clip-rule="evenodd" d="M15.2891 5.49932L11.5703 1.68697L12.4848 0.794922L17.0738 5.49932L12.4848 10.2037L11.5703 9.31168L15.2891 5.49932Z"></path>';
    $output .= '</svg>';
    $output .= '</a>';
    $output .= '</div>';
    $output .= '</div>';
    $output .= '<ul class="sbly--checklist">';
    $output .= $checklist_items; // Insert the parsed checklist items here
    $output .= '</ul>';
    $output .= '</div>';

    return $output;
}
add_shortcode('sbly_checklist', 'sbly_checklist_shortcode');

// Add the shortcode function for checklist items
function sbly_checklist_item_shortcode($atts, $content = null) {
    // Extract shortcode attributes
    $atts = shortcode_atts(array(
        'title' => '',
        'description' => '',
    ), $atts);

    // Create the HTML for a checklist item
    $output = '<li class="sbly--checklist-item">';
    $output .= '<svg width="22" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">';
    $output .= '<path fill-rule="evenodd" clip-rule="evenodd" d="M18.1387 9.99997C18.1387 14.495 14.4948 18.1389 9.99979 18.1389C5.50481 18.1389 1.8609 14.495 1.8609 9.99998C1.8609 5.50499 5.5048 1.86109 9.99979 1.86108C12.2301 1.86108 14.2508 2.75817 15.7209 4.21119L10.3614 11.0357L7.58994 7.50669C7.33411 7.18092 6.86263 7.12423 6.53687 7.38007C6.2111 7.6359 6.15441 8.10738 6.41025 8.43314L9.77155 12.7132C9.91374 12.8943 10.1312 13 10.3614 13C10.5916 13 10.8091 12.8943 10.9512 12.7132L16.7055 5.38614C17.6094 6.6974 18.1387 8.28688 18.1387 9.99997ZM17.6686 4.15979C18.9046 5.78038 19.6387 7.80446 19.6387 9.99997C19.6387 15.3234 15.3232 19.6389 9.99979 19.6389C4.67638 19.6389 0.360901 15.3234 0.360901 9.99998C0.360901 4.67656 4.67638 0.361084 9.99979 0.361084C12.5795 0.361084 14.9226 1.37453 16.6525 3.02501L18.4102 0.786776C18.6661 0.461013 19.1376 0.404324 19.4633 0.660157C19.7891 0.915991 19.8458 1.38747 19.5899 1.71323L17.6686 4.15979Z" fill="black"></path>';
    $output .= '</svg>';
    $output .= '<div class="sbly--checklist-item-list">';
    $output .= '<div class="title">' . esc_html($atts['title']) . '</div>';
    $output .= '<div class="description">' . esc_html($atts['description']) . '</div>';
    $output .= '</div>';
    $output .= '</li>';

    return $output;
}
add_shortcode('sbly_checklist_item', 'sbly_checklist_item_shortcode');