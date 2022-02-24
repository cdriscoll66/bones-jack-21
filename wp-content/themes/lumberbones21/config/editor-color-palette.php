<?php

/**
 * Color Palette
 *
 * @requires /assets/styles/config/_colors.scss $color-palette
 * @requires /assets/styles/shared/constructs/_color-palette.scss
 *
 * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#block-color-palettes
 */

/**
 * Disable Custom Editor Colors
 */
// add_theme_support('disable-custom-colors');

/**
 * Define Custom Editor Colors
 */
add_theme_support('editor-color-palette', [
    [
        'name' => esc_attr__('Green Primary', 'colab'),
        'slug' => 'green-primary',
        'color' => '#2CA85E',
    ],
    [
        'name' => esc_attr__('Green Hover', 'colab'),
        'slug' => 'green-hover',
        'color' => '#1E7541',
    ],
    [
        'name' => esc_attr__('Blue Secondary', 'colab'),
        'slug' => 'blue-secondary',
        'color' => '#1a2d4f',
    ],
    [
        'name' => esc_attr__('Stone Secondary', 'colab'),
        'slug' => 'stone-secondary',
        'color' => '#121e34',
    ],
    [
        'name' => esc_attr__('Red Error', 'colab'),
        'slug' => 'red-error',
        'color' => '#EF5350',
    ],
    [
        'name' => esc_attr__('Gray Text', 'colab'),
        'slug' => 'gray-text',
        'color' => '#5d6676',
    ],
    [
        'name' => esc_attr__('Black', 'colab'),
        'slug' => 'black',
        'color' => '#000',
    ],
    [
        'name' => esc_attr__('White', 'colab'),
        'slug' => 'white',
        'color' => '#ffffff',
    ],
    [
        'name' => esc_attr__('Transparent', 'colab'),
        'slug' => 'transparent',
        'color' => 'transparent',
    ],
]);
