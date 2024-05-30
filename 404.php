<?php

/**
 * @package WordPress
 * @subpackage TimberTail
 * @since TimberTail 1.0.0
 */

header( "HTTP/1.1 301 Moved Permanently" );
header( "Location: " . get_bloginfo( 'url' ) );
exit();
?>