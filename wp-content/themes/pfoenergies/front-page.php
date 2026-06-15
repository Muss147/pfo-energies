
<?php get_header(); ?>
    <?php 
    $banner_url = has_post_thumbnail() 
        ? get_the_post_thumbnail_url(get_the_ID(), 'home-thumbnail') 
        : 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mO8dOlyPQAH7QL4Bgm9FAAAAABJRU5ErkJggg==';
    ?>
    <div class="w-full h-168.75 bg-cover bg-center bg-no-repeat bg-fixed" style="background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url('<?= esc_url($banner_url); ?>');">
        <div class="max-w-350 mx-auto px-4 md:px-6 h-full flex flex-col justify-end py-14">
            <div class="max-w-full lg:max-w-2/5 w-full text-white">
                <h1 class="text-2xl md:text-4xl uppercase font-semibold">
                    <?php if(is_category()): ?>
                        <?php single_cat_title() ?>
                    <?php else: ?>
                        <?php single_post_title() ?>
                    <?php endif ?>
                </h1>
                <div class="border-l-2 border-white font-extralight text-md my-6 pl-4">
                    <?php the_content(); ?>
                </div>

                <?php if (have_rows('call_to_action')): while(have_rows('call_to_action')): the_row() ?>
                <a href="<?php the_sub_field('link') ?>" class="bg-white text-primary hover:bg-transparent hover:text-white border-white border-2 text-md px-3 py-2 rounded-sm transition-colors duration-300 ease-in-out">
                    <span class="inline-block ml-2"><?php the_sub_field('libelle') ?></span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 inline-block ml-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                    </svg>
                </a>
                <?php endwhile; endif ?>
            </div>
        </div>
    </div>
    
    <div class="max-w-7xl mx-auto px-4 md:px-6 py-14 space-y-12">
        <div class="inline-block">
            <h2 class="text-xl text-primary uppercase leading-none tracking-tight font-semibold"><?= __('Careers', 'pfoenergies') ?></h2>
            <div class="mt-1 h-0.5 w-16 bg-primary"></div>
        </div>
        
        <!-- Étapes -->
        <?php
        $categories = get_terms([
            'taxonomy'   => 'metier_category',
            'hide_empty' => false
        ]);
        ?>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-10 lg:gap-0">
            <?php foreach ($categories as $index => $category) : ?>

                <?php
                $metiers = get_posts([
                    'post_type'      => 'metiers',
                    'posts_per_page' => -1,
                    'orderby'        => 'menu_order',
                    'order'          => 'ASC',
                    'tax_query'      => [
                        [
                            'taxonomy' => 'metier_category',
                            'field'    => 'term_id',
                            'terms'    => $category->term_id
                        ]
                    ]
                ]);
                ?>

                <div class="
                    flex flex-col items-center text-center px-6
                    <?= $index < count($categories) - 1 ? 'lg:border-r-2 lg:border-primary' : '' ?>
                ">
                    <h3 class="text-primary text-md md:text-xl font-bold uppercase mb-10">
                        <?= esc_html($category->name) ?>
                    </h3>

                    <div class="flex justify-center gap-12 flex-wrap">
                        <?php foreach ($metiers as $metier) : ?>
                            <div>
                                <?php echo get_the_post_thumbnail($metier->ID, 'metier-thumbnail', ['class' => 'h-14 w-auto mx-auto']); ?>

                                <p class="mt-4 text-primary font-extralight text-sm">
                                    <?= esc_html($metier->post_title) ?>
                                </p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Cartes -->
        <?php
        $divisions = get_terms([
            'taxonomy'   => 'metier_divisions',
            'hide_empty' => false
        ]);
        ?>
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
            <?php foreach ($divisions as $index => $division) : ?>
            <!-- Card -->
            <article class="bg-white shadow-xl/10 overflow-hidden group">
                <a href="#">
                    <?php
                    $icon = get_field('image_division', 'term_' . $division->term_id); 
                    if ($icon): 
                    ?>
                    <img src="<?= esc_url($icon['url']) ?>"
                        alt="<?= esc_attr($divisions->post_title) ?>"
                        class="w-full h-60 object-cover transition duration-500 group-hover:scale-105">
                    <?php endif ?>
                    <div class="p-5">
                        <h3 class="text-primary text-md md:text-lg font-bold uppercase">
                            <?= esc_html($division->name) ?>
                        </h3>
                        <p class="uppercase italic text-primary/80 font-extralight text-sm mt-1">
                            <?= esc_html($division->description) ?>
                        </p>
                    </div>
                </a>
            </article>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- LATEST PROJECTS -->
    <?php
    $projects = new WP_Query([
        'post_type'      => 'realisations',
        'posts_per_page' => 2,
        'post_status'    => 'publish',
    ]);
    ?>

    <?php if ($projects->have_posts()) : ?>

    <section class="max-w-7xl mx-auto px-4 md:px-6 py-4 space-y-12">
        <?php
        $index = 0;

        while ($projects->have_posts()) :
            $projects->the_post();
            get_template_part(
                'template-parts/project-highlight',
                null,
                [
                    'reverse' => $index % 2 !== 0
                ]
            );
            $index++;
        endwhile; 
        ?>
    </section>

    <?php 
    wp_reset_postdata();
    endif; ?>

    <!-- LASTEST ARTICLES -->
    <?php
    $relatedPosts = new WP_Query([
        'post_type'      => 'post',
        'posts_per_page' => 3,
        'orderby'        => 'date',
        'order'          => 'DESC'
    ]);
    ?>

    <?php if ($relatedPosts->have_posts()) : ?>

    <div class="max-w-7xl mx-auto px-4 lg:px-6 py-8 space-y-8">
        <div class="inline-block">
            <h2 class="text-xl text-primary uppercase leading-none tracking-tight font-semibold"><?= __('News', 'pfoenergies') ?></h2>
            <div class="mt-1 h-0.5 w-16 bg-primary"></div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            <?php while ($relatedPosts->have_posts()) : $relatedPosts->the_post(); ?>

                <?php get_template_part('template-parts/post'); ?>

            <?php endwhile; ?>

        </div>

        <a href="" class="bg-primary text-white hover:bg-white hover:text-primary hover:border-primary border-2 text-md px-3 py-2 rounded-sm transition-colors duration-300 ease-in-out">
            <span class="inline-block ml-2"><?= __('All our news', 'pfoenergies') ?></span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 inline-block ml-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
            </svg>
        </a>
    </div>

    <?php wp_reset_postdata(); ?>
    <?php endif; ?>

    <!-- GROUPE PFO -->
    <?php if (have_rows('groupe_pfo_africa')): while(have_rows('groupe_pfo_africa')): the_row() ?>
    <div class="max-w-7xl mx-auto px-4 lg:px-6 py-8 space-y-8">
        <div class="inline-block">
            <h2 class="text-xl text-primary uppercase leading-none tracking-tight font-semibold"><?= __('The PFO AFRICA group', 'pfoenergies') ?></h2>
            <div class="mt-1 h-0.5 w-16 bg-primary"></div>
        </div>
        
        <div class="max-w-6xl mx-auto relative">
            <div class="flex flex-col gap-6 font-light text-gray-800 pb-10">
                
                <?php the_sub_field('presentation') ?>

                <?php if (have_rows('satistiques')): while(have_rows('satistiques')): the_row() ?>
                <div class="grid grid-cols-2 text-primary mt-4">
                    <div class="text-center">
                        <?php the_sub_field('stat_1') ?>
                    </div>
                    <div class="text-center">
                        <?php the_sub_field('stat_2') ?>
                    </div>
                </div>
                <?php endwhile; endif ?>
            </div>
            <div class="absolute bottom-0 right-0 flex-none size-10 border-r border-b border-primary"></div>
        </div>

        <?php if (have_rows('call_to_action')): while(have_rows('call_to_action')): the_row() ?>
        <a href="<?php the_sub_field('lien') ?>" class="bg-primary text-white hover:bg-white hover:text-primary hover:border-primary border-2 text-md px-3 py-2 rounded-sm transition-colors duration-300 ease-in-out">
            <span class="inline-block ml-2"><?php the_sub_field('libelle') ?></span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 inline-block ml-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
            </svg>
        </a>
        <?php endwhile; endif ?>
    </div>
    <?php endwhile; endif ?>

<?php get_footer(); ?>

