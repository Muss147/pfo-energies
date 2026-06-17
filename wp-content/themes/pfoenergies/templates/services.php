<?php
/*
Template Name: Offres & Services
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
                <h2 class="text-xl text-primary uppercase leading-none tracking-tight font-semibold">Notre <br class="hidden md:block">savoir-faire</h2>
                <div class="mt-1 h-0.5 w-16 bg-primary"></div>
            </div>
            <div class="max-w-6xl mx-auto">
                <div class="flex flex-col gap-6 font-light text-gray-800">
                    <h4 class="uppercase font-extralight text-primary">La filiale énergies du groupe PFO Africa</h4>
                    <p>PFO Énergies propose une expertise complète sur toute la chaîne de valeur énergétique, en développant des solutions clés en main couvrant l’ensemble du cycle
                    de vie des projets. De l’identification et la sécurisation des sites à la structuration financière, en passant par les études techniques, l’ingénierie, la construction et la
                    mise en exploitation, l’entreprise conçoit, réalise et opère des infrastructures énergétiques durables et performantes.</p>
                    <p>Active dans le développement de centrales solaires, la production d’énergies renouvelables (solaire, biomasse, hydraulique) et les solutions énergétiques pour les
                    secteurs commercial et industriel, elle intervient également comme producteur indépendant d’électricité et optimise l’exploitation des infrastructures existantes.
                    PFO Énergies accompagne ainsi les acteurs publics et privés dans leur transition vers une énergie fiable, compétitive et responsable.</p>
                </div>
            </div>
            <div class="absolute bottom-0 right-0 flex-none size-10 border-r border-b border-primary"></div>
        </div>

        <?php
        $categories = get_terms([
            'taxonomy'   => 'metier_category',
            'hide_empty' => false
        ]);
        ?>

        <div class="space-y-10">
            <div class="inline-block">
                <h2 class="text-xl text-primary uppercase leading-none tracking-tight font-semibold">Métiers</h2>
                <div class="mt-1 h-0.5 w-16 bg-primary"></div>
            </div>
            <div class="space-y-6 grid grid-cols-1 md:grid-cols-3 gap-10 lg:gap-0">
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
        </div>

        <?php
        $divisions = get_terms([
            'taxonomy'   => 'metier_divisions',
            'hide_empty' => false
        ]);

        if (!empty($divisions)) :
            $featured = array_shift($divisions);
        ?>
            <div class="bg-white shadow-2xl p-8">
                <div class="grid lg:grid-cols-3 gap-5">
                    <!-- Grande division -->
                    <div>
                        <?php
                        $image = get_field(
                            'image_division',
                            'term_' . $featured->term_id
                        );
                        ?>

                        <h2 class="text-primary text-md md:text-lg font-bold uppercase text-center">
                            <?= esc_html($featured->name) ?>
                        </h2>

                        <p class="uppercase italic text-primary/80 font-extralight text-sm text-center mb-4">
                            <?= esc_html($featured->description) ?>
                        </p>

                        <?php if ($image) : ?>
                            <img
                                src="<?= esc_url($image['url']) ?>"
                                alt="<?= esc_attr($featured->name) ?>"
                                class="w-full h-72.5 md:h-150 object-cover"
                            >
                        <?php endif; ?>
                    </div>

                    <!-- Divisions restantes -->
                    <div class="lg:col-span-2">
                        <div class="grid md:grid-cols-2 gap-5">
                            <?php foreach ($divisions as $division) : ?>
                                <?php
                                $image = get_field(
                                    'image_division',
                                    'term_' . $division->term_id
                                );
                                ?>

                                <article>
                                    <h3 class="text-primary text-md md:text-lg font-bold uppercase text-center">
                                        <?= esc_html($division->name) ?>
                                    </h3>

                                    <p class="uppercase italic text-primary/80 font-extralight text-sm text-center mb-4">
                                        <?= esc_html($division->description) ?>
                                    </p>

                                    <?php if ($image) : ?>
                                        <img
                                            src="<?= esc_url($image['url']) ?>"
                                            alt="<?= esc_attr($division->name) ?>"
                                            class="w-full h-72.5 object-cover"
                                        >
                                    <?php endif; ?>
                                </article>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>


        <div class="space-y-6">
            <div class="inline-block">
                <h2 class="text-xl text-primary uppercase leading-none tracking-tight font-semibold">Avantages <br class="hidden md:block">concurrentiels</h2>
                <div class="mt-1 h-0.5 w-16 bg-primary"></div>
            </div>
            <div class="max-w-6xl mx-auto">
                <div class="max-w-3xl mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 text-primary border border-primary">
                    <div class="flex items-center justify-center sm:text-lg lg:text-xl p-10 bg-primary text-white">
                        <p>Présent dans 4 pays : Côte d’Ivoire - Burkina Faso - Mali - Togo</p>
                    </div>
                    <div class="flex items-center justify-center sm:text-lg lg:text-xl p-10">
                        <p>Maîtrise du cycle de développement d’un projet énergétique</p>
                    </div>
                    <div class="flex items-center justify-center sm:text-lg lg:text-xl p-10 bg-primary text-white sm:bg-transparent sm:text-primary md:bg-primary md:text-white">
                        <p>Une approche long- terme</p>
                    </div>
                    <div class="flex items-center justify-center sm:text-lg lg:text-xl p-10 bg-white text-primary sm:bg-primary sm:text-white md:bg-transparent md:text-primary">
                        <p>Maîtrise des aspects juridiques et fiscaux de nos pays d’intervention</p>
                    </div>
                    <div class="flex items-center justify-center sm:text-lg lg:text-xl p-10 bg-primary text-white">
                        <p>Un réseau d’experts locaux et internationaux</p>
                    </div>
                    <div class="flex items-center justify-center sm:text-lg lg:text-xl p-10">
                        <p>Capacité d’investissement et d’exécution</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php 
endwhile; // Fin de la boucle
get_footer(); 
?>