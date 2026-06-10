<?php
add_action('pre_get_posts', function (WP_Query $query) {

    if (
        is_admin() || 
        !$query->is_main_query() || 
        (!is_home() && !is_category() && !is_search())
        ) {
        return;
    }
    $query->set('posts_per_page', 6); 
    
    $featured = get_posts([
        'post_type'      => 'post',
        'posts_per_page' => 1,
        'meta_key'       => 'a_la_une',
        'meta_value'     => 1,
        'fields'         => 'ids'
    ]);

    if (!empty($featured)) {
        $query->set('post__not_in', $featured);
    }
});