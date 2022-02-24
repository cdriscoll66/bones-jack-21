<?php
/**
 * Add Excerpt to Page
 */
add_action('after_setup_theme', function () {
    add_post_type_support('page', 'excerpt');
}, 20);
