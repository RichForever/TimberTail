<?php
// Custom header scripts
function timbertail_render_custom_code_head() {
	$custom_codes_head = get_option('custom_codes_head');
	if (!empty($custom_codes_head)) {
		echo $custom_codes_head;
	}
}
add_action('wp_head', 'timbertail_render_custom_code_head');

// Custom body scripts
function timbertail_render_custom_code_body() {
	$custom_codes_body = get_option('custom_codes_body');
	if (!empty($custom_codes_body)) {
		echo $custom_codes_body;
	}
}
add_action('wp_body_open', 'timbertail_render_custom_code_body');

// Custom footer scripts
function timbertail_render_custom_code_footer() {
	$custom_codes_footer = get_option('custom_codes_footer');
	if (!empty($custom_codes_footer)) {
		echo $custom_codes_footer;
	}
}
add_action('wp_footer', 'timbertail_render_custom_code_footer');