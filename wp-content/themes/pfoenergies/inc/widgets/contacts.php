<?php


class Pfoenergies_Contacts_Widget extends \WP_Widget {

    public $fields = [];

    public function __construct()
    {
        parent::__construct('pfoenergies_contacts_widget', __('Contacts widget', 'pfoenergies'));
        $this->fields = [
            'title' => __('Title', 'pfoenergies'),
            'location' =>  [
                'label' => __('Location', 'pfoenergies'),
                'url' => __('Location URL', 'pfoenergies')
            ],
            'phone' =>  [
                'label' => __('Phone', 'pfoenergies'),
                'url' => __('Phone URL', 'pfoenergies')
            ],
            'email' =>  [
                'label' => __('Email', 'pfoenergies'),
                'url' => __('Email URL', 'pfoenergies')
            ]
        ];
    }
    
    public function widget($args, $instance) {
        echo $args['before_widget'];
        if (isset($instance['title'])) {
            $title = apply_filters('widget_title', $instance['title']);
            echo $args['before_title'] . $title . $args['after_title'];
        }
        $template = locate_template('widgets/contacts.php');
        if (!empty($template)) {
            include($template);
        }
        echo $args['after_widget'];
    }

    public function form($instance)
    {
        foreach ($this->fields as $field => $config) {
            // Champ simple
            if (!is_array($config)) {
                $value = $instance[$field] ?? '';
                ?>
                <p>
                    <label for="<?= $this->get_field_id($field) ?>">
                        <?= esc_html($config) ?>
                    </label>

                    <input
                        type="text"
                        class="widefat"
                        name="<?= $this->get_field_name($field) ?>"
                        id="<?= $this->get_field_id($field) ?>"
                        value="<?= esc_attr($value) ?>"
                    >
                </p>
                <?php
                continue;
            }

            // Champ composé (location, phone, email)
            $labelValue = $instance[$field . '_label'] ?? '';
            $urlValue   = $instance[$field . '_url'] ?? '';
            ?>

            <div style="display:flex; gap:10px; margin-bottom:15px;">
                <div style="flex:1;">
                    <label for="<?= $this->get_field_id($field . '_label') ?>">
                        <?= esc_html($config['label']) ?>
                    </label>

                    <input
                        type="text"
                        class="widefat"
                        name="<?= $this->get_field_name($field . '_label') ?>"
                        id="<?= $this->get_field_id($field . '_label') ?>"
                        value="<?= esc_attr($labelValue) ?>"
                    >
                </div>
                <div style="flex:1;">
                    <label for="<?= $this->get_field_id($field . '_url') ?>">
                        <?= esc_html($config['url']) ?>
                    </label>

                    <input
                        type="text"
                        class="widefat"
                        name="<?= $this->get_field_name($field . '_url') ?>"
                        id="<?= $this->get_field_id($field . '_url') ?>"
                        value="<?= esc_attr($urlValue) ?>"
                    >
                </div>
            </div>
            <?php
        }
    }

    public function update($newInstance, $oldInstance)
    {
        $output = [];
        foreach ($this->fields as $field => $config) {
            if (!is_array($config)) {
                $output[$field] = sanitize_text_field(
                    $newInstance[$field] ?? ''
                );
                continue;
            }
            $output[$field . '_label'] = sanitize_text_field(
                $newInstance[$field . '_label'] ?? ''
            );
            $output[$field . '_url'] = esc_url_raw(
                $newInstance[$field . '_url'] ?? ''
            );
        }
        return $output;
    }

}