<?php
add_action('customize_register', function (\WP_Customize_Manager $manager) {

    $manager->add_section('pfoenergies_appearance', [
        'title' => __('Theme appearance')
    ]);

    // Logo principal
    $manager->add_setting('logo', [
        'sanitize_callback' => 'esc_url_raw'
    ]);

    $manager->add_control(new \WP_Customize_Image_Control($manager, 'logo', [
        'label' => __('Logo', 'pfoenergies'),
        'section' => 'pfoenergies_appearance'
    ]));

    // Logo footer
    $manager->add_setting('footer_logo', [
        'sanitize_callback' => 'esc_url_raw',
    ]);

    $manager->add_control(
        new \WP_Customize_Image_Control(
            $manager,
            'footer_logo',
            [
                'label'     => __('Footer logo', 'pfoenergies'),
                'section'   => 'pfoenergies_appearance',
                'mime_type' => 'image',
            ]
        )
    );

    // Réseaux sociaux
    $socials = [
        'facebook'  => 'Facebook',
        'instagram' => 'Instagram',
        'youtube'   => 'YouTube',
        'linkedin'  => 'LinkedIn',
        'twitter'   => 'X / Twitter',
    ];

    foreach ($socials as $key => $label) {
        $manager->add_setting($key, [
            'sanitize_callback' => 'esc_url_raw',
            'default' => '',
        ]);

        $manager->add_control($key, [
            'label'   => $label,
            'section' => 'pfoenergies_appearance',
            'type'    => 'url',
        ]);
    }
});