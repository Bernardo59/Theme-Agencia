<?php get_header() ?>

<div class="container">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post() ?>
            <header class="bien-header">
            <div>
                <?php $cities = get_terms(['taxonomy' => 'property_city'])?>
                <h1 class="bien__title"><?= the_title() ?></h1>
                <div class="bien__meta">
                <div class="bien__location"><?= $cities[0]->name ?> <?= agence_city(get_post()) ?></div>
                <div class="bien__price"><?= get_field('price') ?> <?= agence_rent_buy() ?></div>
                </div>
                <div class="bien__actions">
                <a href="<?= esc_url(home_url('/contact'))?>"><button class="btn btn-filled">Contacter l'agence</button></a>
                <a href="<?= esc_url(home_url('/contact'))?>"><button class="btn">Appeler</button></a>
                </div>

            </div>
            <div>
                <div class="bien__photos js-slider">
                <?php $images = get_attached_media('image', get_post()); ?>
                    <?php foreach($images as $image): ?>
                      <a href="<?= wp_get_attachment_url($image->ID) ?>">
                        <img class="bien__photo" src="<?= wp_get_attachment_image_url($image->ID, 'single-property') ?>" alt="">
                      </a>
                    <?php endforeach; ?>
                </div>
            </div>
            </header>
        <?php endwhile; ?>
    <?php endif; ?>




    <div class="bien-body">
      <h2 class="bien-body__title">Description</h2>
      <div class="formatted">
        <?= the_content() ?>
      </div>
    </div>

    <section class="bien-options">
      <div class="bien-option"><img src="<?= get_template_directory_uri() ?>/assets/img/area.78237e19.svg" alt=""> Superficie: <?= get_field('surface') ?>m²</div>
      <?php if(get_field('lift') === 'oui') : ?>
        <div class="bien-option"><img src="<?= get_template_directory_uri() ?>/assets/img/elevator-fill.117c4510.svg" alt=""> Ascenseur</div>
      <?php endif;?>
      <div class="bien-option"><img src="<?= get_template_directory_uri() ?>/assets/img/rooms.b02e3d15.svg" alt=""> Nbr chambres: <?= get_field('room') ?></div>
      <div class="bien-option"><img src="<?= get_template_directory_uri() ?>/assets/img/elevator.e0bdbd67.svg" alt=""> Etage: <?= ucfirst(get_field('floor')) ?></div>
      <div class="bien-option"><img src="<?= get_template_directory_uri() ?>/assets/img/parking.bb37c0bc.svg" alt=""> Parking: <?= ucfirst(get_field('parking')) ?></div>
    </section>

  </div>


















<?php get_footer(); ?>