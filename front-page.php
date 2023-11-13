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
          <?php get_template_part('template-parts/searchform-property') ?>
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
          <p><?= the_sub_field('description') ?></p>

          <?php
          $query = new WP_Query([
            'post_type' => 'post',
            'posts_per_page' => 3,
            'order' => 'ASC'
          ])
          ?>
          <div class="push-news__grid">
            <?php $i = 0;
            while ($query->have_posts()) : $query->the_post();
              $i++ ?>
              <a href="<?php the_permalink() ?>" class="push-news__item">
                <?php the_post_thumbnail('post-thumbnail-home') ?>
                <span class="push-news__tag"><?= "title" ?></span>
                <h3 class="push-news__label"><?php the_title() ?></h3>
              </a>
              <?php if ($i === 1) : ?>
                <div class="news-overlay">
                  <img src="<?= get_sub_field('background')['sizes']['post-thumbnail-overlay-home'] ?>">
                  <div class="news-overlay__body">
                    <div class="news-overlay__title">
                      Consultez tous nos articles <br> liés à l'immobilier
                    </div>
                    <a href="<?php get_post_type_archive_link('post') ?>" class="news-overlay__btn btn">
                      Lire nos articles
                      <?= agencia_icon('arrow') ?>
                    </a>
                  </div>
                </div>
              <?php endif; ?>
            <?php endwhile; ?>
            <?php wp_reset_postdata() ?>
          </div>
        </section>
      <?php endwhile; ?>
    <?php endif; ?>

    <!-- Newsletter -->
    <?php if (have_rows('newsletter')) : ?>
      <?php while (have_rows('newsletter')) : the_row() ?>
        <section class="newsletter">
          <form class="newsletter__body">
            <div class="newsletter__title"><?php the_sub_field('title') ?></div>
            <p><?php the_sub_field('description') ?></p>
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
            <img src="<?= the_sub_field('avatar') ?>" alt="">
          </div>
        </section>
      <?php endwhile; ?>
    <?php endif; ?>

  </main>
<?php endwhile ?>
<?php get_footer() ?>