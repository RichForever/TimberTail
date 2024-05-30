<?php

/**
 * @package WordPress
 * @subpackage TimberTail
 * @since TimberTail 1.0.0
 */

$context = Timber::context();
$context['posts'] = Timber::get_posts();

Timber::render( 'searchform.twig', $context );