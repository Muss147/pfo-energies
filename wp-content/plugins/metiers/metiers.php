<?php 
/**
 * Plugin Name: Metiers Plugin
 * Text Domain: metier
 * Domain Path: /languages
*/

defined('ABSPATH') or die('rien à voir');

add_action('plugins_loaded', function () {
    load_plugin_textdomain('metier', false, basename(dirname(__FILE__)) . '/languages');
});

add_action('init', function () {
    register_post_type('metiers', [
        'label' => __('Metiers', 'metier'),
        'menu_icon' => 'dashicons-welcome-learn-more',
        'labels' => [
            'name'                     => __('Metiers', 'metier'),
            'singular_name'            => __('Metier', 'metier'),
            'edit_item'                => __('Edit metier', 'metier'),
            'new_item'                => __('New metier', 'metier'),
            'view_item'                => __('View metier', 'metier'),
            'view_items'                => __('View metiers', 'metier'),
            'search_items'                => __('Search metiers', 'metier'),
            'not_found'                => __('No metiers found.', 'metier'),
            'not_found_in_trash'                => __('No metiers found in Trash', 'metier'),
            'all_items'                => __('All metiers', 'metier'),
            'archives'                => __('Metier archive', 'metier'),
            'attributes'                => __('Metier attributes', 'metier'),
            'insert_into_item'         => __('Insert into metier', 'metier' ),
            'uploaded_to_this_item'    => __('Uploaded to this metier', 'metier' ),
            'filter_items_list'        => __('Filter metiers list', 'metier' ),
            'items_list_navigation'    => __('Metier list navigation', 'metier' ), 
            'items_list'               => __('Metier list', 'metier' ),
            'item_published'           => __('Metier published.', 'metier' ),
            'item_published_privately' => __('Metier published privately.', 'metier' ),
            'item_reverted_to_draft'   => __('Metier reverted to draft.', 'metier' ),
            'item_scheduled'           => __('Metier scheduled.', 'metier' ),
            'item_updated'             => __('Metier updated.', 'metier' ),
        ],
        'has_archive' => true,
        'public' => true,
        'hierarchical' => false,
        'exclude_from_search' => false,
        'rewrite' => [
            'slug' => _x('metiers', 'URL', 'metier')
        ],
        'taxonomies' => ['metier_category', 'metier_divisions'],
        'supports' => ['title', 'editor', 'excerpt', 'thumbnail']
    ]);
    register_taxonomy('metier_category', 'metiers', [
        'meta_box_cb' => 'post_categories_meta_box',
        'labels' => [
        'name'                       => __('Categories', 'metier' ),
        'singular_name'              => __('Category', 'metier' ),
        'search_items'               => __('Search Category' , 'metier'),
        'popular_items'              => __('Popular Category' , 'metier'),
        'all_items'                  => __('All Category' , 'metier'),
        'edit_item'                  => __('Edit Category' , 'metier'),
        'view_item'                  => __('View Category' , 'metier'),
        'update_item'                => __('Update Category' , 'metier'),
        'add_new_item'               => __('Add New Category' , 'metier'),
        'new_item_name'              => __('New Category Name' , 'metier'),
        'separate_items_with_commas' => __('Separate Category with commas' , 'metier'),
        'add_or_remove_items'        => __('Add or remove Category' , 'metier'),
        'choose_from_most_used'      => __('Choose from the most used Category' , 'metier'),
        'not_found'                  => __('No Category found.' , 'metier'),
        'no_terms'                   => __('No Category' , 'metier'),
        'items_list_navigation'      => __('Category list navigation' , 'metier'),
        'items_list'                 => __('Category list' , 'metier'),
        'back_to_items'              => __('&larr; Back to Category' , 'metier'),
        ]
    ]);
    register_taxonomy('metier_divisions', 'metiers', [
        'meta_box_cb' => 'post_categories_meta_box',
        'labels' => [
        'name'                       => __('Divisions', 'metier' ),
        'singular_name'              => __('Division', 'metier' ),
        'search_items'               => __('Search Divisions' , 'metier'),
        'popular_items'              => __('Popular Divisions' , 'metier'),
        'all_items'                  => __('All Divisions' , 'metier'),
        'edit_item'                  => __('Edit Division' , 'metier'),
        'view_item'                  => __('View Division' , 'metier'),
        'update_item'                => __('Update Division' , 'metier'),
        'add_new_item'               => __('Add New Division' ), 'metier', 
        'new_item_name'              => __('New Division Name' , 'metier'),
        'separate_items_with_commas' => __('Separate Divisions with commas' , 'metier'),
        'add_or_remove_items'        => __('Add or remove Divisions' , 'metier'),
        'choose_from_most_used'      => __('Choose from the most used Divisions' , 'metier'),
        'not_found'                  => __('No Divisions found.' , 'metier'),
        'no_terms'                   => __('No Divisions' , 'metier'),
        'items_list_navigation'      => __('Divisions list navigation' , 'metier'),
        'items_list'                 => __('Divisions list' , 'metier'),
        'back_to_items'              => __('&larr; Back to Divisions' , 'metier'),
        ]
    ]);
});

register_activation_hook(__FILE__, 'flush_rewrite_rules');
register_deactivation_hook(__FILE__, 'flush_rewrite_rules');