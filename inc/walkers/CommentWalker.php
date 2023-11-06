<?php

class AgenciaCommentWalker extends Walker_Comment
{


    /**
     * Outputs a comment in the HTML5 format.
     *
     * @since 3.6.0
     *
     * @see wp_list_comments()
     *
     * @param WP_Comment $comment Comment to display.
     * @param int        $depth   Depth of the current comment.
     * @param array      $args    An array of arguments.
     */
    public function html5_comment($comment, $depth, $args)
    {
        $tag = ('div' === $args['style']) ? 'div' : 'li';

        $commenter          = wp_get_current_commenter();
        $show_pending_links = !empty($commenter['comment_author']);

        if ($commenter['comment_author_email']) {
            $moderation_note = __('Your comment is awaiting moderation.');
        } else {
            $moderation_note = __('Your comment is awaiting moderation. This is a preview; your comment will be visible after it has been approved.');
        }
?>
        <<?php echo $tag; ?> class="comment__list">
            <div class="comment">

                <?php
                if (0 != $args['avatar_size']) {
                    echo get_avatar($comment, $args['avatar_size'], '', '', [
                        'class' => 'avatar__comment'
                    ]);
                }
                ?>

                <div class="comment__body">
                    <footer>
                        <div class="comment__username">
                            <?php
                            $comment_author = get_comment_author_link($comment);
                            if ('0' == $comment->comment_approved && !$show_pending_links) {
                                $comment_author = get_comment_author($comment);
                            }
                            echo '<b class="fn">' . $comment_author .'</b>' . '<span class="says"> a dit:</span>';

                            ?>
                        </div>
                        <div class="comment__date">
                            <?php
                            printf(
                                '<a href="%s"><time datetime="%s">%s</time></a>',
                                esc_url(get_comment_link($comment, $args)),
                                get_comment_time('c'),
                                sprintf(
                                    /* translators: 1: Comment date, 2: Comment time. */
                                    __('%1$s at %2$s'),
                                    get_comment_date('', $comment),
                                    get_comment_time()
                                )
                            );
                            edit_comment_link(__('Edit'), ' <span class="edit-link">', '</span>');
                            ?>
                            <?php if ('0' == $comment->comment_approved) : ?>
                                <em class="comment-awaiting-moderation"><?php echo $moderation_note; ?></em>
                            <?php endif; ?>
                        </div>
                    </footer>
                    <div class="comment__content">
                        <?php comment_text(); ?>
                    </div>

                <?php
                if ('1' == $comment->comment_approved || $show_pending_links) {
                    comment_reply_link(
                        array_merge(
                            $args,
                            array(
                                'add_below' => 'comment',
                                'depth'     => $depth,
                                'max_depth' => $args['max_depth'],
                                'before'    => '<div class="reply">',
                                'after'     => '</div>',
                            )
                        )
                    );
                }
                ?>
            </div><!-- .comment-body -->
    <?php
    }
}
