<?php get_header() ?>

<div class="container page-properties">
    <div class="search-form">
        <h1 class="search-form__title">Agence immo Montpellier</h1>
        <p>Retrouver tous nos biens sur le secteur de <strong>Montpellier</strong></p>
        <hr>
        <form action="listing.html" class="search-form__form">
            <div class="search-form__checkbox">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" checked="" type="radio" name="type" id="buy" value="buy">
                    <label class="form-check-label" for="buy">Acheter</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="type" id="rent" value="rent">
                    <label class="form-check-label" for="rent">Louer</label>
                </div>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="city" placeholder="Montpellier">
                <label for="city">Ville</label>
            </div>
            <div class="form-group">
                <input type="number" class="form-control" id="budget" placeholder="100 000 €">
                <label for="budget">Prix max</label>
            </div>
            <div class="form-group">
                <select name="kind" id="kind" class="form-control">
                    <option value="flat">Appartement</option>
                    <option value="villa">Villa</option>
                </select>
                <label for="kind">Type</label>
            </div>
            <div class="form-group">
                <input type="number" class="form-control" id="rooms" placeholder="4">
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
                <div class="property__location"><?= $cities[0]->name ?> <?= agence_city(get_post()) ?></div>
                <h3 class="property__title"><?= the_title() ?></h3>
                <div class="property__price"><?= get_field('price') ?> <?= agence_rent_buy() ?></div>
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