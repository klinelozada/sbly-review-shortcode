<?php

// ========================================================================================================
// SBLY - GLANCE
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