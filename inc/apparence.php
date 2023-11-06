<?
defined('ABSPATH') or die();
add_action('customize_register', function (WP_Customize_Manager $manager){
    $manager->add_setting('logo', [
        'sanitize_callback' => 'esc_url_raw',
    ]);

    $manager->add_section('agencia_apparence', [
        'title' => 'Apparence du thème'
    ]);

    $manager->add_control(new WP_Customize_Image_Control($manager, 'logo', [
        'label' => 'Logo du site',
        'section' => 'agencia_apparence'
    ]));
});


add_filter('comment_form_default_fields', function($fields) {
    unset($fields['url']);
    $fields['author'] = '<p class="comment-form-author"><label for="author">Prénom <span class="required">*</span></label><input type="text" id="author" name="author" require="required" placeholder="Name"></p>';
    return $fields;

});