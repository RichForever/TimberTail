<?php

/**
 * @package WordPress
 * @subpackage wpstarter
 * @since wpstarter 1.0
 */

header( "HTTP/1.1 301 Moved Permanently" );
header( "Location: " . get_bloginfo( 'url' ) );
exit();
?>