<?php

class Agencia_Youtube_Widget extends WP_Widget {

    public $fields;

    public function __construct() {
        parent::__construct('youtube','Youtube Widget');
        $this->fields = [
            'id_video' => 'Numéro ID de la vidéo Youtube',
            'width' => 'Largeur:',
            'height' => 'Hauteur:',
        ];
    }

    public function widget($args, $instance) {
        echo $args['before_widget'];
        echo $args['before_title'];
        if (isset($instance['width']) || isset($instance['height']) || isset($instance['id_video'])){
            echo <<<HTML
            <iframe width="{$instance['width']}" height="{$instance['height']}" src="https://www.youtube.com/embed/{$instance['id_video']}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    HTML; 
        }
    echo $args['after_widget'];
    echo $args['after_title'];
    }

    public function form($instance){
        ?>
        <p>
        <?php foreach($this->fields as $field => $value): ?>
            <?php $value = !empty($instance[$field]) ? esc_attr($instance[$field]) :  ''; ?>
            <label for="<?= $this->get_field_id($field) ?>"><?= $value ?></label>
            <input type="text" 
            class="widefat" 
            id="<?= $this->get_field_name($field) ?>"
            name="<?= $this->get_field_name($field) ?>"
            value="<?= $value ?>">
        <?php endforeach; ?>
        </p>
        <?php
    }

    public function update($newInstance, $oldInstance) { 
        return $newInstance;
    }
}