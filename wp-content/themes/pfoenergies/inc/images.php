<?php
add_action('after_setup_theme', function () {
    set_post_thumbnail_size(400,256,true);
    add_image_size('project-gallery', 410, 320, true);
});