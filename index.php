<?php

/**
 * @package WordPress
 * @subpackage TwigTail
 * @since TwigTail 1.0.0
 */

$context   = Timber::context();
$templates = array( 'index.twig' );
if ( is_home() ) {
	array_unshift( $templates, 'front-page.twig', 'home.twig' );
}
Timber::render( $templates, $context );