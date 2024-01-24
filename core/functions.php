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

function rp_author_review_sc($atts, $content = null) {
    $atts = shortcode_atts(
        array(
            'avatar' => '',
            'author' => '',
            'position' => '',
        ),
        $atts,
        'rp_author_review'
    );

    $avatar = $atts['avatar'];
    $author = $atts['author'];
    $position = $atts['position'];

    $html = '
        <div class="review-author-container">
            <div class="ra-bio">
                <div class="ra-avatar">
                    <img src="' . esc_url($avatar) . '" alt="' . esc_attr($author) . ' Avatar">
                </div>
                <div class="ra-info">
                    <div class="ra-name">' . esc_html($author) . '</div>
                    <div class="ra-tag">' . esc_html($position) . '</div>
                </div>
            </div>
            <div class="ra-description">' . do_shortcode($content) . '</div>
        </div>
    ';

    return $html;
}
add_shortcode('rp_author_review', 'rp_author_review_sc');


// Define [pros] shortcode
function rp_excerpt_shortcode($atts, $content = null) {
    return '<div class="rp-excerpt">' . $content . '</div>';
}
add_shortcode('rp_excerpt', 'rp_excerpt_shortcode');

function rp_pros_shortcode($atts, $content = null) {
    return '<ul class="rp-pros"><li>' . str_replace(', ', '</li><li>', $content) . '</li></ul>';
}
add_shortcode('rp_pros', 'rp_pros_shortcode');

// Define [cons] shortcode
function rp_cons_shortcode($atts, $content = null) {
    return '<ul class="rp-cons"><li>' . str_replace(', ', '</li><li>', $content) . '</li></ul>';
}
add_shortcode('rp_cons', 'rp_cons_shortcode');

// ========================================================================================================
// SPECIALIST SHORTCODE
// ========================================================================================================

function rp_item_review_sc($atts, $content = null) {
    
    $atts = shortcode_atts(
        array(
            'item_win_tag' => 'Best Memory Foam Pillow, Best Pillow for Side-Sleepers',
            'item_image' => 'https://pillowspecialist.com/img/saybrook-pillow.webp',
            'item_image_link' => 'Saybrook, https://example.com/',
            'item_score' => '9.8',
            'item_score_link' => 'https://example.com/',
            'item_specs_firmness' => 'Medium',
            'item_specs_loft' => 'Adjustable',
            'item_specs_positions' => 'Side, Stomach, Back',
            'item_specs_body_type' => 'Petite, Average, Big-and-tall',
            'item_specs_filling_score' => '5',
            'item_specs_quality_score' => '5',
            'item_style_border_color' => 'E6C300',
            'item_style_button_color' => 'EB5020'
        ),
        $atts,
        'rp_item_review'
    );
    
    $item_win_tag = explode(', ', $atts['item_win_tag']);
    $item_image = $atts['item_image'];
    $item_image_link = explode(', ', $atts['item_image_link']);
    $item_score = $atts['item_score'];
    $item_score_link = $atts['item_score_link'];
    $item_specs_firmness = $atts['item_specs_firmness'];
    $Item_specs_loft = $atts['item_specs_loft'];
    $item_specs_positions = $atts['item_specs_positions'];
    $item_specs_body_type = $atts['item_specs_body_type'];
    $item_specs_filling_score = $atts['item_specs_filling_score'];
    $item_specs_quality_score = $atts['item_specs_quality_score'];
    $item_style_border_color = $atts['item_style_border_color'];
    $item_style_button_color = $atts['item_style_button_color'];
    
    // Item Review Container
    $html = '<div class="review-product-container" style="border:solid 3px #' . esc_html($item_style_border_color) . ';" data-rating="' . esc_html($item_score) . '">';

    // Header

    $html .= '<div class="rp-header">
        <style></style>
        <div class="rp-winner" style="background">
            <strong>Winner: #<span class="win-no"></span></strong> out of <span class="total-no"></span>
        </div>

        <div class="rp-tags">';

        foreach ($item_win_tag as $tag) {
            $html .= '<div class="rp-tag">' . esc_html($tag) . '</div>';
        }

    $html .= '</div></div>';

    // Item Review
    $item_score_rate = ($item_score * 10) - 18;
    $html .= '
        <div class="rp-product-info">
            
            <div class="rp-image">
                <img src="' . esc_url($item_image) . '">
                <a href="' . esc_url($item_image_link[1]) . '" class="rp-image-link">' . esc_html($item_image_link[0]) . '</a>
                <a href="' . esc_url($item_score_link) . '" class="rp-rating-link mobile-only" style="background:#'.esc_html($item_style_button_color).'">Check Price</a>
            </div>
            
            <div class="rp-description">
            '.do_shortcode($content).'
            </div>
            
            <div class="rp-rating">
                
                <div class="rp-score score-98">
                    <div class="score">' . esc_html($item_score) . '</div>
                </div>
                <a href="' . esc_url($item_score_link) . '" class="rp-rating-link" style="background:#'.esc_html($item_style_button_color).'" target="_blank">Check Price</a>

            </div>
        
        </div>';

    // Specs Rating
    $html .= '
        <div class="rp-specs">

            <div class="rp-col">
                        
                <div class="rp-spec">
                    <div class="spec-name">Firmness / Softness:</div>
                    <div class="spec-content">' . esc_html($item_specs_firmness) . '</div>
                </div>
                <div class="rp-spec">
                    <div class="spec-name">Starting Loft:</div>
                    <div class="spec-content">' . esc_html($Item_specs_loft) . '</div>
                </div>
                <div class="rp-spec">
                    <div class="spec-name">Sleep Positions:</div>
                    <div class="spec-content">' . esc_html($item_specs_positions) . '</div>
                </div>
                <div class="rp-spec">
                    <div class="spec-name">Body Types:</div>
                    <div class="spec-content">' . esc_html($item_specs_body_type) . '</div>
                </div>
                
            </div>
            
            <div class="rp-col">
                
                <div class="rp-spec">
                    <div class="spec-name">Filling Comfort:</div>
                    <div class="spec-content">
                        <div class="rp-star-rating" data-rating-score="' . esc_attr($item_specs_filling_score) . '"></div>
                    </div>
                </div>

                <div class="rp-spec">
                    <div class="spec-name">Construction Quality:</div>
                    <div class="spec-content">
                        <div class="rp-star-rating" data-rating-score="' . esc_attr($item_specs_quality_score) . '"></div>
                    </div>
                </div>
                
            </div>

        </div>
    ';

    $html .= '</div>';

    return $html;
    
}

add_shortcode( 'rp_item_review', 'rp_item_review_sc' );

// ========================================================================================================
// AT A GLANCE SHORTCODE
// ========================================================================================================

function rp_at_a_glance($atts, $content = null) {
  
  $atts = shortcode_atts(
      array(
          'item_style_border_color' => 'E6C300',
          'item_style_button_color' => 'EB5020'
      ),
      $atts,
      'rp_glance'
  );
 
  $item_style_border_color = $atts['item_style_border_color'];
  $item_style_button_color = $atts['item_style_button_color'];
  
  // Item Review Container
  $html = '<div class="review-product-container-glance review-glance" style="border:solid 3px #' . esc_html($item_style_border_color) . ';">';

  // Header

  $html .= '<div class="rp-header">

      <div class="rp-winner" style="background">
          <strong>At a glance:</span>
      </div>';

  $html .= '</div>';

  // Item Review
  $html .= '
      <div class="rp-product-info">

          <div class="rp-description">
          '.do_shortcode($content).'
          </div>
      
      </div>';


  $html .= '</div>';

  return $html;
  
}

add_shortcode( 'rp_glance', 'rp_at_a_glance' );

// ========================================================================================================
// WIRECUTTER SHORTCODE
// ========================================================================================================

function rp__review_sc($atts, $content = null) {

    static $count = 0; // Initialize and increment the count

    $count++; // Increment the count for each instance

    $atts = shortcode_atts(
        array(
            'item_label' => '',
            'item_title' => '',
            'item_tags' => '',
            'item_button_1' => '',
            'item_button_2' => '',
            'item_image' => '',
            'item_link' => '',
        ),
        $atts,
        'rp__review_sc'
    );

    $item_label = $atts['item_label'];
    $item_title = $atts['item_title'];
    $item_tags = explode(', ', $atts['item_tags']);
    $item_button_1 = explode(', ', $atts['item_button_1']);
    $item_button_2 = explode(', ', $atts['item_button_2']);
    $item_image = $atts['item_image'];
    $item_link = $atts['item_link'];

    // Item Review Container with data-count attribute
    $html = '<div class="review-card-container" data-count="' . $count . '">';

    // Header
    $html .= '<div class="review-header">';
    $html .= '<div class="review-winner"><strong>' . esc_html($item_label) . '</strong></div>';
    $html .= '</div>';

    // Item Review
    $html .= '<div class="review-info">';
    $html .= '<div class="review-col review-image">';
    $html .= '<a href="' . esc_url($item_link) . '"><img src="' . esc_url($item_image) . '"></a>';
    $html .= '</div>';

    $html .= '<div class="review-col review-description">';
    $html .= '<div class="review-title"><a href="' . esc_url($item_link) . '">' . esc_html($item_title) . '</a></div>';
    $html .= '<div class="review-tags">';

    foreach ($item_tags as $tag) {
        $html .= '<span class="tag">' . esc_html($tag) . '</span>, ';
    }

    $html .= '</div>';

        $html .= do_shortcode($content);

        $html .= '<div class="review-links">';

        // Check if item_button_1 exists
        if (!empty($item_button_1[0])) {
            $html .= '<a href="' . esc_url($item_button_1[2]) . '" class="review-link" target="_blank">' . esc_html($item_button_1[0]) . '<br/>(' . esc_html($item_button_1[1]) . ')</a>';
        }

        // Check if item_button_2 exists
        if (!empty($item_button_2[0])) {
            $html .= '<a href="' . esc_url($item_button_2[1]) . '" class="review-link" target="_blank">' . esc_html($item_button_2[0]) . '</a>';
        }

        $html .= '</div>';

    $html .= '</div>';

    $html .= '</div>';

    $html .= '</div>';

    return $html;

}

add_shortcode( 'rp__review', 'rp__review_sc' );

// ========================================================================================================
// SBLY REVIEW SLIDER
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
    $output .= '<a href="' . esc_url($link_url) . '">' . esc_html($link_title) . ' ';
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
