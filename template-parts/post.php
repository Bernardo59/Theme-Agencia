<article class="news">
    <?php if (has_post_thumbnail()) : ?>

        <a href="<?= the_permalink() ?>" title="<?= esc_attr(get_the_title()) ?>" class="news__image">
            <img src="<?= the_post_thumbnail_url() ?>" alt="">
        </a>
    <?php else : ?>
        <a href="<?= the_permalink() ?>" title="<?= esc_attr(get_the_title()) ?>" class="news__image">
            <img src="<?= get_template_directory_uri() . '/assets/img/NoImage.png' ?>" alt="">
        </a>
    <?php endif; ?>
    <div class="news__body">
        <header class="news__header">
            <?= agencia_listing_categories() ?>
            <a class="news__title" href="<?= the_permalink() ?>"><?php the_title() ?></a>
            <div class="news__date">Publié le <?= the_date() ?> à <?= the_time() ?></div>
        </header>
        <div class="news__content">
            <?php the_excerpt() ?>
        </div>
        <a href="<?= the_permalink() ?>" class="news__action">
            Lire la suite
            <?= agencia_icon('arrow') ?>
        </a>
    </div>
</article>