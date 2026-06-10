
<?php get_header(); ?>
    
    <div class="max-w-7xl mx-auto py-8 mt-14">
        <?php while (have_posts()) : the_post(); ?>

        <article class="w-full">
            <?php if (has_post_thumbnail()): ?>
                <?php the_post_thumbnail('large', ['class' => 'w-full h-145 object-cover mt-3 shadow-xl/20']); ?>
            <?php endif ?>

            <div class="flex items-end justify-between gap-4 mt-7">
                <div class="text-primary">
                    <h1 class="text-3xl uppercase font-semibold mb-6"><?php the_title(); ?></h1>
                    <span class="font-light italic"><?= the_date('d/m/Y') ?></span>
                
                    <div class="formatted mt-7 font-light text-gray-800">
                        <?php the_content(); ?>
                    </div>
                </div>

                <div class="flex-none size-10 border-r border-b border-primary"></div>
            </div>
        </article>

        <?php endwhile; ?>
    </div>

    <div class="separator w-1/3 m-auto h-0.5 bg-primary my-10"></div>

    <?php
    $relatedPosts = new WP_Query([
        'post_type'      => 'post',
        'posts_per_page' => 3,
        'post__not_in'   => [get_the_ID()],
        'orderby'        => 'date',
        'order'          => 'DESC'
    ]);
    ?>

    <?php if ($relatedPosts->have_posts()) : ?>

    <div class="max-w-7xl mx-auto py-8">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">

            <?php while ($relatedPosts->have_posts()) : $relatedPosts->the_post(); ?>

                <?php get_template_part('template-parts/post'); ?>

            <?php endwhile; ?>

        </div>

    </div>

    <?php wp_reset_postdata(); ?>

    <?php endif; ?>
<?php get_footer(); ?>

