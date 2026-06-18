<article class="w-full text-primary">
    <a href="<?php the_permalink() ?>" title="<?= esc_attr(get_the_title()) ?>">
        <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('post-thumbnail', ['class' => 'object-cover w-full shadow-xl/20']) ?>
        <?php else : ?>
            <img class="w-full h-64 shadow-xl/20" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mO8dOlyPQAH7QL4Bgm9FAAAAABJRU5ErkJggg==">
        <?php endif ?>
    </a>
    <a href="<?php the_permalink() ?>">
        <h3 class="relative text-sm uppercase font-semibold my-6
            after:content-[''] after:absolute after:-bottom-1 after:left-0 after:bg-primary after:w-16 after:h-0.5">
            <?= the_title(); ?>
        </h3>
    </a>
    <a href="<?php the_permalink() ?>" class="bg-primary text-white hover:bg-white hover:text-primary hover:border-primary border-2 text-md px-3 py-2 rounded-sm transition-colors duration-300 ease-in-out">
        <span class="inline-block ml-2"><?= __('Learn more', 'pfoenergies') ?></span>
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline-block ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
    </a>
</article>
