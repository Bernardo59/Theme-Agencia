<?
defined('ABSPATH') or die();

add_action('wp_enqueue_scripts', function (){
    wp_register_style('mytheme_css', get_template_directory_uri() . '/assets/css/style.css');
    wp_enqueue_style('fix', get_stylesheet_uri());
    wp_enqueue_style('mytheme_css');
});
