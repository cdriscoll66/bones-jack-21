<?php

namespace App\Providers;

use Rareloop\Lumberjack\Providers\ServiceProvider;
use App\Helpers\Theme;

class AssetsServiceProvider extends ServiceProvider
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
        add_action('wp_enqueue_scripts', function () {

            /**
             * Fonts
             */
            wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap', [], false); // Example Project, exampleproject.com, https://fonts.google.com/share?selection.family=Open%20Sans:ital,wght@0,400;0,700;1,400;1,700

            wp_enqueue_style('lumberjack/theme.css', Theme::mix('/styles/theme.css'), [], false);
            wp_enqueue_script('lumberjack/theme.js', Theme::mix('/scripts/theme.js'), ['jquery'], false, true);

            wp_enqueue_style('lumberjack/print.css', Theme::mix('/styles/print.css'), [], false, 'print');

            if (is_singular() && comments_open() && get_option('thread_comments')) {
                wp_enqueue_script('comment-reply');
            }
        }, 100);

        add_action('login_enqueue_scripts', function () {
            wp_enqueue_style('lumberjack/login.css', Theme::mix('/styles/login.css'), [], false);
        });

        add_action('admin_enqueue_scripts', function () {
            wp_enqueue_style('lumberjack/admin.css', Theme::mix('/styles/admin.css'), [], false);
        });

        add_action('enqueue_block_editor_assets', function () {
            wp_enqueue_script('lumberjack/blocks.js', Theme::mix('/scripts/blocks.js'), ['wp-blocks', 'wp-dom-ready', 'wp-edit-post'], false, true);
            wp_localize_script('lumberjack/blocks.js', 'blocksAllowed', apply_filters('colab_blocks_localized_data', []));
        });
    }
}
