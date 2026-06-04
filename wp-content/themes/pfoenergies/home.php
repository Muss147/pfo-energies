
<?php get_header(); ?>

    <div class="w-full h-168.75 bg-contain bg-center bg-no-repeat bg-fixed mt-10" style="background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url('wp-content/themes/pfoenergies/assets/img/actualites.png');">
        <div class="max-w-350 mx-auto text-white py-14">
            <h1 class="text-4xl uppercase font-semibold">Actualités</h1>
            <!-- <p class="mt-4 text-lg">Nous sommes une entreprise spécialisée dans les énergies renouvelables, offrant des solutions innovantes pour un avenir plus durable.</p> -->
        </div>
    </div>

    <div class="max-w-7xl mx-auto py-12">
        <div class="inline-block mb-8">
            <h2 class="text-xl text-primary uppercase leading-none tracking-tight font-semibold">À la une</h2>
            <div class="mt-1 h-0.5 w-16 bg-primary"></div>
        </div>

        <card class="w-full">
            <div class="pr-0 sm:pr-12">
                <div class="flex items-center justify-between text-primary">
                    <h3 class="text-md uppercase font-semibold mb-2">FERKÉ SOLAR OFFRE UNE SALLE INFORMATIQUE ET DU MATÉRIEL MÉDICAL À FERKESSÉDOUGOU</h3>
                    <span class="font-light italic">05/03/2026</span>
                </div>
                <img alt="Image de l'actualité en vedette" src="wp-content/themes/pfoenergies/assets/img/actualite-une.png" class="w-full h-145 object-cover mt-3 shadow-xl/20">
                <p class="mt-7 font-light text-gray-800">Ferkessédougou, 05 mars 2026 (AIP)- La centrale Ferké, initiée par PFO Énergies dans la région du Tchologo, a offert mercredi 04 mars 2026, une salle informatique et du matériel médical...</p>
            </div>
            <div class="flex items-center justify-between mt-5">
                <a href="#" class="bg-primary text-white hover:bg-white hover:text-primary hover:border-primary border-2 text-md px-3 py-1 rounded-sm transition-colors duration-300 ease-in-out">
                    <span class="inline-block ml-2">Lire plus</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 inline-block ml-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                    </svg>
                </a>
                <div class="size-10 border-r border-b border-primary"></div>
            </div>
        </card>
        <!-- <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            $args = [
                'post_type' => 'post',
                'posts_per_page' => 6,
            ];
            $query = new WP_Query($args);
            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
                    ?>
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('medium_large', ['class' => 'w-full h-48 object-cover']); ?>
                            </a>
                        <?php endif; ?>
                        <div class="p-4">
                            <h3 class="text-xl font-semibold mb-2"><a href="<?php the_permalink(); ?>" class="hover:underline"><?php the_title(); ?></a></h3>
                            <p class="text-sm text-gray-600"><?php echo get_the_date(); ?></p>
                        </div>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p>Aucune actualité trouvée.</p>';
            endif;
            ?>
        </div> -->
    </div>

<?php get_footer(); ?>

