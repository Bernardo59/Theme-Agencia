<?php

add_filter('next_posts_link_attributes', function(string $attrs) : string{
    return $attrs . 'class="btn"';
});

/**
 * Permet de filtrer les classes CSS du menu et de retirer la class Curent Page Parent si on est dans la rubrique property
 * $item récupére l'ensemble des items en WP_Post du menu
 */
add_filter('nav_menu_css_class', function (array $classes): array {
    if(is_singular('property') || is_post_type_archive('property')) {
        foreach($classes as $class => $value) {
            if ($value == 'current_page_parent') {
                unset($classes[$class]);
            }                       
        }
       
    }
    return $classes;
}, 10);


add_filter('wpcf7_form_elements', function($content) {
    $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);
    $content = str_replace('<br />', '', $content);
    $content = str_replace('<p>', '', $content);
    $content = str_replace('</p>', '', $content);
    return $content;
});