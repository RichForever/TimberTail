<?php

/**
 * @package WordPress
 * @subpackage TwigTail
 * @since TwigTail 1.0.0
 */

$context = Timber::context();
$context['posts'] = Timber::get_posts();

Timber::render( 'searchform.twig', $context );