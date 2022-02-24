<?php

/**
 * Modify Enqueued Script Tags
 *
 * @link https://developer.wordpress.org/reference/hooks/script_loader_tag/
 * @link https://stackoverflow.com/questions/44827134/wordpress-script-with-integrity-and-crossorigin
 */
add_filter('script_loader_tag', function ($tag, $handle, $src) {
    $defer = [
        // 'jquery-core',
        // 'jquery-migrate',
        // 'lumberjack/theme.js'
    ];
    $async = [];
    $crossorigin = [
        'font-awesome' => 'crossorigin="anonymous"',
    ];

    // if ($handle === 'handlename') :
    //     $tag = '<script type="text/javascript" src="' . esc_url( $src ) . '" id="dropboxjs" data-app-key="MY_APP_KEY"></script>';
    // endif;

    if (in_array($handle, $defer)) :
        $tag = str_replace(' id', ' defer id', $tag);
    endif;

    if (in_array($handle, $async)) :
        $tag = str_replace(' id', ' async id', $tag);
    endif;

    if (array_key_exists($handle, $crossorigin)) :
        $tag = str_replace(' id', sprintf(' %s id', $crossorigin[$handle]), $tag);
    endif;

    return $tag;
}, 10, 3);
