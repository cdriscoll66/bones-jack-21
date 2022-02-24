<?php
/**
 * Login Header Logo Link URL
 *
 * Set the login page logo link URL to the home URL. Use in conjuction with
 * styles that replace the logo image with a custom project specific image.
 */
add_filter('login_headerurl', function () {
    return home_url();
});

/**
 * Login Header Logo Title Attribute
 *
 * Set the login page logo title attribute. Use in conjuction with styles that
 * replace the logo image with a custom project specific image.
 */
add_filter('login_headertext', function () {
    return sprintf(__('%s', 'colab'), get_bloginfo('name'));
    // return sprintf(__('View %s', 'colab'), get_bloginfo('name'));
});
