<?php

/**
 * @package WordPress
 * @subpackage wpstarter
 * @since wpstarter 1.0
 */

use Timber\Timber;

$context = Timber::context();

Timber::render('404.twig', $context);
