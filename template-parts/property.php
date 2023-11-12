<?php

$large = get_query_var('property-large', false); ?>
<a class="property <?= $large === true ? 'property--large' : '' ?>" href="<?= the_permalink() ?>" title="<?= the_title() ?>">
    <div class="property__image">
        <?php the_post_thumbnail($large === true ? 'archive-property-large' : 'archive-property') ?>
    </div>
    <div class="property__body">
        <div class="property__location"><?= agence_city() ?></div>
        <h3 class="property__title"><?= the_title() ?></h3>
        <div class="property__price"><?= number_format_i18n(get_field('price')) ?> <?= agence_rent_buy() ?></div>
    </div>
</a>