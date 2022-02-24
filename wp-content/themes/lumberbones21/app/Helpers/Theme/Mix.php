<?php

namespace App\Helpers\Traits\Theme;

trait Mix
{

    /**
     * Gets the path to a versioned Mix file.
     *
     * Inspired by <https://www.sitepoint.com/use-laravel-mix-non-laravel-projects/>
     *
     * @param string $path The relative path to the file.
     * @return string The file URL.
     */
    public static function mix(string $path) : string
    {
        static $public_path = '/dist';
        static $manifest_path;
        static $manifest;

        if (!$manifest_path) {
            $manifest_path = get_theme_file_path($public_path . '/mix-manifest.json');
        }

        // Bailout if manifest couldn’t be found
        if (!file_exists($manifest_path)) {
            return $path;
        }

        if (!$manifest) {
            $manifest = json_decode(file_get_contents($manifest_path), true);
        }

        // Make sure there’s a leading slash
        $path = '/' . ltrim($path, '/');

        // Bailout with default theme path if file could not be found in manifest
        if (!array_key_exists($path, $manifest)) {
            return $path;
        }

        // Get file URL from manifest file
        $path = $manifest[$path];

        return get_theme_file_uri($public_path . $path);
    }
}
