<?php

/**
 * Affiche une icone SVG en fonction du nom
 */
function agencia_icon ($name) : string{
    $sprite_url = get_template_directory_uri() . '/assets/img/sprite.14d9fd56.svg';
    return <<<HTML
<svg class="icon">
    <use xlink:href="{$sprite_url}#{$name}"></use>
</svg>
HTML;
}

/**
 * Affiche sur la page d'archive property le type de iben
 */
function agencia_showType (string $currentType): string {
    if ($currentType == 'appartement') {
        return 'tous nos appartements';
    } elseif($currentType === 'maison') {
        return 'tous nos maisons';
    } else {
        return'tous nos biens';
    };
}

/**
 * Affiche sur la page d'archive property la ville
 */
function agencia_showCity (string $currentCity): string {
    if ($currentCity == null) {
        return 'Montpellier';
    } else {
        return ucfirst($currentCity);
    }
};