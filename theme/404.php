<?php

/**
 * @package WordPress
 * @subpackage wpstarter
 * @since wpstarter 1.0
 */

//use Timber\Timber;
//
//$context = Timber::context();
//
//Timber::render('404.twig', $context);

// add redirect to homepage instead of showing page

header( "HTTP/1.1 301 Moved Permanently" );
header( "Location: " . get_bloginfo( 'url' ) );
exit();
?>