<?php
    $networks = [
        'twitter' => 'Twitter',
        'facebook' => 'Facebook',
         'instagram' => 'Instagram'
    ]
?>

<div class="footer__credits"><?= esc_html($instance['credits']) ?></div>
<div class="footer__social">

    <?php foreach ($networks as $network => $name): ?>
        <?php if (!empty($instance[$network])) : ?>
            <a href="<?= esc_url($instance[$network]) ?>" title="Nous suivre sur {$name}">
                <?= agencia_icon_social($network); ?>
            </a>
        <?php endif; ?>   
    <?php endforeach; ?>
    
</div>