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

function pfoenergies_button(string $url, string $label, string $variant = 'primary'): void {

    get_template_part(
        'template-parts/components/button',
        null,
        [
            'url'     => $url,
            'label'   => $label,
            'variant' => $variant
        ]
    );
}

add_filter('wpcf7_form_elements', function(string $content) {
    $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);
    $content = str_replace('<br />', '', $content);
    $content = str_replace('<p>', '', $content);
    $content = str_replace('</p>', '', $content);
    return $content;
});