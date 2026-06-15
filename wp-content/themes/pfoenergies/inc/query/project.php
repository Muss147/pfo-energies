<?php
add_action('pre_get_posts', function (WP_Query $query) {

    if (
        is_admin() || 
        !$query->is_main_query() || 
        !is_post_type_archive('realisations')
        ) {
        return;
    }
    $query->set('posts_per_page', 6); 

    $status = $_GET['status'] ?? '';

    if ($status && $status !== 'all') {
        $query->set('tax_query', [
            [
                'taxonomy' => 'project_status',
                'field'    => 'slug',
                'terms'    => $status
            ]
        ]);
    }
});

function pfoenergies_get_project_gallery(): array
{
    $gallery = get_attached_media('image', get_post());

    if (empty($gallery)) {

        $gallery = [
            (object)[
                'ID' => get_post_thumbnail_id() ?: 0
            ]
        ];
    }

    return $gallery;
}