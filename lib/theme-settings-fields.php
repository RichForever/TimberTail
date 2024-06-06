<?php
// Custom header scripts
function timbertail_print_custom_code_head() {
    $custom_code_head = get_option('custom_code_head');
    if (!empty($custom_code_head)) {
        echo $custom_code_head;
    }
}
add_action('wp_head', 'timbertail_print_custom_code_head');

// Custom body scripts
function timbertail_print_custom_code_body() {
    $custom_code_body = get_option('custom_code_body');
    if (!empty($custom_code_body)) {
        echo $custom_code_body;
    }
}
add_action('wp_body_open', 'timbertail_print_custom_code_body');

// Custom footer scripts
function timbertail_print_custom_code_footer() {
    $custom_code_footer = get_option('custom_code_footer');
    if (!empty($custom_code_footer)) {
        echo $custom_code_footer;
    }
}
add_action('wp_footer', 'timbertail_print_custom_code_footer');