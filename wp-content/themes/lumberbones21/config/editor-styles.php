<?php

/**
 * Enable Editor Styles
 *
 * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#editor-styles
 */
add_theme_support('editor-styles');

/**
 * Use Dark Editor Styles
 *
 * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#editor-styles
 */
// add_theme_support('dark-editor-style');

/**
 * Set Editor Styles
 *
 * @TODO Explore targeting dist/styles/theme.css
 *
 * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#enqueuing-the-editor-style
 */
add_editor_style('dist/styles/editor.css');
