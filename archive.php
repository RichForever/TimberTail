<?php

/**
 * @package WordPress
 * @subpackage TimberTail
 * @since TimberTail 1.0.0
 */

$templates = ["archive.twig", "index.twig"];

$context = Timber::context();

$context["title"] = "Archiwum";

if (is_day()) {
    $context["title"] = "Archiwum: " . get_the_date("D M Y");
} elseif (is_month()) {
    $context["title"] = "Archiwum: " . get_the_date("M Y");
} elseif (is_year()) {
    $context["title"] = "Archiwum: " . get_the_date("Y");
} elseif (is_tag()) {
    $context["title"] = single_tag_title("", false);
} elseif (is_post_type_archive()) {
    $context["title"] = post_type_archive_title("", false);
    array_unshift($templates, "archive-" . get_post_type() . ".twig");
}

$context["posts"] = Timber::get_posts();

Timber::render($templates, $context);
