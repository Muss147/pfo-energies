<?php
require_once('inc/supports.php');
require_once('inc/assets.php');
require_once('inc/apparence.php');
require_once('inc/menus.php');
require_once('inc/images.php');
require_once('inc/style.php');
require_once('inc/query/posts.php');
require_once('inc/query/project.php');

function pfoenergies_icon(string $name): string {
    $spriteUrl = get_template_directory_uri() . '/assets/sprite.14d9fd56.svg';
    return <<<HTML
<svg class="icon"><use xlink:href="{$spriteUrl}#{$name}"></use></svg>
HTML;
}

function pfoenergies_pagination(): void
{
    $links = paginate_links([
        'type'      => 'array',
        'prev_text' => '«',
        'next_text' => '»',
    ]);

    if (!$links) {
        return;
    }

    ?>
    <div class="col-span-3 flex items-center justify-center mt-10 gap-4">
        <?php foreach ($links as $link) : ?>
            <?php if (str_contains($link, 'current')) : ?>
                <span class="px-3 py-1 bg-primary text-white rounded-full border-2 border-primary">
                    <?= strip_tags($link) ?>
                </span>
            <?php else : ?>
                <?= str_replace(
                    '<a',
                    '<a class="px-3 py-1 bg-white text-primary rounded-full border-2 border-primary hover:bg-primary hover:text-white transition-colors duration-300 ease-in-out"',
                    $link
                ) ?>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
    <?php
}

// Garantir qu’un seul article est "à la une" au moment de l’enregistrement ACF
add_action('acf/save_post', function ($post_id) {

    if (get_post_type($post_id) !== 'post') {
        return;
    }

    if (!get_field('a_la_une', $post_id)) {
        return;
    }

    $posts = get_posts([
        'post_type'      => 'post',
        'posts_per_page' => -1,
        'post__not_in'   => [$post_id],
        'meta_key'       => 'a_la_une',
        'meta_value'     => 1,
        'fields'         => 'ids'
    ]);

    foreach ($posts as $id) {
        update_field('a_la_une', 0, $id);
    }

}, 20);