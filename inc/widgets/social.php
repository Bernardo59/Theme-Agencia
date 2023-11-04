<?php


class Agencia_Social_Widget extends WP_Widget {

    public $fields;

    public function __construct() 
    {
        parent::__construct('agencia_social_widget', 'Widget des réseaux sociaux');
        $this->fields = [
            'title' => 'Titre',
            'credits' => 'Credits',
            'twitter' => 'Twitter',
            'facebook' => 'Facebook',
            'instagram' => 'Instagram'
        ];
    }

    public function widget($args, $instance): void {
        echo $args['before_widget'];
        if (isset($instance['title'])) {
            $title = apply_filters('widget_title', $instance['title']);
            echo $args['before_title'] . $title . $args['after_title'];
        }
        // Permet de retrouver le chemin d'accès du template part
        $template = locate_template('widgets/social.php');
        // Si on a un chemin d'accès on inclus le fichier dans Wordpress afin d'avoir accès aux variables
        if (!empty($template)) {
            include $template;
        }
        echo $args['after_widget'];
    }

    public function form($instance): void  {
        foreach($this->fields as $field => $label) {
            $value = $instance[$field] ?? '';
            ?>
                <p>
                    <label for="<?= $this->get_field_id($field) ?>"><?= $label?></label>
                    <input 
                    type="text"
                    class="widefat"
                    name="<?= $this->get_field_name($field) ?>"
                    id="<?= $this->get_field_name($field) ?>"
                    value="<?= esc_attr($value)?>">
                </p>
            <?php
        }
    }
    
    public function update ($newInstance, $oldInstance): array 
    {
        $output = [];
        foreach($this->fields as $field => $label){
            $output[$field] = $newInstance[$field];
        } 
        return $output;
    }

}