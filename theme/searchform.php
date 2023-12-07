<?php

/**
 * @package WordPress
 * @subpackage Timberland
 * @since wpstarter 1.0
 */

$context = Timber::context();
$context['posts'] = Timber::get_posts();

Timber::render( 'searchform.twig', $context );