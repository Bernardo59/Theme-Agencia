<?php

get_header() ?>

<div class="container">
    <h1 class="page-title">
        <?php if(is_category()): ?>
            <?= single_cat_title() ?>
        <?php elseif (is_search()): ?>
            <?= 'Résultats pour votre recherche ' . "'". get_search_query() . "'" ?>
        <?php else: ?>
            <?= single_post_title() ?>
        <?php endif; ?>
    </h1>
    <div class="page-sidebar">
        <div>
            <div class="news-list">
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post() ?>
                        <?php get_template_part(('template-parts/post')); ?>
                    <?php endwhile; ?>
                    <div class="pagination">
                        <?= paginate_links([
                            'prev_text' => agencia_icon('arrow'),
                            'next_text' => agencia_icon('arrow')
                        ]) ?>
                    </div>
                <?php else : ?>
                    <h2>Pas d'articles !</h2>
                <? endif; ?>
            </div>
        </div>
        <aside class="sidebar">
            <?php dynamic_sidebar('blog'); ?>
        </aside>

    </div>
</div>

<?php get_footer() ?>