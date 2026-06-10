<?php

add_filter('nav_menu_css_class', function (array $classes, WP_Post $item): array {
    if (is_singular('realisations') || is_post_type_archive('realisations')) {
        $classes = array_filter($classes, function (string $class) {
            return $class !== 'current_page_parent';
        });
    }
    if (is_singular('realisations') && is_realisations_url($item->url)) {
        $classes[] = 'current_page_parent';
    }
    return $classes;
}, 10, 2);

function is_realisations_url(string $url): bool  {
    return strpos($url, _x('realisations', 'URL', 'realisation')) !== false;
}
