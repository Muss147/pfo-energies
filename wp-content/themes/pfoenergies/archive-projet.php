
<?php get_header(); ?>

    <div class="w-full h-168.75 bg-contain bg-center bg-no-repeat bg-fixed mt-14" style="background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url('<?php echo get_template_directory_uri(); ?>/assets/img/projets/ferke_solar_img2.png');">
        <div class="max-w-350 mx-auto text-white py-14">
            <h1 class="text-4xl uppercase font-semibold">
                <?php if(is_category()): ?>
                    <?php single_cat_title() ?>
                <?php else: ?>
                    <?php single_post_title() ?>
                <?php endif ?>
            </h1>
            <!-- <p class="mt-4 text-lg">Nous sommes une entreprise spécialisée dans les énergies renouvelables, offrant des solutions innovantes pour un avenir plus durable.</p> -->
        </div>
    </div>

    <div class="max-w-7xl mx-auto py-8">
        <div class="inline-block mb-8">
            <h2 class="text-xl text-primary uppercase leading-none tracking-tight font-semibold"><?php _e('Completed projects', 'pfoenergies') ?></h2>
            <div class="mt-1 h-0.5 w-16 bg-primary"></div>
        </div>

        
    </div>
<?php get_footer(); ?>

