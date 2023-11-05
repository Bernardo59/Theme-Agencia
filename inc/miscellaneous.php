<?php

function agencia_icon ($name) : string{
    $sprite_url = get_template_directory_uri() . '/assets/img/sprite.14d9fd56.svg';
    return <<<HTML
<svg class="icon">
    <use xlink:href="{$sprite_url}#{$name}"></use>
</svg>
HTML;


}