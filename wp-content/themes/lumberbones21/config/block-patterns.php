<?php
/**
 * Remove Core Block Patterns
 */
remove_theme_support('core-block-patterns');

/**
 * Register Block Pattern Categories
 *
 * @notice If you remove core-block-patterns you must register a block category
 * if you intend to register custom patterns.
 */
register_block_pattern_category('custom', [
    'label' => __('Custom', 'colab'),
]);

/**
 * Register Block Patterns
 */
// register_block_pattern('custom/example-pattern', [
//     'categories' => ['custom'],
//     'title' => __('Example Pattern', 'colab'),
//     'description' => _x('This is an example block pattern.', 'Block pattern description', 'colab'),
//     'content' => '
//         <!-- wp:group -->
//         <div class="wp-block-group"><div class="wp-block-group__inner-container">

//         <!-- wp:heading {"level":2} -->
//         <h2>Lorem Ipsum Dolor Amet</h2>
//         <!-- /wp:heading -->

//         </div></div>
//         <!-- /wp:group -->
//     ',
// ]);


