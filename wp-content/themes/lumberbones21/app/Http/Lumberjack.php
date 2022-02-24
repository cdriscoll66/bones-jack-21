<?php

namespace App\Http;

use Rareloop\Lumberjack\Http\Lumberjack as LumberjackCore;
use App\Menu\Menu;

class Lumberjack extends LumberjackCore
{
    public function addToContext($context)
    {
        $context['is_home']                = is_home();
        $context['is_front_page']          = is_front_page();
        $context['is_logged_in']           = is_user_logged_in();
        $context['is_admin']               = is_admin();
        $context['is_404']                 = is_404();
        $context['is_search']              = is_search();
        $context['is_category']            = is_category();
        $context['is_tag']                 = is_tag();
        $context['is_archive']             = is_archive();
        $context['is_post_type_archive']   = is_post_type_archive();
        $context['is_tax']                 = is_tax();
        $context['is_singular']            = is_singular();
        $context['is_single']              = is_single();
        $context['is_page']                = is_page();
        $context['is_paged']               = is_paged();
        $context['post_password_required'] = post_password_required();


        // In Timber, you can use TimberMenu() to make a standard Wordpress menu available to the
        // Twig template as an object you can loop through. And once the menu becomes available to
        // the context, you can get items from it in a way that is a little smoother and more
        // versatile than Wordpress's wp_nav_menu. (You need never again rely on a
        // crazy "Walker Function!")
        $context['menu'] = new Menu('main-nav');
        $context['footer1'] = new Menu('footer1');
        $context['home_url'] = home_url();
        $context['site_title'] = get_bloginfo('name');

        return $context;
    }
}
