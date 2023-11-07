<?php get_header() ?>

<div class="container page-sidebar">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post() ?>
            <main>
                <header class="news-single__header">
                    <div class="news-single__title"><?php the_title() ?></div>
                    <div class="news-single__meta">
                        <?php agencia_listing_categories() ?>
                        <div class="news__date">Publié le <?= the_date() ?> à <?= the_time() ?></div>
                    </div>
                </header>
                <div class="formatted">
                    <?php if(has_post_thumbnail()): ?>
                        <p style="text-align: center"><?php the_post_thumbnail('full') ?></p>
                    <?php endif; ?>
                    <?php the_content() ?>
                </div>
                        
                <?php if(comments_open() || get_comments_number() > 0) {
                    comments_template();
                }
                ?>

            </main>
        <?php endwhile; ?>
    <?php else : ?>
        <h1>L'article semble avoir disparu...</h1>
    <?php endif; ?>
    <aside class="sidebar">
        <?php dynamic_sidebar('blog'); ?>
    </aside>

</div>


<?php get_footer() ?>