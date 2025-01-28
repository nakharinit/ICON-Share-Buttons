<?php
/*
Plugin Name: ICON Share Buttons
Description: Minimal Social Sharing WordPress Plugin
Version: 1.1
Author: Nakharin
Author URI: https://www.nakharin.in.th
License: MIT
*/

// Add the share buttons to single post content
function custom_share_buttons($content) {
    if (is_single() && is_singular('post')) {
        $buttons = '<div class="custom-share-buttons-container">';
        $buttons .= '<strong>แชร์ :</strong>'; // Add "แชร์ :" text before the buttons
        $buttons .= '<div class="custom-share-buttons">';
        $buttons .= '<a href="#" onclick="navigator.clipboard.writeText(window.location.href); alert(\'คัดลอกลิงก์แล้ว!\');" class="custom-share-button copy-link" title="คัดลอกลิงก์">';
        $buttons .= '<i class="bi bi-clipboard"></i>';
        $buttons .= '</a>';
        $buttons .= '<a href="https://www.facebook.com/sharer/sharer.php?u=' . urlencode(get_permalink()) . '" target="_blank" class="custom-share-button facebook" title="แชร์ไปยัง Facebook">';
        $buttons .= '<i class="bi bi-facebook"></i>';
        $buttons .= '</a>';
        $buttons .= '<a href="https://line.me/R/msg/text/?' . urlencode(get_the_title()) . '%20' . urlencode(get_permalink()) . '" target="_blank" class="custom-share-button line" title="แชร์ไปยัง LINE">';
        $buttons .= '<i class="bi bi-line"></i>';
        $buttons .= '</a>';
        $buttons .= '<a href="https://x.com/intent/tweet?url=' . urlencode(get_permalink()) . '&text=' . urlencode(get_the_title()) . '" target="_blank" class="custom-share-button twitter" title="แชร์ไปยัง Twitter">';
        $buttons .= '<i class="bi bi-twitter"></i>';
        $buttons .= '</a>';
        $buttons .= '</div>';
        $buttons .= '</div>';

        $content .= $buttons;
    }
    return $content;
}
add_filter('the_content', 'custom_share_buttons');

// Enqueue custom styles and Bootstrap 5 icons
function custom_share_buttons_styles() {
    wp_enqueue_style('bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css');
    wp_enqueue_style('custom-share-buttons-style', plugins_url('custom-share-buttons.css', __FILE__));
}
add_action('wp_enqueue_scripts', 'custom_share_buttons_styles');
