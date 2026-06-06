<?php
require_once('inc/supports.php');
require_once('inc/assets.php');
require_once('inc/apparence.php');
require_once('inc/menus.php');
require_once('inc/images.php');
require_once('inc/query/posts.php');

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