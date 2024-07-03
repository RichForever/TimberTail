<?php
require_once "manifest-mix.php";

add_theme_support('automatic-feed-links');
add_theme_support(
	'html5',
	[
		'comment-form',
		'comment-list',
		'gallery',
		'caption'
	]
);
add_theme_support('menus');
add_theme_support('post-thumbnails');
add_theme_support('title-tag');
add_theme_support('editor-styles');
add_theme_support( 'custom-logo' );

// register editor styles
$mixPublicPath = get_template_directory() . '/dist';
add_editor_style(get_template_directory_uri() . '/dist/' . mix("editor-styles.css", $mixPublicPath));

function enqueue_theme_editor_custom_assets() {
    $template_slug = get_page_template_slug();
    if('page-content.php' === $template_slug) {
        $mixPublicPath = get_template_directory() . '/dist';
        wp_enqueue_script('editor-scripts-js', get_template_directory_uri() . '/dist/' . mix("editor-scripts.js", $mixPublicPath), [
            'wp-blocks',
            'wp-element',
            'wp-components',
            'wp-i18n'
        ]);
    }
}
add_action('enqueue_block_editor_assets', 'enqueue_theme_editor_custom_assets');
