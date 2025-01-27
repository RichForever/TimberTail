<?php

/**
 * @package WordPress
 * @subpackage TimberTail
 * @since TimberTail 1.0.0
 */

$context = Timber::context();
$timber_post = Timber::get_post();
$context["post"] = $timber_post;

if (post_password_required($timber_post->ID)) {
    Timber::render("single-password.twig", $context);
} else {
    Timber::render(
        [
            "single-" . $timber_post->ID . ".twig",
            "single-" . $timber_post->post_type . ".twig",
            "single-" . $timber_post->slug . ".twig",
            "single.twig",
        ],
        $context
    );
}
