<?php
defined('ABSPATH') or die('');

add_action('after setup theme', function () {
    add_theme_support('title-tag');
    add_theme_support('menus');
    add_theme_support('html5');
    add_theme_support('post-thumbnails');
}); 