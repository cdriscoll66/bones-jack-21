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
            // wp_enqueue_style('adobe-fonts', 'https://use.typekit.net/xxxxxxx.css', [], false); // Example Project, exampleproject.com, teamcolab@gmail.com, https://fonts.adobe.com/my_fonts#web_projects-section
            // wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap', [], false); // Example Project, exampleproject.com, https://fonts.google.com/share?selection.family=Open%20Sans:ital,wght@0,400;0,700;1,400;1,700

            // wp_enqueue_script('font-awesome', 'https://kit.fontawesome.com/ba12f70f00.js', [], false, true); // Development kit, support+colab@teamcolab.com, https://fontawesome.com/kits/ba12f70f00/use
            // wp_enqueue_script('font-awesome', 'https://kit.fontawesome.com/xxxxxxxxxx.js', [], false, true); // Example Project, exampleproject.com, https://fontawesome.com/kits/xxxxxxxxxx/use

            /**
             * AddThis
             *
             * @link https://www.addthis.com/dashboard#gallery/pub/ra-$addthis_api_key
             */
            // if (is_singular()) :
            //     wp_enqueue_script('addthis', sprintf('https://s7.addthis.com/js/300/addthis_widget.js#pubid=ra-%s', '58d571ec084c2098'), [], false); // Development account, dylan@teamcolab.com
            //     // wp_enqueue_script('addthis', sprintf('https://s7.addthis.com/js/300/addthis_widget.js#pubid=ra-%s', 'xxxxxxxxxxxxxxxx'), [], false); // Example Project, exampleproject.com
            // endif;

            /**
             * Google Maps JavaScript API
             *
             * @link https://console.developers.google.com/apis/dashboard
             */
            // if (is_singular()) :
            //     wp_enqueue_script('google-maps', sprintf('https://maps.googleapis.com/maps/api/js?key=%s', 'AIzaSyAXH1xcFzdKDUThZC_LIe0ZfW1j_c4Fdns'), [], false); // Development account, exampleproject.com, dylan@teamcolab.com, unrestricted
            //     // wp_enqueue_script('google-maps', sprintf('https://maps.googleapis.com/maps/api/js?key=%s', 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx'), [], false); // Example Project, exampleproject.com, teamcolab@gmail.com, restricted
            // endif;

            wp_enqueue_style('lumberjack/theme.css', Theme::mix('/styles/theme.css'), [], false);
            wp_enqueue_script('lumberjack/theme.js', Theme::mix('/scripts/theme.js'), ['jquery'], false, true);

            wp_enqueue_style('lumberjack/print.css', Theme::mix('/styles/print.css'), [], false, 'print');

            if (is_singular() && comments_open() && get_option('thread_comments')) {
                wp_enqueue_script('comment-reply');
            }
        }, 100);

        add_action('login_enqueue_scripts', function () {
            wp_enqueue_style('lumberjack/login.css', Theme::mix('/styles/login.css'), [], false);
            wp_enqueue_script('lumberjack/login.js', Theme::mix('/scripts/login.js'), ['jquery'], false, true);
        });

        add_action('admin_enqueue_scripts', function () {

            /**
             * Fonts
             */
            // wp_enqueue_script('font-awesome', 'https://kit.fontawesome.com/ba12f70f00.js', [], false, true); // Development kit, support+colab@teamcolab.com, https://fontawesome.com/kits/ba12f70f00/use
            // wp_enqueue_script('font-awesome', 'https://kit.fontawesome.com/xxxxxxxxxx.js', [], false, true); // Example Project, exampleproject.com, https://fontawesome.com/kits/xxxxxxxxxx/use

            wp_enqueue_style('lumberjack/admin.css', Theme::mix('/styles/admin.css'), [], false);
            wp_enqueue_script('lumberjack/admin.js', Theme::mix('/scripts/admin.js'), ['jquery', 'wp-blocks'], false, true);
        });

        add_action('enqueue_block_editor_assets', function () {
            wp_enqueue_script('lumberjack/blocks.js', Theme::mix('/scripts/blocks.js'), ['wp-blocks', 'wp-dom-ready', 'wp-edit-post'], false, true);
            wp_localize_script('lumberjack/blocks.js', 'blocksAllowed', apply_filters('colab_blocks_localized_data', []));
        });
    }
}
