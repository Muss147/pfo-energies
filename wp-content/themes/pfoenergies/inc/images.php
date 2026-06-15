<?php
add_action('after_setup_theme', function () {
    set_post_thumbnail_size(400,256,true);
    add_image_size('project-gallery', 410, 320, true);
    add_image_size('project-highlight', 719, 400, true);
    add_image_size('metier-thumbnail', 56, 56, true);
    add_image_size('metier-division', 390, 240, true);
    add_image_size('home-thumbnail', 1440, 675, true);
});