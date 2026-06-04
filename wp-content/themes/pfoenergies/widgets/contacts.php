<?php

$fields = [
    'location' => [
        'icon' => 'icon-location'
    ],
    'phone' => [
        'icon' => 'icon-phone'
    ],
    'email' => [
        'icon' => 'icon-email'
    ]
];
?>

<?php foreach ($fields as $name => $field) : ?>
    <?php
    $label = $instance[$name . '_label'] ?? '';
    $url   = $instance[$name . '_url'] ?? '';
    ?>

    <?php if (!empty($label)) : ?>
        <div class="flex items-center gap-4">
            <img
                alt="<?= ucfirst($name) ?> contact information icon"
                src="<?= get_template_directory_uri() ?>/assets/img/icon/<?= $field['icon'] ?>.png"
                class="h-7 inline-block"
            >

            <?php if (!empty($url)) : ?>
                <a
                    href="<?= esc_url($url) ?>"
                    class="text-sm font-light hover:underline"
                >
                    <?= esc_html($label) ?>
                </a>
            <?php else : ?>

                <span class="text-sm font-light">
                    <?= esc_html($label) ?>
                </span>

            <?php endif; ?>
        </div>
    <?php endif; ?>
<?php endforeach; ?>