<?php
function mix($path, $manifestDirectory)
{
    static $manifest;

    if (!$manifest) {
        if (
            !file_exists($manifestPath = $manifestDirectory . "/manifest.json")
        ) {
            throw new Exception("The Mix manifest does not exist.");
        }
        $manifest = json_decode(file_get_contents($manifestPath), true);
    }

    if (strpos($path, "/") !== 0) {
        $path = "{$path}";
    }

    if (!array_key_exists($path, $manifest)) {
        throw new Exception(
            "Unable to locate Mix file: {$path}. Please check your webpack.mix.js output paths and try again."
        );
    }

    return $manifest[$path];
}
