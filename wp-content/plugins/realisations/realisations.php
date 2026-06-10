<?php 
/**
 * Plugin Name: Realisations Plugin
 * Text Domain: realisation
 * Domain Path: /languages
*/

defined('ABSPATH') or die('rien à voir');

add_action('plugins_loaded', function () {
    load_plugin_textdomain('realisation', false, basename(dirname(__FILE__)) . '/languages');
});

add_action('init', function () {
    register_post_type('realisations', [
        'label' => __('Realisations', 'realisation'),
        'menu_icon' => 'dashicons-portfolio',
        'labels' => [
            'name'                     => __('Realisations', 'realisation'),
            'singular_name'            => __('Project', 'realisation'),
            'edit_item'                => __('Edit project', 'realisation'),
            'new_item'                => __('New project', 'realisation'),
            'view_item'                => __('View project', 'realisation'),
            'view_items'                => __('View projects', 'realisation'),
            'search_items'                => __('Search projects', 'realisation'),
            'not_found'                => __('No projects found.', 'realisation'),
            'not_found_in_trash'                => __('No projects found in Trash', 'realisation'),
            'all_items'                => __('All projects', 'realisation'),
            'archives'                => __('Project archive', 'realisation'),
            'attributes'                => __('Project attributes', 'realisation'),
            'insert_into_item'         => __('Insert into project', 'realisation' ),
            'uploaded_to_this_item'    => __('Uploaded to this project', 'realisation' ),
            'filter_items_list'        => __('Filter projects list', 'realisation' ),
            'items_list_navigation'    => __('Project list navigation', 'realisation' ), 
            'items_list'               => __('Project list', 'realisation' ),
            'item_published'           => __('Project published.', 'realisation' ),
            'item_published_privately' => __('Project published privately.', 'realisation' ),
            'item_reverted_to_draft'   => __('Project reverted to draft.', 'realisation' ),
            'item_scheduled'           => __('Project scheduled.', 'realisation' ),
            'item_updated'             => __('Project updated.', 'realisation' ),
        ],
        'has_archive' => true,
        'public' => true,
        'hierarchical' => false,
        'exclude_from_search' => false,
        'rewrite' => [
            'slug' => _x('realisations', 'URL', 'realisation')
        ],
        'taxonomies' => ['project_status', 'project_location'],
        'supports' => ['title', 'editor', 'excerpt', 'thumbnail']
    ]);
    register_taxonomy('project_status', 'realisations', [
        'meta_box_cb' => 'post_categories_meta_box',
        'labels' => [
        'name'                       => __('Status', 'realisation' ),
        'singular_name'              => __('Status', 'realisation' ),
        'search_items'               => __('Search Status' , 'realisation'),
        'popular_items'              => __('Popular Status' , 'realisation'),
        'all_items'                  => __('All Status' , 'realisation'),
        'edit_item'                  => __('Edit Status' , 'realisation'),
        'view_item'                  => __('View Status' , 'realisation'),
        'update_item'                => __('Update Status' , 'realisation'),
        'add_new_item'               => __('Add New Status' , 'realisation'),
        'new_item_name'              => __('New Status Name' , 'realisation'),
        'separate_items_with_commas' => __('Separate Status with commas' , 'realisation'),
        'add_or_remove_items'        => __('Add or remove Status' , 'realisation'),
        'choose_from_most_used'      => __('Choose from the most used Status' , 'realisation'),
        'not_found'                  => __('No Status found.' , 'realisation'),
        'no_terms'                   => __('No Status' , 'realisation'),
        'items_list_navigation'      => __('Status list navigation' , 'realisation'),
        'items_list'                 => __('Status list' , 'realisation'),
        'back_to_items'              => __('&larr; Back to Status' , 'realisation'),
        ]
    ]);
    register_taxonomy('project_location', 'realisations', [
        'meta_box_cb' => 'post_categories_meta_box',
        'labels' => [
        'name'                       => __('Locations', 'realisation' ),
        'singular_name'              => __('Location', 'realisation' ),
        'search_items'               => __('Search Locations' , 'realisation'),
        'popular_items'              => __('Popular Locations' , 'realisation'),
        'all_items'                  => __('All Locations' , 'realisation'),
        'edit_item'                  => __('Edit Location' , 'realisation'),
        'view_item'                  => __('View Location' , 'realisation'),
        'update_item'                => __('Update Location' , 'realisation'),
        'add_new_item'               => __('Add New Location' ), 'realisation', 
        'new_item_name'              => __('New Location Name' , 'realisation'),
        'separate_items_with_commas' => __('Separate Locations with commas' , 'realisation'),
        'add_or_remove_items'        => __('Add or remove Locations' , 'realisation'),
        'choose_from_most_used'      => __('Choose from the most used Locations' , 'realisation'),
        'not_found'                  => __('No Locations found.' , 'realisation'),
        'no_terms'                   => __('No Locations' , 'realisation'),
        'items_list_navigation'      => __('Locations list navigation' , 'realisation'),
        'items_list'                 => __('Locations list' , 'realisation'),
        'back_to_items'              => __('&larr; Back to Locations' , 'realisation'),
        ]
    ]);
    // register_taxonomy('project_option', 'realisations', [
    //     'labels' => [
    //     'name'                       => __('Options', 'realisation' ),
    //     'singular_name'              => __('Option', 'realisation' ),
    //     'search_items'               => __('Search Options' , 'realisation'),
    //     'popular_items'              => __('Popular Options' , 'realisation'),
    //     'all_items'                  => __('All Options' , 'realisation'),
    //     'edit_item'                  => __('Edit Option' , 'realisation'),
    //     'view_item'                  => __('View Option' , 'realisation'),
    //     'update_item'                => __('Update Option' , 'realisation'),
    //     'add_new_item'               => __('Add New Option' ), 'realisation', 
    //     'new_item_name'              => __('New Option Name' , 'realisation'),
    //     'separate_items_with_commas' => __('Separate Options with commas' , 'realisation'),
    //     'add_or_remove_items'        => __('Add or remove Options' , 'realisation'),
    //     'choose_from_most_used'      => __('Choose from the most used Options' , 'realisation'),
    //     'not_found'                  => __('No Options found.' , 'realisation'),
    //     'no_terms'                   => __('No Options' , 'realisation'),
    //     'items_list_navigation'      => __('Options list navigation' , 'realisation'),
    //     'items_list'                 => __('Options list' , 'realisation'),
    //     'back_to_items'              => __('&larr; Back to Options' , 'realisation'),
    //     ]
    // ]);
});

register_activation_hook(__FILE__, 'flush_rewrite_rules');
register_deactivation_hook(__FILE__, 'flush_rewrite_rules');