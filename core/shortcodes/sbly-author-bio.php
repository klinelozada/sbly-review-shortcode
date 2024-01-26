<?php

// ========================================================================================================
// SBLY - BIO
// ========================================================================================================

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