<?php

/**
 * @package WordPress
 * @subpackage wpstarter
 * @since wpstarter 1.0
 */

use Timber\Post;
use Timber\Timber;

$post = new Post();

$context = Timber::context();

$context['post'] = $post;

if (post_password_required($post->id)) {
    Timber::render('single-password.twig', $context);
} else {
    Timber::render('single.twig', $context);
}
