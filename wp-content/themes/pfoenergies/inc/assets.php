<?php

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style(
        'theme-style',
        get_template_directory_uri() . '/assets/css/style.css',
        [],
        filemtime(get_template_directory() . '/assets/css/style.css')
    );
    wp_enqueue_style('fix', get_stylesheet_uri());
}); 