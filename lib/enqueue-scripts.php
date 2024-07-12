<?php
require_once "manifest-mix.php";

wp_dequeue_style("wp-block-library");
wp_dequeue_style("wp-block-library-theme");
wp_dequeue_style("wc-block-style");
if (!is_admin()) {
    wp_dequeue_script("jquery");
}

$mixPublicPath = get_template_directory() . "/dist";

wp_enqueue_style(
    "style",
    get_template_directory_uri() .
        "/dist/" .
        mix("app-styles.css", $mixPublicPath)
);
wp_enqueue_style(
    "theme",
    get_template_directory_uri() . "/dist/" . mix("theme.css", $mixPublicPath)
);
wp_enqueue_script(
    "app",
    get_template_directory_uri() .
        "/dist/" .
        mix("app-scripts.js", $mixPublicPath),
    [],
    "",
    true
);
wp_localize_script("app", "wp", [
    "siteUrl" => home_url(),
]);
