
<?php get_header(); ?>

    <?php 
    $blog_page_id = get_option('page_for_posts');

    $banner_url = has_post_thumbnail($blog_page_id) 
        ? get_the_post_thumbnail_url($blog_page_id, 'full') 
        : 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mO8dOlyPQAH7QL4Bgm9FAAAAABJRU5ErkJggg=='; // Ton image par défaut
    ?>
    
    <div class="w-full h-168.75 bg-cover bg-center bg-no-repeat lg:bg-fixed" style="background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url('<?= esc_url($banner_url); ?>');">        
        <div class="max-w-350 mx-auto px-4 md:px-6 h-full py-14 mt-5 md:mt-19">
            <h1 class="text-4xl uppercase text-white font-semibold">
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
    <div class="max-w-7xl mx-auto px-4 md:px-6 py-8">
        <div class="inline-block mb-8">
            <h2 class="text-xl text-primary uppercase leading-none tracking-tight font-semibold"><?= __('Featured', 'pfoenergies') ?></h2>
            <div class="mt-1 h-0.5 w-16 bg-primary"></div>
        </div>

        <article class="w-full">
            <div class="pr-0 sm:pr-12">
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 text-primary">
                    <a href="<?php the_permalink(); ?>"><h3 class="text-md uppercase font-semibold"><?php the_title(); ?></h3></a>
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
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline-block ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
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
    <div class="max-w-7xl mx-auto px-4 md:px-6 py-8">
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

