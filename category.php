<?php

$context = Timber::context();
$context["posts"] = Timber::get_posts();
$context["title"] = single_cat_title("", false);
$context["categories"] = Timber::get_terms("category", ["hide_empty" => false]);

Timber::render("category.twig", $context);
