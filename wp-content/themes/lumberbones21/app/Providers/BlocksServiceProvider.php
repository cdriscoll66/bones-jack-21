<?php

namespace App\Providers;

use Rareloop\Lumberjack\Facades\Config;
use Rareloop\Lumberjack\Providers\ServiceProvider;

class BlocksServiceProvider extends ServiceProvider
{
    /**
     * Register any app specific items into the container
     */
    public function register()
    {
    }

    /**
     * Add filters to for all configured blocks.
     */
    public function boot()
    {
        $blocks = Config::get('blocks.controllers', []);

        foreach ($blocks as $blockName => $className) {
            add_filter("timber/acf-gutenberg-blocks-data/{$blockName}", function ($context) use ($className) {
                $blockController = new $className($context);
                return $blockController->getContext();
            });
        }
    }
}
