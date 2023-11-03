<?php

/*************************/
/*      FUNCTIONS        */
/*************************/

/**
 * Add supports for the theme
 */
function mytheme_supports () {
    add_theme_support('title-tag');
    add_theme_support('html5', [
    'comment-list', 
    'comment-form', 
    'search-form']);

};

/**
 * Add script & JS for the theme
 */
function mytheme_enqueue_scripts() {
    wp_register_style('mytheme_css', get_template_directory_uri() . '/assets/css/style.css');
    wp_enqueue_style('mytheme_css');
}

/*************************/
/*        HOOKS          */
/*************************/

add_action('after_setup_theme', 'mytheme_supports', 10);
add_action('wp_enqueue_scripts', 'mytheme_enqueue_scripts');