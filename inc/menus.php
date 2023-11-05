<?php

require_once(get_template_directory() . '/classes/social.php');
require_once(get_template_directory() . '/classes/youtube.php');

add_action('after_setup_theme', function() {
    register_nav_menu('header', 'En tête du menu');
});

add_action('widgets_init', function () {
    register_widget(Agencia_Social_Widget::class);
    register_widget(Agencia_Youtube_Widget::class);

    register_sidebar([
        'id' => 'footer',
        'name' => 'Footer',
        'before_title' => '<div class="footer__title">',
        'after_title' => '</div>',
        'before_widget' => '<div class="footer__col">',
        'after_widget' => '</div>'
    ]);

    register_sidebar([
        'id' => 'blog',
        'name' => 'Blog sidebar',
        'before_title' => '<div class="sidebar__title">',
        'after_title' => '</div>',
        'before_widget' => '<div class="sidebar__widget">',
        'after_widget' => '</div>'
    ]);

});



