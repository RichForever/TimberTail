<?php

$blockName = basename(__DIR__) . "-block";
$context = Timber::context();
$context["fields"] = get_fields();
$context["block"] = [
    "id" => uniqid(),
    "name" => $block["name"],
    "anchor" => !empty($block["anchor"])
        ? 'id="' . esc_attr($block["anchor"]) . '" '
        : "",
    "customClass" => !empty($block["className"])
        ? $blockName . " " . $block["className"]
        : $blockName,
    "backgroundColor" => !empty($block["backgroundColor"])
        ? "has-background-color-" . $block["backgroundColor"]
        : "",
    "textColor" => !empty($block["textColor"])
        ? "has-text-color-" . $block["textColor"]
        : "",
];

$context["block"]["colors"] = trim(
    $context["block"]["backgroundColor"] . " " . $context["block"]["textColor"]
);
$context["attributes"] = $block["attributes"];

Timber::render("block.twig", $context);
