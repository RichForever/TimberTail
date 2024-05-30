<?php
// modify the path to the above prefix
add_filter('acf_icon_path', 'acf_icon_path');
function acf_icon_path($path_suffix) {
    return plugin_dir_path(__FILE__);
}

add_filter('acf_icon_path_suffix', 'acf_icon_path_suffix');
function acf_icon_path_suffix( $path_suffix ) {
    return '/assets/icons/';
}

function timbertail_get_icon( $filename ) {
    $path = get_stylesheet_directory() . '/assets/icons/' . $filename . '.svg';
    if ( file_exists( $path ) ) {
        return file_get_contents( $path );
    }
}