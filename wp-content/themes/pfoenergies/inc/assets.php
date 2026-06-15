<?php

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style(
        'theme-style',
        get_template_directory_uri() . '/assets/css/style.css',
        [],
        filemtime(get_template_directory() . '/assets/css/style.css')
    );
    wp_enqueue_style('fix', get_stylesheet_uri());
    wp_enqueue_script('theme-script', get_template_directory_uri() . '/assets/js/script.js', [], false, true);
    // Chargement de Swiper
    wp_enqueue_style(
        'swiper',
        'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css'
    );
    wp_enqueue_script(
        'swiper',
        'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js',
        [],
        null,
        true
    );
    wp_enqueue_script(
        'project-slider',
        get_template_directory_uri() . '/assets/js/project-slider.js',
        ['swiper'],
        null,
        true
    );
}); 