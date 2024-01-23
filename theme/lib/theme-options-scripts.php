<?php
function theme_custom_header_scripts(){
	echo get_field('options_head_scripts', 'option');
};
add_action('wp_head', 'theme_custom_header_scripts');

function theme_custom_body_scripts(){
	echo get_field('options_body_scripts', 'option');
}
add_action('wp_body_open', 'theme_custom_body_scripts');

function theme_custom_footer_scripts(){
	echo get_field('options_footer_scripts', 'option');
};
add_action('wp_footer', 'theme_custom_footer_scripts');