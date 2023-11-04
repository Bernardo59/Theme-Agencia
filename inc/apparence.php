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