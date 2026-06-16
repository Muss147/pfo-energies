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
        <div class="max-w-350 mx-auto px-4 md:px-6 h-full py-14 mt-10">
            <div class="max-w-full lg:max-w-2/5 w-full text-white">
                <h1 class="text-2xl md:text-4xl uppercase font-semibold">
                    <?php the_title(); ?>
                </h1>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 md:px-6 py-14 space-y-12">
        
        <article class="prose prose-sm md:prose-base max-w-none text-gray-800">
            <?php the_content(); ?>
        </article>

    </div>

<?php 
endwhile; // Fin de la boucle
get_footer(); 
?>