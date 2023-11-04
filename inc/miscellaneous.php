<?php

function agencia_icon_social ($name) : string{
    $sprite_url = get_template_directory_uri() . '/assets/sprite.14d9fd56.svg';
    return <<<HTML
<svg class="icon">
    <use xlink:href="{$sprite_url}#{$name}"></use>
</svg>
HTML;


}