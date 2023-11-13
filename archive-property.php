<?php get_header() ?>

<?php 

$isRent = get_query_var('property_category') === 'rent';
$currentCity = get_query_var('city');
$currentType = get_query_var('type');
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
        <?php get_template_part('template-parts/searchform-property') ?>
    </div>


    <?php $count = 0 ?>
    <?php while (have_posts()) : the_post() ?>
        <!-- set_query_var permet de transmettre une donnée dans le get template part -->
        <?php set_query_var('property-large', $count === 7); ?> 
        <?php get_template_part('template-parts/property') ?>
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