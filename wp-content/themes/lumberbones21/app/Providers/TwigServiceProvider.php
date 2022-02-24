<?php

namespace App\Providers;

use Rareloop\Lumberjack\Providers\ServiceProvider;
use Twig\Environment;

class TwigServiceProvider extends ServiceProvider
{
    /**
     * Register any app specific items into the container
     */
    public function register()
    {
    }

    /**
     * Perform any additional boot required for this application
     */
    public function boot()
    {
        add_action('timber/twig/filters', array($this, 'addFilters'));
        add_action('timber/twig/functions', array($this, 'addFunctions'));
    }

    /**
     * Adds filters to Twig.
     *
     * @param \Twig\Environment $twig The Twig Environment.
     * @return \Twig\Environment
     */
    public function addFilters(Environment $twig)
    {
        // $twig->addFilter(...);
        return $twig;
    }

    /**
     * Adds functions to Twig.
     *
     * @param \Twig\Environment $twig The Twig Environment.
     * @return \Twig\Environment
     */
    public function addFunctions(Environment $twig)
    {
        // $twig->addFunction(...);
        return $twig;
    }
}
