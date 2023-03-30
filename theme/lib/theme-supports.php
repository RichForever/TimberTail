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

// register editor styles
$mixPublicPath = get_template_directory() . '/dist';
add_editor_style(get_template_directory_uri() . '/dist/' . mix("editor.css", $mixPublicPath));