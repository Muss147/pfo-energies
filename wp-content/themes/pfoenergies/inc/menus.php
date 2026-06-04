<?php

add_action('after_setup_theme', function () {
    register_nav_menu('header', __('Main navigation', 'pfoenergies'));
    register_nav_menu('footer', __('Footer', 'pfoenergies'));
});

require_once('widgets/social.php');
require_once('widgets/contacts.php');

add_action('widgets_init', function () {
    register_widget(\Pfoenergies_Social_Widget::class);
    register_widget(\Pfoenergies_Contacts_Widget::class);
    register_sidebar([
        'id' => 'footer',
        'name' => __('Footer', 'pfoenergies'),
        'before_title' => '<div class="inline-block mb-5">
                        <h4 class="text-[17px] leading-none tracking-tight uppercase font-medium">',
        'after_title' => '</h4>
                        <div class="mt-1 h-0.5 w-16 bg-white"></div>
                    </div>',
        'before_widget' => '<div class="flex flex-col gap-2 w-56">',
        'after_widget' => '</div>'
    ]);
});

add_filter('nav_menu_link_attributes', 'pfoenergies_classes_links_sidebar', 10, 4);

function pfoenergies_classes_links_sidebar(array $atts, $item, $args, $depth) {
    if ($args->theme_location !== 'header') {
    
        if (isset($atts['class'])) {
            $atts['class'] .= ' text-sm font-light hover:underline';
        } else {
            $atts['class'] = 'text-sm font-light hover:underline';
        }
    
    }
    return $atts;
}

