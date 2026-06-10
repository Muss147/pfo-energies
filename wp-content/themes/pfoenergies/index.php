
<?php get_header(); ?>

    <div class="w-full h-168.75 bg-contain bg-center bg-no-repeat bg-fixed mt-14" style="background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url('<?php echo get_template_directory_uri(); ?>/assets/img/actualites.png');">
        <div class="max-w-350 mx-auto text-white py-14">
            <h1 class="text-4xl uppercase font-semibold">
                <?php if(is_category()): ?>
                    <?php single_cat_title() ?>
                <?php else: ?>
                    <?php single_post_title() ?>
                <?php endif ?>
            </h1>
        </div>
    </div>
    
    <?php
    $featured = new WP_Query([
        'post_type'      => 'post',
        'posts_per_page' => 1,
        'meta_key'       => 'a_la_une',
        'meta_value'     => 1,
    ]);
    ?>
    <?php if ($featured->have_posts()) : ?>

    <?php while ($featured->have_posts()) : $featured->the_post(); ?>
    <div class="max-w-7xl mx-auto py-8">
        <div class="inline-block mb-8">
            <h2 class="text-xl text-primary uppercase leading-none tracking-tight font-semibold"><?= __('Featured', 'pfoenergies') ?></h2>
            <div class="mt-1 h-0.5 w-16 bg-primary"></div>
        </div>

        <article class="w-full">
            <div class="pr-0 sm:pr-12">
                <div class="flex items-center justify-between text-primary">
                    <a href="<?php the_permalink(); ?>"><h3 class="text-md uppercase font-semibold mb-2"><?php the_title(); ?></h3></a>
                    <span class="font-light italic"><?php echo get_the_date('d/m/Y'); ?></span>
                </div>
                <?php if (has_post_thumbnail()) : ?>
                    <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('full', [
                        'class' => 'w-full h-145 object-cover mt-3 shadow-xl'
                    ]); ?>
                    </a>
                <?php endif; ?>
                <div class="mt-7 font-light text-gray-800">
                    <?= wp_trim_words(get_the_excerpt(), 45); ?>
                </div>
            </div>
            <div class="flex items-center justify-between mt-5">
                <a href="<?php the_permalink(); ?>" class="bg-primary text-white hover:bg-white hover:text-primary hover:border-primary border-2 text-md px-3 py-1 rounded-sm transition-colors duration-300 ease-in-out">
                    <span class="inline-block ml-2"><?= __('Read more', 'pfoenergies') ?></span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 inline-block ml-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                    </svg>
                </a>
                <div class="size-10 border-r border-b border-primary"></div>
            </div>
        </article>
    </div>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>

    <?php endif; ?>

    <?php
    $featured_post_id = null;

    if ($featured->have_posts()) {
        $featured->the_post();
        $featured_post_id = get_the_ID();
        wp_reset_postdata();
    }
    ?>
    <div class="max-w-7xl mx-auto py-8">
        <div class="inline-block mb-8">
            <h2 class="text-xl text-primary uppercase leading-none tracking-tight font-semibold"><?= __('More posts', 'pfoenergies') ?></h2>
            <div class="mt-1 h-0.5 w-16 bg-primary"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                
                <?php get_template_part('template-parts/post') ?>

                <?php endwhile; ?> 

                <?php pfoenergies_pagination() ?>

            <?php else : ?>
                <h2 class="col-span-3 text-center mt-24"><?= __('No posts found.', 'pfoenergies'); ?></h2>
            <?php endif; ?>
        </div>
    </div>
<?php get_footer(); ?>

