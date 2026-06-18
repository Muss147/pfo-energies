<?php
$url = $args['url'] ?? '#';
$label = $args['label'] ?? __('Find out more', 'pfoenergies');
$variant = $args['variant'] ?? 'primary';

$classes = [
    'primary' => 'bg-primary text-white hover:bg-white hover:text-primary border-primary',
    'white'   => 'bg-white text-primary hover:bg-transparent hover:text-white border-white',
];

$class = $classes[$variant] ?? $classes['primary'];
?>

<a href="<?= esc_url($url) ?>"
   class="<?= $class ?> border-2 text-md px-3 py-2 rounded-sm transition-colors duration-300 ease-in-out inline-flex items-center">

    <span class="ml-2">
        <?= esc_html($label) ?>
    </span>

    <svg xmlns="http://www.w3.org/2000/svg"
         class="w-5 h-5 ml-2"
         fill="none"
         viewBox="0 0 24 24"
         stroke="currentColor">

        <path stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M9 5l7 7-7 7" />

    </svg>

</a>