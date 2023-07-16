<?php

/**
 * @package WordPress
 * @subpackage Timberland
 * @since Timberland 1.1.0
 */

use Timber\Post;
use Timber\Timber;

$post = new Post();

$context = Timber::context();
$context['post'] = $post;
if(is_404()) {
	$context['page'] = '404';
}

Timber::render(['page-' . $post->slug . '.twig', 'page.twig'], $context);
