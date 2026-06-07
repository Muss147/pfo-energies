<?php 
/**
* Plugin Name: Realisations Plugin
*/
add_action('init', function () {
    register_post_type('projet', [
        'label' => __('Projets', 'realisation'),
        'menu_icon' => 'dashicons-portfolio',
        'labels' => [
            'name'                     => __('Projets', 'realisation'),
            'singular_name'            => __('Projet', 'realisation'),
            'edit_item'                => __( 'Edit projet', 'realisation'),
            'new_item'                => __( 'New projet', 'realisation'),
            'view_item'                => __( 'View projet', 'realisation'),
            'view_items'                => __( 'View projets', 'realisation'),
            'search_items'                => __( 'Search projets', 'realisation'),
            'not_found'                => __( 'No projets found.', 'realisation'),
            'not_found_in_trash'                => __( 'No projets found in Trash', 'realisation'),
            'all_items'                => __( 'All projets', 'realisation'),
            'archives'                => __( 'Projet archive', 'realisation'),
            'attributes'                => __( 'Projet attributes', 'realisation'),
            'insert_into_item'         => __( 'Insert into projet', 'realisation' ),
            'uploaded_to_this_item'    => __( 'Uploaded to this projet', 'realisation' ),
            'filter_items_list'        => __( 'Filter projets list', 'realisation' ),
            'items_list_navigation'    => __( 'Projet list navigation', 'realisation' ), 
            'items_list'               => __( 'Projet list', 'realisation' ),
            'item_published'           => __( 'Projet published.', 'realisation' ),
            'item_published_privately' => __( 'Projet published privately.', 'realisation' ),
            'item_reverted_to_draft'   => __( 'Projet reverted to draft.', 'realisation' ),
            'item_scheduled'           => __( 'Projet scheduled.', 'realisation' ),
            'item_updated'             => __( 'Projet updated.', 'realisation' ),
        ],
        'has_archive' => true,
        'public' => true,
        'hierarchical' => false,
        'exclude_from_search' => false,
        'taxonomies' => ['projet_status', 'projet_location'],
        'supports' => ['title', 'editor', 'excerpt', 'thumbnail']
    ]);
    register_taxonomy('projet_status', 'projet', [
        'meta_box_cb' => 'post_categories_meta_box',
        'labels' => [
        'name'                       => __( 'Status', 'realisation' ),
        'singular_name'              => __( 'Status', 'realisation' ),
        'search_items'               => __( 'Search Status' , 'realisation'),
        'popular_items'              => __( 'Popular Status' , 'realisation'),
        'all_items'                  => __( 'All Status' , 'realisation'),
        'edit_item'                  => __( 'Edit Status' , 'realisation'),
        'view_item'                  => __( 'View Status' , 'realisation'),
        'update_item'                => __( 'Update Status' , 'realisation'),
        'add_new_item'               => __( 'Add New Status' , 'realisation'),
        'new_item_name'              => __( 'New Status Name' , 'realisation'),
        'separate_items_with_commas' => __( 'Separate Status with commas' , 'realisation'),
        'add_or_remove_items'        => __( 'Add or remove Status' , 'realisation'),
        'choose_from_most_used'      => __( 'Choose from the most used Status' , 'realisation'),
        'not_found'                  => __( 'No Status found.' , 'realisation'),
        'no_terms'                   => __( 'No Status' , 'realisation'),
        'items_list_navigation'      => __( 'Status list navigation' , 'realisation'),
        'items_list'                 => __( 'Status list' , 'realisation'),
        'back_to_items'              => __( '&larr; Back to Status' , 'realisation'),
        ]
    ]);
    register_taxonomy('projet_location', 'projet', [
        'meta_box_cb' => 'post_categories_meta_box',
        'labels' => [
        'name'                       => __( 'Locations', 'realisation' ),
        'singular_name'              => __( 'Location', 'realisation' ),
        'search_items'               => __( 'Search Locations' , 'realisation'),
        'popular_items'              => __( 'Popular Locations' , 'realisation'),
        'all_items'                  => __( 'All Locations' , 'realisation'),
        'edit_item'                  => __( 'Edit Location' , 'realisation'),
        'view_item'                  => __( 'View Location' , 'realisation'),
        'update_item'                => __( 'Update Location' , 'realisation'),
        'add_new_item'               => __( 'Add New Location' ), 'realisation', 
        'new_item_name'              => __( 'New Location Name' , 'realisation'),
        'separate_items_with_commas' => __( 'Separate Locations with commas' , 'realisation'),
        'add_or_remove_items'        => __( 'Add or remove Locations' , 'realisation'),
        'choose_from_most_used'      => __( 'Choose from the most used Locations' , 'realisation'),
        'not_found'                  => __( 'No Locations found.' , 'realisation'),
        'no_terms'                   => __( 'No Locations' , 'realisation'),
        'items_list_navigation'      => __( 'Locations list navigation' , 'realisation'),
        'items_list'                 => __( 'Locations list' , 'realisation'),
        'back_to_items'              => __( '&larr; Back to Locations' , 'realisation'),
        ]
    ]);
    // register_taxonomy('projet_option', 'projet', [
    //     'labels' => [
    //     'name'                       => __( 'Options', 'realisation' ),
    //     'singular_name'              => __( 'Option', 'realisation' ),
    //     'search_items'               => __( 'Search Options' , 'realisation'),
    //     'popular_items'              => __( 'Popular Options' , 'realisation'),
    //     'all_items'                  => __( 'All Options' , 'realisation'),
    //     'edit_item'                  => __( 'Edit Option' , 'realisation'),
    //     'view_item'                  => __( 'View Option' , 'realisation'),
    //     'update_item'                => __( 'Update Option' , 'realisation'),
    //     'add_new_item'               => __( 'Add New Option' ), 'realisation', 
    //     'new_item_name'              => __( 'New Option Name' , 'realisation'),
    //     'separate_items_with_commas' => __( 'Separate Options with commas' , 'realisation'),
    //     'add_or_remove_items'        => __( 'Add or remove Options' , 'realisation'),
    //     'choose_from_most_used'      => __( 'Choose from the most used Options' , 'realisation'),
    //     'not_found'                  => __( 'No Options found.' , 'realisation'),
    //     'no_terms'                   => __( 'No Options' , 'realisation'),
    //     'items_list_navigation'      => __( 'Options list navigation' , 'realisation'),
    //     'items_list'                 => __( 'Options list' , 'realisation'),
    //     'back_to_items'              => __( '&larr; Back to Options' , 'realisation'),
    //     ]
    // ]);
});

register_activation_hook(__FILE__, 'flush_rewrite_rules');
register_deactivation_hook(__FILE__, 'flush_rewrite_rules');