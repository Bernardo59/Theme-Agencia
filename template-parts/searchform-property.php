<?php
$isRent = get_query_var('property_category') === 'rent';
$cities = get_terms([
    'taxonomy' => 'property_city'
]);
$types = get_terms([
    'taxonomy' => 'property_type'
]);
$currentCity = get_query_var('city');
$currentPrice = get_query_var('price');
$currentType = get_query_var('type');
$currentRoom = get_query_var('room');
?>


<form action="<?= get_post_type_archive_link('property') ?>" class="search-form__form">
    <div class="search-form__checkbox">
        <div class="form-check form-check-inline">
            <input class="form-check-input" <?= $isRent ? '' : 'checked=""' ?> type="radio" name="property_category" id="buy" value="buy">
            <label class="form-check-label" for="buy">Acheter</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" <?= $isRent ? 'checked=""' : '' ?>type="radio" name="property_category" id="rent" value="rent">
            <label class="form-check-label" for="rent">Louer</label>
        </div>
    </div>
    <div class="form-group">
        <select name="city" class="form-control" id="city">
            <option value="">Toutes les villes</option>
            <?php foreach ($cities as $city) : ?>
                <option value="<?= $city->slug ?>" <?= selected($city->slug, $currentCity) ?>><?= $city->name ?></option>
            <?php endforeach; ?>
        </select>
        <label for="city">Ville</label>
    </div>
    <div class="form-group">
        <input name="price" type="number" class="form-control" id="budget" placeholder="<?= $isRent ? '500€/mois' : '150000€' ?>" value="<?= esc_attr($currentPrice) ?>">
        <label for="budget"><?= $isRent ? 'Loyer' : 'Budget' ?></label>
    </div>
    <div class="form-group">
        <select name="type" id="type" class="form-control">
            <option value="">Tous nos types</option>
            <?php foreach ($types as $type) : ?>
                <option value="<?= $type->slug ?>" <?= selected($type->slug, $currentType) ?>><?= $type->name ?></option>
            <?php endforeach; ?>
        </select>
        <label for="type">Type</label>
    </div>
    <div class="form-group">
        <input name="room" type="number" class="form-control" id="rooms" placeholder="4" value="<?= $currentRoom ?>">
        <label for="rooms">Pièces</label>
    </div>
    <button type="submit" class="btn btn-filled">Rechercher</button>
</form>