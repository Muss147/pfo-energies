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
        
        <div class="space-y-10 relative">
            <div class="inline-block">
                <h2 class="text-xl text-primary uppercase leading-none tracking-tight font-semibold">Notre métier</h2>
                <div class="mt-1 h-0.5 w-16 bg-primary"></div>
            </div>
            <div class="max-w-6xl mx-auto">
                <div class="flex flex-col gap-6 font-light text-gray-800">
                    <h4 class="uppercase font-extralight text-primary">Construire une énergie durable pour l'Afrique</h4>
                    <p>Au Groupe PFO Africa, nous croyons que notre développement repose sur notre équipe diversifiée et talentueuse. Nous sommes une communauté
                    passionnée par l’excellence et l’innovation.</p>
                    <p>Rejoindre le Groupe PFO Africa, à travers sa filiale multi-énergies PFO Énergies, c’est embrasser une culture d’apprentissage continu, de
                    collaboration et d’opportunités de croissance professionnelle.</p>
                    <p>Explorer nos opportunités de carrière et découvrez comment contribuer à imaginer, construire et faire vivre l’Afrique de demain, à travers les solutions
                    énergétiques durables.</p>
                </div>
            </div>
            <div class="absolute bottom-0 right-0 flex-none size-10 border-r border-b border-primary"></div>
        </div>

        <div class="space-y-12">
            <div class="inline-block">
                <h2 class="text-xl text-primary uppercase leading-none tracking-tight font-semibold">Politique RH</h2>
                <div class="mt-1 h-0.5 w-16 bg-primary"></div>
            </div>
            <div class="max-w-6xl mx-auto grid md:grid-cols-2 items-center justify-between gap-6 md:gap-12">
                <div class="flex-none w-full h-72 bg-cover bg-center bg-no-repeat shadow-xl/20" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/bg/rh-politique.jpg');"> </div>
                <div class="flex flex-col gap-6 text-base font-light text-gray-800">
                    <p>Notre politique est axée sur l’excellence et le développement professionnel
                    de nos collaborateurs. Nous croyons fermement que notre équipe est notre
                    atout le plus précieux, et c’est pourquoi nous nous engageons à offrir un
                    environnement de travail dynamique.</p>
                    <p>Notre processus de recrutement est conçu pour attirer les meilleurs talents.
                    Les candidatures sont exclusivement recueillies via notre adresse e-mail
                    dédiée.</p>
                    <p>Nous reconnaissons également l’importance de la formation continue,
                    nous croyons fermement que l’apprentissage est un processus continu, et
                    investissons dans le développement professionnel de nos.</p>
                </div>
            </div>
            <div class="max-w-6xl mx-auto grid md:grid-cols-2 items-center justify-between gap-6 md:gap-12">
                <div class="flex flex-col gap-6 text-base font-light text-gray-800 order-2 md:order-1">
                    <p>En ce qui concerne la gestion des performances, nous adoptons une
                    approche transparente et constructive. Nous encourageons le dialogue
                    ouvert entre les managers et les collaborateurs pour fixer des objectifs
                    clairs et mesurables, et nous offrons un feedback régulier afin de favoriser
                    la croissance et l’amélioration continue.</p>
                    <p>Au sein du groupe PFO Africa, nous sommes fiers de soutenir la
                    croissance de nos équipes, car nous croyons que leur succès est le nôtre.</p>
                </div>
                <div class="flex-none w-full h-72 bg-cover bg-center bg-no-repeat shadow-xl/20 order-1 md:order-2" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/bg/rh-politique-2.jpg');"> </div>
            </div>
        </div>

        <div class="space-y-12">
            <div class="inline-block">
                <h2 class="text-xl text-primary uppercase leading-none tracking-tight font-semibold">Chiffres-clés<br class="hidden md:block"> PFO Africa</h2>
                <div class="mt-1 h-0.5 w-16 bg-primary"></div>
            </div>
            <div class="max-w-6xl mx-auto flex flex-wrap md:flex-nowrap justify-center sm:justify-start gap-10 md:gap-32">
                <div class="min-w-36 text-primary text-center md:text-left">
                    <h4 class="text-3xl md:text-5xl font-bold">+ 5000</h4>
                    <p class="font-extralight">collaborateurs permanents</p>
                </div>
                <div class="min-w-36 text-primary text-center md:text-left">
                    <h4 class="text-3xl md:text-5xl font-bold">+ 100</h4>
                    <p class="font-extralight">profils recrutés par an</p>
                </div>
                <div class="min-w-36 text-primary text-center md:text-left">
                    <h4 class="text-3xl md:text-5xl font-bold">+ 50</h4>
                    <p class="font-extralight">stages ou alternances par an</p>
                </div>
            </div>
        </div>

        <div class="space-y-12">
            <div class="inline-block">
                <h2 class="text-xl text-primary uppercase leading-none tracking-tight font-semibold">Chiffres-clés<br class="hidden md:block"> PFO Énergies</h2>
                <div class="mt-1 h-0.5 w-16 bg-primary"></div>
            </div>
            <div class="max-w-6xl mx-auto flex flex-wrap md:flex-nowrap justify-center sm:justify-start gap-10 md:gap-32">
                <div class="min-w-36 text-primary text-center md:text-left">
                    <h4 class="text-3xl md:text-5xl font-bold">+ 40</h4>
                    <p class="font-extralight">collaborateurs permanents</p>
                </div>
                <div class="min-w-36 text-primary text-center md:text-left">
                    <h4 class="text-3xl md:text-5xl font-bold">+ 05</h4>
                    <p class="font-extralight">recrutements par an</p>
                </div>
                <div class="min-w-36 text-primary text-center md:text-left">
                    <h4 class="text-3xl md:text-5xl font-bold">+ 10</h4>
                    <p class="font-extralight">stages ou alternances par an</p>
                </div>
            </div>
        </div>

    </div>
<?php 
endwhile; // Fin de la boucle
get_footer(); 
?>