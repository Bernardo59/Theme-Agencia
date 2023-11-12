<?
defined('ABSPATH') or die();
add_action('customize_register', function (WP_Customize_Manager $manager){

    $manager->add_section('agencia_apparence', [
        'title' => 'Apparence du thème'
    ]);

    $manager->add_setting('logo', [
        'sanitize_callback' => 'esc_url_raw',
    ]);

    $manager->add_control(new WP_Customize_Image_Control($manager, 'logo', [
        'label' => 'Logo du site',
        'section' => 'agencia_apparence'
    ]));

    $manager->add_section('agencia_options', [
        'title' => 'Options'
    ]);

    $manager->add_setting('posts_per_page');

    $manager->add_control(new WP_Customize_Control($manager, 'posts_per_page', [
        'label' => 'Nombre de bien à afficher dans la page',
        'type' => 'number',
        'section' => 'agencia_options'
    ]));

});


add_filter('comment_form_default_fields', function($fields) {
    unset($fields['url']);
    $fields['author'] = <<<HTML
    <div class="form-group">
      <input type="text" id="author" name="author" class="form-control" required>
      <label for="author">Pseudo</label>
    </div>
HTML;
    $fields['email'] = <<<HTML
    <div class="form-group">
      <input type="text" id="email" name="email" class="form-control">
      <label for="email">Email</label>
    </div>
HTML;
    return $fields;
});

add_filter('comment_form_defaults', function($fields) {
    $fields['comment_field'] = <<<HTML
        <textarea id="comment" class="form-control full" name="comment" required="" placeholder="Commentaire"></textarea>  
HTML;
    return $fields;
});

add_filter('comment_form_fields', function($fields) {
    $newFields = [];
    foreach($fields as $key => $value){
        if($key !== 'comment') {
            if ($key === 'cookies') {
                $newFields['comment'] = $fields['comment'];
            }
            $newFields[$key] = $value;        
        }
    }
    if (!isset($newFields['comment'])) {
        $newFields['comment'] = $fields['comment'];
    }
    return $newFields;
});