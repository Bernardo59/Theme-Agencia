<?php
defined('ABSPATH') or die();
/* Support for theme */
require_once('inc/supports.php');
require_once('inc/assets.php');
require_once('inc/apparence.php');
require_once('inc/menus.php');
require_once('inc/miscellaneous.php');
require_once('inc/images.php');
require_once('inc/query/posts.php');


/**
 * Liste les catégories en code HTML
 */
function agencia_listing_categories () {
    $categories = get_the_category();
    if (!empty($categories)) {
        echo '<div class="news__categories">';
        foreach($categories as $categorie) {
            echo '<a class="news__tag" href="' . get_term_link($categorie) . '"> '. $categorie->name . '</a>';
        }
        echo '</div>';
    }
}