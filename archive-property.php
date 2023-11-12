<?php get_header() ?>

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

<div class="container page-properties">
    <div class="search-form">
        <h1 class="search-form__title">
            <?= 'Tous nos biens' ?>
            <?php if($isRent): ?>
                <?= 'à louer' ?>
            <?php else: ?>
                <?= 'à vendre' ?>
            <?php endif;?>
        </h1>
        <p>Retrouver <?= agencia_showType($currentType) ?> sur le secteur de <strong><?= agencia_showCity($currentCity) ?></strong></p>
        <hr>
        <form action="" class="search-form__form">
            <div class="search-form__checkbox">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" <?= $isRent ? '' : 'checked=""'?> type="radio" name="property_category" id="buy" value="buy">
                    <label class="form-check-label" for="buy">Acheter</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" <?= $isRent ? 'checked=""' : ''?>type="radio" name="property_category" id="rent" value="rent">
                    <label class="form-check-label" for="rent">Louer</label>
                </div>
            </div>
            <div class="form-group">
                <select name="city" class="form-control" id="city">
                <option value="">Toutes les villes</option>
                    <?php foreach($cities as $city): ?>
                        <option value="<?= $city->slug ?>"<?= selected($city->slug, $currentCity) ?> ><?= $city->name ?></option>
                    <?php endforeach; ?>
                </select>
                <label for="city">Ville</label>
            </div>
            <div class="form-group">
                <input name="price" type="number" class="form-control" id="budget" placeholder="<?= $isRent ? '500€/mois' : '150000€'?>" value="<?= esc_attr($currentPrice) ?>">
                <label for="budget"><?= $isRent ? 'Loyer' : 'Budget'?></label>
            </div>
            <div class="form-group">
                <select name="type" id="type" class="form-control">
                    <option value="">Tous nos types</option>
                    <?php foreach($types as $type): ?>
                        <option value="<?= $type->slug ?>"<?= selected($type->slug, $currentType) ?> ><?= $type->name ?></option>
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
    </div>


    <?php $count = 0 ?>
    <?php while (have_posts()) : the_post() ?>
        <?php $cities = get_terms(['taxonomy' => 'property_city']) ?>
        <a class="property <?= $count === 7 ? 'property--large' : '' ?>" href="<?= the_permalink() ?>" title="<?= the_title() ?>">
            <div class="property__image">
                <?php the_post_thumbnail($count === 7 ? 'archive-property-large' : 'archive-property') ?>
            </div>
            <div class="property__body">
                <div class="property__location"><?= agence_city() ?></div>
                <h3 class="property__title"><?= the_title() ?></h3>
                <div class="property__price"><?= number_format_i18n(get_field('price')) ?> <?= agence_rent_buy() ?></div>
            </div>
        </a>
        <?php $count++ ?>
    <?php endwhile; ?>

</div>

<div class="pagination">
    <?php if(get_query_var('paged', 1) != 0): ?>
        <?= paginate_links([
                            'prev_text' => agencia_icon('arrow'),
                            'next_text' => agencia_icon('arrow')
                        ]) ?>
    <?php else: ?>
        <?php next_posts_link(
            'Voir plus de biens',
        ) ?>
    <?php endif; ?>
</div>

<?php get_footer() ?>