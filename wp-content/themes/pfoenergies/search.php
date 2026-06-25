<?php get_header(); ?>

<?php global $wp_query; ?>

<div class="bg-primary text-white py-24 mt-19">
    <div class="max-w-7xl mx-auto px-4 md:px-6">

        <h1 class="text-3xl md:text-5xl uppercase font-semibold">
            <?= __('Search Results', 'pfoenergies') ?>
        </h1>

        <?php if (get_search_query()) : ?>
            <p class="mt-4 text-lg">
                <?= __('Search', 'pfoenergies') ?> : "<strong><?= esc_html(get_search_query()); ?></strong>"
            </p>
        <?php endif; ?>

    </div>
</div>

<div class="max-w-7xl mx-auto px-4 md:px-6 py-14">

    <?php if (have_posts()) : ?>

        <div class="mb-10">
            <p class="text-gray-500">
                <?php
                echo sprintf(
                    _n( '%d result found', '%d results found', $wp_query->found_posts, 'pfoenergies' ),
                    $wp_query->found_posts
                );
                ?>
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

            <?php while (have_posts()) : the_post(); ?>

                <article class="bg-white shadow-xl/10 overflow-hidden">

                    <?php if (has_post_thumbnail()) : ?>

                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail(
                                'large',
                                [
                                    'class' => 'w-full h-60 object-cover'
                                ]
                            ); ?>
                        </a>

                    <?php endif; ?>

                    <div class="p-6">

                        <p class="text-sm text-primary uppercase mb-2">
                            <?php
                            $post_type_obj = get_post_type_object(get_post_type());
                            echo $post_type_obj ? esc_html($post_type_obj->labels->singular_name) : '';
                            ?>
                        </p>

                        <h2 class="text-xl font-semibold text-primary mb-4">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h2>

                        <div class="text-gray-600 text-sm mb-6">
                            <?php the_excerpt(); ?>
                        </div>

                        <a
                            href="<?php the_permalink(); ?>"
                            class="inline-flex items-center gap-2 text-primary font-medium"
                        >
                            <?= __('See more', 'pfoenergies') ?>

                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-4 h-4"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor">

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>

                        </a>

                    </div>

                </article>

            <?php endwhile; ?>

        </div>

        <div class="mt-12">
            <?php the_posts_pagination(); ?>
        </div>

    <?php else : ?>

        <div class="text-center py-20">

            <h2 class="text-3xl text-primary mb-4">
                <?= __('No results found', 'pfoenergies') ?>
            </h2>

            <p class="text-gray-500 mb-8">
                <?= __('Try a different keyword.', 'pfoenergies') ?>
            </p>

            <?php $lang_suffix = (function_exists('pll_current_language') && pll_current_language() === 'en') ? '/en' : ''; ?>
            <form
                action="<?= esc_url(get_option('home') . $lang_suffix); ?>/"
                method="get"
                class="max-w-xl mx-auto flex gap-3"
            >
                <?php if ($lang_suffix) : ?>
                    <input type="hidden" name="lang" value="en">
                <?php endif; ?>

                <input
                    type="search"
                    name="s"
                    value="<?= esc_attr(get_search_query()); ?>"
                    class="flex-1 border-2 border-primary px-4 py-3 outline-none"
                    placeholder="<?= __('New search...', 'pfoenergies') ?>"
                >

                <button
                    type="submit"
                    class="bg-primary text-white hover:bg-transparent hover:text-primary border-primary border-2 text-md px-3 py-2 rounded-sm transition-colors duration-300 ease-in-out shadow-2xl"
                >
                    <span class="hidden sm:block">
                        <span class="inline-block ml-2"><?= __('Search', 'pfoenergies') ?></span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline-block ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </span>
                    <span class="block sm:hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" 
                                viewBox="0 0 24 24" 
                                fill="none" 
                                stroke="currentColor" 
                                stroke-width="2.5" 
                                stroke-linecap="round" 
                                stroke-linejoin="round" 
                                class="w-6 h-6">
                            <circle cx="14" cy="10" r="6" />
                            <line x1="9.8" y1="14.2" x2="4" y2="20" />
                        </svg>
                    </span>
                </button>
            </form>

        </div>

    <?php endif; ?>

</div>

<?php get_footer(); ?>