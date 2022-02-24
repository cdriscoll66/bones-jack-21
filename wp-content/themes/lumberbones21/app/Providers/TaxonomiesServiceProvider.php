<?php

namespace App\Providers;

use Rareloop\Lumberjack\Config;
use Rareloop\Lumberjack\Providers\ServiceProvider;

class TaxonomiesServiceProvider extends ServiceProvider
{
    /**
     * Register any app specific items into the container
     */
    public function register()
    {

    }

    public function boot(Config $config)
    {
        $taxonomiesToRegister = $config->get('taxonomies.register');

        foreach ($taxonomiesToRegister as $taxonomy) {

            register_taxonomy(
                $taxonomy::getTaxonomy(),
                $taxonomy::getTaxonomyTypes(),
                $taxonomy::getTaxonomyConfig(),
            );
        }
    }
}
