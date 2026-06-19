<?php
/*
Template Name: Carrière
*/
?>

<?php get_header(); ?>

<?php 
// Lancement de la boucle WordPress globale
while (have_posts()) : the_post(); 
?>

    <?php 
    // On réutilise notre logique de fallback pour l'image à la une
    $banner_url = has_post_thumbnail() 
        ? get_the_post_thumbnail_url(get_the_ID(), 'full') 
        : 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mO8dOlyPQAH7QL4Bgm9FAAAAABJRU5ErkJggg=='; // Ton image par défaut
    ?>
    
    <div class="w-full h-168.75 bg-cover bg-center bg-no-repeat bg-fixed" style="background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url('<?= esc_url($banner_url); ?>');">
        <div class="max-w-350 mx-auto px-4 md:px-6 h-full py-14 mt-5 md:mt-19">
            <div class="max-w-full lg:max-w-2/5 w-full text-white">
                <h1 class="text-2xl md:text-4xl uppercase font-semibold">
                    <?php the_title(); ?>
                </h1>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 md:px-6 py-14 space-y-16">
        <?php
        $i = 1;

        // La boucle tourne tant qu'ACF trouve un groupe nommé 'section_1', 'section_2', etc.
        while (have_rows('section_' . $i)) : the_row();

            // Comme on a fait "the_row()", on récupère les sous-champs directement
            $title   = get_sub_field('title');   // Remplace par le nom exact de ton sous-champ titre
            $content = get_sub_field('content', false, false); // Remplace par le nom exact de ton sous-champ contenu
            ?>
        <div class="space-y-12 <?php if ($i == 1): ?>relative<?php endif ?>">
            <?php if ($title) : ?>
            <div class="inline-block">
                <h2 class="text-xl text-primary uppercase leading-none tracking-tight font-semibold"><?= $title ?></h2>
                <div class="mt-1 h-0.5 w-16 bg-primary"></div>
            </div>
            <?php endif; ?>

            <?php if ($content) : ?>
                <?= $content; ?>
            <?php endif; ?>

            <?php if ($i == 1): ?>
                <div class="absolute bottom-0 right-0 flex-none size-10 border-r border-b border-primary"></div>
            <?php endif ?>
        </div>
        <?php
            $i++; // 💡 On incrémente le compteur pour tester la section suivante au prochain tour
            endwhile; 
        ?>

        <div class="space-y-12">
            <div class="inline-block">
                <h2 class="text-xl text-primary uppercase leading-none tracking-tight font-semibold">
                    Portraits
                </h2>
                <div class="mt-1 h-0.5 w-16 bg-primary"></div>
            </div>

            <?php
            $portraits = new WP_Query([
                'post_type' => 'careers',
                'posts_per_page' => -1,
                'tax_query' => [
                    [
                        'taxonomy' => 'career_portrait',
                        'field'    => 'slug',
                        'terms'    => 'portraits'
                    ]
                ]
            ]);

            $i = 0;
            while ($portraits->have_posts()) :
                $portraits->the_post();
                $reverse = $i % 2 !== 0;
                $poste = get_field('poste');
                $image = has_post_thumbnail()
                    ? get_the_post_thumbnail_url(get_the_ID(), 'large')
                    : get_template_directory_uri() . '/assets/img/placeholder.jpg';
            ?>
                <div class="max-w-6xl mx-auto grid md:grid-cols-2 items-center md:justify-between gap-6 md:gap-12">
                    <?php 
                    if (!$reverse) {
                        $text_order  = 'order-2 md:order-1';
                        $image_order = 'order-1 md:order-2';
                    } else {
                        $text_order  = 'order-2 md:order-2';
                        $image_order = 'order-1 md:order-1';
                    }
                    ?>
                    <!-- Texte -->
                    <div class="flex flex-col gap-6 text-base font-light text-gray-800 <?= $text_order ?>">
                        <h4 class="uppercase font-extralight text-primary">
                            <span class="font-bold">
                                <?php the_title(); ?>
                            </span>

                            <?php if ($poste) : ?>
                                - <?= esc_html($poste) ?>
                            <?php endif; ?>
                        </h4>

                        <?= get_post_field('post_content', get_the_ID()); ?>
                    </div>

                    <!-- Image -->
                    <div
                        class="flex-none w-full h-120 bg-cover bg-center bg-no-repeat shadow-xl/20 <?= $image_order ?>"
                        style="background-image:url('<?= esc_url($image) ?>')">
                    </div>
                </div>
            <?php
                $i++;
            endwhile;
            wp_reset_postdata();
            ?>
        </div>

        <?php 
            $cta_group = get_field('call_to_action');

            if (have_rows('call_to_action') && !empty(array_filter((array)$cta_group))) : 
                while (have_rows('call_to_action')) : the_row();
                    // Stockage des sous-champs dans des variables pour épurer le HTML
                    $title       = get_sub_field('title');
                    $description = get_sub_field('description');
                    $image_url   = get_sub_field('image');
                    $bouton_link = get_sub_field('bouton');
        ?>
        <div class="grid md:grid-cols-2 items-center md:justify-between md:pt-12">
            <div class="flex flex-col items-center justify-center h-full">
                <div class="space-y-6 w-full px-4 py-10 sm:p-10 text-base font-light bg-primary text-white relative after:hidden md:after:block after:content-[''] after:bg-primary after:absolute after:top-0 after:-left-full after:h-full after:w-full">
                    <?php if ($title) : ?>
                    <div class="inline-block">
                        <h2 class="text-xl sm:text-3xl uppercase leading-none tracking-tight font-semibold">
                            <?= esc_html($title); ?>
                        </h2>
                        <div class="mt-1 h-0.5 w-16 bg-white"></div>
                    </div>
                    <?php endif; ?>

                    <?php if ($description) : ?>
                        <div class="prose prose-invert max-w-none">
                            <?= wp_kses_post($description); ?>
                        </div>
                    <?php endif; ?>

                    <?php 
                        if ($bouton_link) : 
                        $link_url    = $bouton_link['url'];
                        $link_title  = $bouton_link['title'] ?: __('Read more', 'pfoenergies');
                        $link_target = $bouton_link['target'] ? ' target="' . esc_attr($bouton_link['target']) . '"' : '';
                    ?>
                    <a href="<?= esc_url($link_url); ?>" 
                        class="bg-white text-primary hover:bg-transparent hover:text-white border-white border-2 text-md px-3 py-2 rounded-sm transition-colors duration-300 ease-in-out"
                        <?= $link_target; ?>>
                        <span class="inline-block ml-2"><?= esc_html($link_title); ?></span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline-block ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="flex-none w-full h-96 bg-cover bg-center bg-no-repeat shadow-xl/20" style="<?= $image_url ? "background-image: url('" . esc_url($image_url) . "');" : ''; ?>"> </div>
        </div>
        <?php endwhile; endif ?>
    </div>
<?php 
endwhile; // Fin de la boucle
get_footer(); 
?>