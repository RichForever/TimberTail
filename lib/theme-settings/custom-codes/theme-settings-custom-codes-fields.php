<?php
function timbertail_render_custom_code($type)
{
    $current_lang = pll_current_language();
    $custom_codes = "";

    if ($current_lang) {
        $custom_codes = get_option(
            "custom_codes_" . $type . "_" . $current_lang
        );
    }

    if (empty($custom_codes)) {
        $custom_codes = get_option("custom_codes_" . $type);
    }

    if (!empty($custom_codes)) {
        echo $custom_codes;
    }
}

function timbertail_render_custom_code_head()
{
    timbertail_render_custom_code("head");
}

function timbertail_render_custom_code_body()
{
    timbertail_render_custom_code("body");
}

function timbertail_render_custom_code_footer()
{
    timbertail_render_custom_code("footer");
}

add_action("wp_head", "timbertail_render_custom_code_head");
add_action("wp_body_open", "timbertail_render_custom_code_body");
add_action("wp_footer", "timbertail_render_custom_code_footer");
