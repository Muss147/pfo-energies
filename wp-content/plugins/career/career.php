<?php 
/**
 * Plugin Name: Careers Plugin
 * Text Domain: career
 * Domain Path: /languages
*/

defined('ABSPATH') or die('rien à voir');

add_action('plugins_loaded', function () {
    load_plugin_textdomain('career', false, basename(dirname(__FILE__)) . '/languages');
});

add_action('init', function () {
    register_post_type('careers', [
        'label' => __('Careers', 'career'),
        'menu_icon' => 'dashicons-awards',
        'labels' => [
            'name'                     => __('Careers', 'career'),
            'singular_name'            => __('Career', 'career'),
            'edit_item'                => __('Edit career', 'career'),
            'new_item'                => __('New career', 'career'),
            'view_item'                => __('View career', 'career'),
            'view_items'                => __('View careers', 'career'),
            'search_items'                => __('Search careers', 'career'),
            'not_found'                => __('No careers found.', 'career'),
            'not_found_in_trash'                => __('No careers found in Trash', 'career'),
            'all_items'                => __('All careers', 'career'),
            'archives'                => __('Career archive', 'career'),
            'attributes'                => __('Career attributes', 'career'),
            'insert_into_item'         => __('Insert into career', 'career' ),
            'uploaded_to_this_item'    => __('Uploaded to this career', 'career' ),
            'filter_items_list'        => __('Filter careers list', 'career' ),
            'items_list_navigation'    => __('Career list navigation', 'career' ), 
            'items_list'               => __('Career list', 'career' ),
            'item_published'           => __('Career published.', 'career' ),
            'item_published_privately' => __('Career published privately.', 'career' ),
            'item_reverted_to_draft'   => __('Career reverted to draft.', 'career' ),
            'item_scheduled'           => __('Career scheduled.', 'career' ),
            'item_updated'             => __('Career updated.', 'career' ),
        ],
        'has_archive' => true,
        'public' => true,
        'hierarchical' => false,
        'exclude_from_search' => false,
        'rewrite' => [
            'slug' => _x('careers', 'URL', 'career')
        ],
        'taxonomies' => ['career_portrait', 'career_divisions'],
        'supports' => ['title', 'editor', 'excerpt', 'thumbnail']
    ]);
    register_taxonomy('career_portrait', 'careers', [
        'meta_box_cb' => 'post_categories_meta_box',
        'labels' => [
        'name'                       => __('Portraits', 'career' ),
        'singular_name'              => __('Portrait', 'career' ),
        'search_items'               => __('Search Portrait' , 'career'),
        'popular_items'              => __('Popular Portrait' , 'career'),
        'all_items'                  => __('All Portrait' , 'career'),
        'edit_item'                  => __('Edit Portrait' , 'career'),
        'view_item'                  => __('View Portrait' , 'career'),
        'update_item'                => __('Update Portrait' , 'career'),
        'add_new_item'               => __('Add New Portrait' , 'career'),
        'new_item_name'              => __('New Portrait Name' , 'career'),
        'separate_items_with_commas' => __('Separate Portrait with commas' , 'career'),
        'add_or_remove_items'        => __('Add or remove Portrait' , 'career'),
        'choose_from_most_used'      => __('Choose from the most used Portrait' , 'career'),
        'not_found'                  => __('No Portrait found.' , 'career'),
        'no_terms'                   => __('No Portrait' , 'career'),
        'items_list_navigation'      => __('Portrait list navigation' , 'career'),
        'items_list'                 => __('Portrait list' , 'career'),
        'back_to_items'              => __('&larr; Back to Portrait' , 'career'),
        ]
    ]);
});

register_activation_hook(__FILE__, 'flush_rewrite_rules');
register_deactivation_hook(__FILE__, 'flush_rewrite_rules');