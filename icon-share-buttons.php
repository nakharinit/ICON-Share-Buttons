<?php
/*
Plugin Name: ICON Share Buttons
Description: A plugin to display custom share buttons like in the provided image.
Version: 1.0
Author: Nakharin
Author URI: https://www.nakharin.in.th
License: MIT
*/

// Add the share buttons to single post content
function custom_share_buttons($content) {
    if (is_single() && is_singular('post')) {
        $buttons = '<div style="border: 1px solid #ddd; padding: 10px; margin-top: 20px; display: flex; align-items: center; gap: 10px;">';
        $buttons .= '<strong>แชร์ :</strong>'; // Add "แชร์ :" text before the buttons
        $buttons .= '<div class="custom-share-buttons" style="display: flex; gap: 10px;">';
        $buttons .= '<a href="#" onclick="navigator.clipboard.writeText(window.location.href); alert(\'คัดลอกลิงก์แล้ว!\');" style="text-decoration: none; width: 40px; height: 40px; display: flex; justify-content: center; align-items: center; border-radius: 50%; background-color: #FF6347; color: white;" title="คัดลอกลิงก์">';
        $buttons .= '<i class="bi bi-clipboard" style="font-size: 1.5rem;"></i>';
        $buttons .= '</a>';
        $buttons .= '<a href="https://www.facebook.com/sharer/sharer.php?u=' . urlencode(get_permalink()) . '" target="_blank" style="text-decoration: none; width: 40px; height: 40px; display: flex; justify-content: center; align-items: center; border-radius: 50%; background-color: #3B5998; color: white;" title="แชร์ไปยัง Facebook">';
        $buttons .= '<i class="bi bi-facebook" style="font-size: 1.5rem;"></i>';
        $buttons .= '</a>';
        $buttons .= '<a href="https://line.me/R/msg/text/?' . urlencode(get_the_title()) . '%20' . urlencode(get_permalink()) . '" target="_blank" style="text-decoration: none; width: 40px; height: 40px; display: flex; justify-content: center; align-items: center; border-radius: 50%; background-color: #00C300; color: white;" title="แชร์ไปยัง LINE">';
        $buttons .= '<i class="bi bi-line" style="font-size: 1.5rem;"></i>'; // Updated to use Line icon
        $buttons .= '</a>';
        $buttons .= '<a href="https://x.com/intent/tweet?url=' . urlencode(get_permalink()) . '&text=' . urlencode(get_the_title()) . '" target="_blank" style="text-decoration: none; width: 40px; height: 40px; display: flex; justify-content: center; align-items: center; border-radius: 50%; background-color: #000000; color: white;" title="แชร์ไปยัง Twitter">';
        $buttons .= '<i class="bi bi-twitter-x" style="font-size: 1.5rem;"></i>'; // Updated to use Twitter-X icon
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
}
add_action('wp_enqueue_scripts', 'custom_share_buttons_styles');
