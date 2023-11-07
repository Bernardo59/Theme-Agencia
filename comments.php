<?php
require_once('inc/walkers/CommentWalker.php');
?>

<div class="comments">
    <?php $count = absint(get_comments_number()) ?>
    <?php if ($count > 0) : ?>
        <div class="comments__title"><?= $count ?> commentaire<?= $count > 1 ? 's' : '' ?></div>
    <?php else : ?>
        <div class="comments__title">Laisser un commentaire</div>
    <?php endif; ?>
    <div class="comments__list">
        <?php wp_list_comments([
            'style' => 'div',
            'walker' => new AgenciaCommentWalker()
        ]) ?>

        <div class="pagination">
            <?= paginate_comments_links([
                'prev_text' => agencia_icon('arrow'),
                'next_text' => agencia_icon('arrow')
            ]) ?>
        </div>

        <?php if (comments_open()) : ?>
            <div class="comments__title">Laissez un commentaire</div>

            <?php comment_form([
                'title_reply' => '',
                'class_form' => 'form-2column',
                'class_submit' => 'btn'
            ]);
            ?>
<? endif; ?>
</div>
</div>