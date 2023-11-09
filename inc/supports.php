<?php
defined('ABSPATH') or die();

/*************************/
/*        ACTIONS        */
/*************************/
add_action('after_setup_theme', function () {
    add_theme_support('title-tag');
    add_theme_support('html5', [
    'comment-list', 
    'comment-form', 
    'search-form']);
    add_theme_support('menus');
    add_theme_support('post-thumbnails');
    add_image_size('single-property', 777, 444, true);
}, 10);


/*************************/
/*        FILTRES        */
/*************************/
add_filter('upload_mimes', function($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
});
