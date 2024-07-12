<?php

/**
 * @package WordPress
 * @subpackage TimberTail
 * @since TimberTail 1.0.0
 */

$context = Timber::context();
$templates = ["index.twig"];
if (is_home()) {
    array_unshift($templates, "front-page.twig", "home.twig");
}
Timber::render($templates, $context);
