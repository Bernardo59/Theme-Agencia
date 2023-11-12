<?php get_header() ?>

<?php while (have_posts()) : the_post(); ?>

  <main class="sections">
    <!-- Find your home -->
    <section>
      <div class="container">
        <div class="search-form">
          <h1 class="search-form__title"><?= the_title() ?></h1>
          <p><?php the_content() ?></p>
          <hr>
          <form action="" class="search-form__form">
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

      </div>

      <?php if ($property = get_field('highlighted_property')) : ?>
        <div class="highlighted highlighted--home">
          <?= get_the_post_thumbnail($property, 'property-thumbnail-home') ?>
          <div class="highlighted__body">
            <a class="highlighted__title" href="<?= the_permalink($property) ?>"><?= get_the_title($property) ?></a>
            <div class="highlighted__price"><?= number_format_i18n(get_field('price', $property)) ?><?= agence_rent_buy($property) ?></div>
            <div class="highlighted__location"><?= agence_city($property) ?></div>
            <div class="highlighted__space"><?php the_field('surface', $property) ?>m2</div>
          </div>
        </div>
      <? endif; ?>
    </section>

    <!-- Feature properties -->
    <?php if (have_rows('recent_properties')) : ?>
      <?php while (have_rows('recent_properties')) : the_row() ?>
        <section class="container">
          <div class="push-properties">
            <div class="push-properties__title"><?php the_sub_field('title') ?></div>
            <p><?php the_sub_field('description') ?></p>
            <div class="push-properties__grid">

              <?php $query = new WP_Query([
                'post_type' => 'property',
                'posts_per_page' => 4
              ]); ?>
              <?php while ($query->have_posts()) : $query->the_post() ?>
                <?php get_template_part('template-parts/property') ?>

              <?php endwhile; ?>
              <?php wp_reset_postdata(); ?>

              <?php if ($highlighted = get_sub_field('highlighted_property')) : ?>
                <div class="highlighted">
                  <?= get_the_post_thumbnail($highlighted, 'property-thumbnail-home') ?>
                  <div class="highlighted__body">
                    <div class="highlighted__title"><?= get_the_title($highlighted) ?></div>
                    <div class="highlighted__price"><?= number_format_i18n(get_field('price', $highlighted)) ?><?= agence_rent_buy($highlighted) ?></div>
                    <div class="highlighted__location"><?= agence_city($highlighted) ?></div>
                    <div class="highlighted__space"><?php the_field('surface', $highlighted) ?>m2</div>
                  </div>
                </div>


                <a class="push-properties__action btn" href="<?= get_post_type_archive_link('property') ?>">
                  Parcourir nos biens
                  <?= agencia_icon('arrow') ?>
                </a>
              <?php endif; ?>

            </div>
        </section>
      <?php endwhile; ?>
    <?php endif; ?>

    <?php if (have_rows('quote')) : ?>
      <?php while (have_rows('quote')) : the_row() ?>
        <section class="container quote">
          <div class="quote__title"><?= the_sub_field('title') ?></div>
          <div class="quote__body">
            <div class="quote__image">
              <img src="<?= the_sub_field('avatar') ?>" alt="">
              <div class="quote__author"><?= the_sub_field('role') ?></div>
            </div>
            <blockquote>
              <p><?= the_sub_field('content') ?></p>
            </blockquote>
          </div>
          <?php if ($action = get_sub_field('action')) : ?>
            <a class="quote__action btn" href="<?= $action['url'] ?>">
              <?= $action['title'] ?>
              <?= agencia_icon('arrow') ?>
            </a>
          <?php endif; ?>
        </section>
      <?php endwhile; ?>
    <? endif; ?>

    <!-- Read our stories -->
    <?php if (have_rows('recent_posts')) : ?>
      <?php while (have_rows('recent_posts')) : the_row() ?>
        <section class="container push-news">
          <h2 class="push-news__title"><?= the_sub_field('title') ?></h2>
          <p>Retrouvez toutes les actualités liées à nos agences autour de Montpellier.</p>
          <div class="push-news__grid">
            <a href="#" class="push-news__item">
              <picture>
                <source media="(max-width: 950px)" srcset="https://picsum.photos/id/849/910/910.jpg">
                <img src="https://picsum.photos/id/849/385/640.jpg">
              </picture>
              <span class="push-news__tag">Tendance</span>
              <h3 class="push-news__label">Studio in the heart of San Francisco CBD @ Circular Quay</h3>
            </a>
            <div class="news-overlay">

              <picture>
                <source media="(max-width: 545px)" srcset="https://picsum.photos/id/851/910/700.jpg">
                <source media="(max-width: 950px)" srcset="https://picsum.photos/id/851/910/500.jpg">
                <img src="https://picsum.photos/id/851/912/318.jpg">
              </picture>
              <div class="news-overlay__body">
                <div class="news-overlay__title">
                  Consultez tous nos articles <br> liés à l'immobilier
                </div>
                <a href="#" class="news-overlay__btn btn">
                  Lire nos articles
                  <svg class="icon">
                    <use xlink:href="sprite.14d9fd56.svg#arrow"></use>
                  </svg>
                </a>
              </div>
            </div>
            <a href="#" class="push-news__item">
              <picture>
                <source media="(max-width: 950px)" srcset="https://picsum.photos/id/852/910/910.jpg">
                <img src="https://picsum.photos/id/852/322/274.jpg">
              </picture>
              <span class="push-news__tag">Financement</span>
              <h3 class="push-news__label">Studio in the heart of San Francisco CBD @ Circular Quay</h3>
            </a>
            <a href="#" class="push-news__item">
              <picture>
                <source media="(max-width: 950px)" srcset="https://picsum.photos/id/853/910/910.jpg">
                <img src="https://picsum.photos/id/853/556/274.jpg">
              </picture>
              <span class="push-news__tag">Prêt</span>
              <h3 class="push-news__label">Studio in the heart of San Francisco CBD @ Circular Quay</h3>
            </a>
          </div>
        </section>
      <?php endwhile; ?>
    <?php endif; ?>

    <!-- Newsletter -->
    <section class="newsletter">
      <form class="newsletter__body">
        <div class="newsletter__title">Restez connecté</div>
        <p>
          Recevez les dernières nouveautés concernant l'agence en vous inscrivant à notre newsletter
        </p>
        <div class="form-group">
          <input type="email" class="form-control" id="email" placeholder="Entrez votre email">
          <label for="email">Votre email</label>
        </div>
        <!--
        <input type="email" class="form-control" placeholder="Enter your email adress">
        -->
        <button type="submit" class="btn">S'inscrire</button>
      </form>
      <div class="newsletter__image">
        <img src="man.87215a62.png" alt="">
      </div>
    </section>

  </main>
<?php endwhile ?>
<?php get_footer() ?>