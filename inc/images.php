<?php

add_action('after_setup_theme', function () {
    set_post_thumbnail_size(250,250,true);
    add_image_size(
        'article-post',
        350,
        350,
        true,
    );
});