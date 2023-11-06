<?php
require_once('inc/walkers/CommentWalker.php');
?>

<div class="comments">
    <?php $count = absint(get_comments_number()) ?>
    <?php if($count > 0): ?>
        <div class="comments__title"><?= $count ?> commentaire<?= $count > 1 ? 's' : '' ?></div>
    <?php else: ?>
        <div class="comments__title">Laisser un commentaire</div>
    <?php endif; ?>

    <?php wp_list_comments([
        'style' => 'div',
        'walker' => new AgenciaCommentWalker()
    ]) ?>

    <?php if(comments_open()): ?>
        <?php comment_form([
            'title_reply' => '']);
        ?>
    <? endif; ?>
</div>