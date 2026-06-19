<?php
/*
Template Name: À propos
*/
?>

<?php get_header(); ?>

<?php
/*
pt-6
*/
?>

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
            $cta_group = get_field('banner_top');

            if (have_rows('banner_top') && !empty(array_filter((array)$cta_group))) : 
                while (have_rows('banner_top')) : the_row();
                    // Stockage des sous-champs dans des variables pour épurer le HTML
                    $date_creation       = get_sub_field('date_de_creation');
                    $localisation = get_sub_field('localisation');
                    $image_url   = get_sub_field('logo');
                    $equipe = get_sub_field('equipe_specialisee');
        ?>
        <div class="flex flex-col md:flex-row gap-6 items-center justify-between">
            <img alt="" src="<?= esc_url($image_url) ?>" class="h-8 md:h-11">
            <div class="flex flex-col md:flex-row justify-center md:justify-end text-primary text-base gap-4 md:gap-0">
                <div class="text-center md:text-left px-6 md:border-r-2 md:border-primary">
                    <h4 class="font-bold">Date de création</h4>
                    <span class="font-extralight text-sm"><?= esc_html($date_creation); ?></span>
                </div>
                <div class="text-center md:text-left px-6 md:border-r-2 md:border-primary">
                    <h4 class="font-bold">Localisation</h4>
                    <span class="font-extralight text-sm"><?= esc_html($localisation); ?></span>
                </div>
                <div class="text-center md:text-left px-6">
                    <h4 class="font-bold">Équipe spécialisée</h4>
                    <span class="font-extralight text-sm"><?= esc_html($equipe); ?></span>
                </div>
            </div>
        </div>
        <?php endwhile; endif ?>

        <?php
        $i = 1;
        // La boucle tourne tant qu'ACF trouve un groupe nommé 'section_1', 'section_2', etc.
        while (have_rows('section_' . $i)) : the_row();

            // Comme on a fait "the_row()", on récupère les sous-champs directement
            $title   = get_sub_field('title');   // Remplace par le nom exact de ton sous-champ titre
            $content = get_sub_field('content', false, false); // Remplace par le nom exact de ton sous-champ contenu
            ?>
        <div class="space-y-6">
            <?php if ($title) : ?>
            <div class="inline-block">
                <h2 class="text-xl text-primary uppercase leading-none tracking-tight font-semibold"><?= $title ?></h2>
                <div class="mt-1 h-0.5 w-16 bg-primary"></div>
            </div>
            <?php endif; ?>
            
            <?php if ($content) : ?>
                    <?= $content; ?>
            <?php endif; ?>
        </div>
        <?php
            $i++;
            endwhile; 
        ?>
    </div>
<?php 
endwhile; // Fin de la boucle
get_footer(); 
?>