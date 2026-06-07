
<?php get_header(); ?>
    
    <div class="max-w-7xl mx-auto py-8 mt-14">
        <?php while (have_posts()) : the_post(); ?>

        <article class="w-full">
            <?php if (has_post_thumbnail()): ?>
                <?php the_post_thumbnail('large', ['class' => 'w-full h-145 object-cover mt-3 shadow-xl/20']); ?>
            <?php endif ?>

            <div class="pr-0 sm:pr-12 text-primary mt-7">
                <h1 class="text-3xl uppercase font-semibold mb-6"><?php the_title(); ?></h1>
                <span class="font-light italic"><?= the_date('d/m/Y') ?></span>
            
                <div class="formatted mt-7 font-light text-gray-800">
                    <?php the_content(); ?>
                </div>
            </div>
            <div class="flex justify-end">
                <div class="size-10 border-r border-b border-primary"></div>
            </div>
        </article>

        <?php endwhile; ?>
    </div>

    <div class="separator w-1/3 m-auto h-0.5 bg-primary my-10"></div>

    <!-- <div class="max-w-7xl mx-auto py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>

                <?php get_template_part('template-parts/post') ?>

                <?php endwhile; ?> 
            <?php endif; ?>
        </div>
    </div> -->
<?php get_footer(); ?>

