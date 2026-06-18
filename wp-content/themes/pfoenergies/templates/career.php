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
                <h2 class="text-xl text-primary uppercase leading-none tracking-tight font-semibold">Portraits</h2>
                <div class="mt-1 h-0.5 w-16 bg-primary"></div>
            </div>
            <div class="max-w-6xl mx-auto grid md:grid-cols-2 items-center justify-between gap-6 md:gap-12">
                <div class="flex flex-col gap-6 text-base font-light text-gray-800 order-2 md:order-1">
                    <h4 class="uppercase font-extralight text-primary"><span class="font-bold">Adonis EBA -</span> Chargé des ressources humaines à PFO Énergies</h4>
                    <p>Ancien collaborateur du groupe PFO Africa, Adonis a gravi les
                    échelons au sein des filiales avant de prendre ses fonctions
                    actuelles.</p>
                    <p>Il assure la gestion du personnel et l’administration de la paie
                    pour l’ensemble de PFO Énergies, fort de plus de 10 ans
                    d’expérience dans de grandes. Il est titulaire d’un DEA en
                    Gestion (Comptabilité & Contrôle de gestion) de l’Université
                    FHB d’Abidjan.</p>
                </div>
                <div class="flex-none w-full h-120 bg-cover bg-center bg-no-repeat shadow-xl/20 order-1 md:order-2" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/bg/rh-politique-2.jpg');"> </div>
            </div>
            <div class="max-w-6xl mx-auto grid md:grid-cols-2 items-center justify-between gap-6 md:gap-12">
                <div class="flex-none w-full h-120 bg-cover bg-center bg-no-repeat shadow-xl/20" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/bg/rh-politique.jpg');"> </div>
                <div class="flex flex-col gap-6 text-base font-light text-gray-800">
                    <h4 class="uppercase font-extralight text-primary"><span class="font-bold">Abdoul DOSSO -</span> Ingénieur projet à FERKÉ SOLAR</h4>
                    <p>Abdoul a intégré l’entreprise en octobre 2022 et contribué
                    dès ses débuts au développement du projet Ferké Solar.</p>
                    <p>Il intervient aujourd’hui sur la construction de la centrale
                    solaire de 52 MWc à Ferkessédougou, où il participe au
                    pilotage et au suivi des travaux. Son parcours illustre une
                    progression continue au sein du groupe, des études
                    préparatoires à la mise en oeuvre opérationnelle.</p>
                </div>
            </div>
        </div>
        
        <div class="grid md:grid-cols-2 items-center md:justify-between md:pt-12">
            <div class="flex flex-col items-center justify-center h-full">
                <div class="space-y-6 w-full px-4 py-10 sm:p-10 text-base font-light bg-primary text-white relative after:hidden md:after:block after:content-[''] after:bg-primary after:absolute after:top-0 after:-left-full after:h-full after:w-full">
                    <div class="inline-block">
                        <h2 class="text-xl sm:text-3xl uppercase leading-none tracking-tight font-semibold">Rejoingnez-nous</h2>
                        <div class="mt-1 h-0.5 w-16 bg-white"></div>
                    </div>
                    <p class="font-bold">Offres d'emplois</p>
                    <a href="" class="bg-white text-primary hover:bg-transparent hover:text-white border-white border-2 text-md px-3 py-2 rounded-sm transition-colors duration-300 ease-in-out">
                        <span class="inline-block ml-2">recrutement@pfoenergies.com</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline-block ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>
            <div class="flex-none w-full h-96 bg-cover bg-center bg-no-repeat shadow-xl/20" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/bg/rejoignez-nous.jpg');"> </div>
        </div>
    </div>
<?php 
endwhile; // Fin de la boucle
get_footer(); 
?>