<?php
/*
Template Name: Contact
*/

/*
.col-span-2
*/

get_header();
?>

<?php 
while (have_posts()) : the_post(); 
?>

    <?php 
    $banner_url = has_post_thumbnail() 
        ? get_the_post_thumbnail_url(get_the_ID(), 'full') 
        : 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mO8dOlyPQAH7QL4Bgm9FAAAAABJRU5ErkJggg=='; // Ton image par défaut
    ?>
    
    <div class="w-full h-168.75 bg-cover bg-center bg-no-repeat lg:bg-fixed" style="background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url('<?= esc_url($banner_url); ?>');">
        <div class="max-w-350 mx-auto px-4 md:px-6 h-full py-14 mt-5 md:mt-19">
            <div class="max-w-full lg:max-w-2/5 w-full text-white">
                <h1 class="text-2xl md:text-4xl uppercase font-semibold">
                    <?php the_title(); ?>
                </h1>
            </div>
        </div>
    </div>
    
    <div class="max-w-7xl mx-auto px-4 md:px-6 py-14 space-y-10 font-extralight">

        <?php
        $navigation = get_field('navigation');
        $aside      = get_field('aside');
        ?>
        <!-- Onglets -->
        <div class="flex flex-wrap gap-4 sm:gap-8 md:gap-16 text-base md:text-xl">
            <?php
            $tabs = [
                'contact' => $navigation['nav_1'] ?? null,
                'quote'   => $navigation['nav_2'] ?? null,
            ];
            $index = 0;
            foreach ($tabs as $tab_id => $tab) :
                if (!$tab) {
                    continue;
                }
            ?>
            <button
                class="tab-btn flex items-center gap-2 pb-2 <?= $index === 0 ? 'active border-b-2 border-primary text-primary' : 'text-primary/70 hover:text-primary transition'; ?>"
                data-tab="<?= esc_attr($tab_id) ?>">
                <?php if (!empty($tab['icone'])) : ?>
                    <img
                        src="<?= esc_url($tab['icone']) ?>"
                        alt="<?= esc_attr($tab['nom']) ?>"
                        class="h-6"
                    >
                <?php endif; ?>

                <?= esc_html($tab['nom']) ?>
            </button>
            <?php $index++; endforeach; ?>
        </div>

        <!-- Contenu -->
        <div class="max-w-6xl mx-auto grid lg:grid-cols-12 gap-10 lg:gap-24">
            <!-- Colonne gauche -->
             <?php
            $coordonnees = [
                $aside['nos_coordonnees']['coordonnee_1'] ?? null,
                $aside['nos_coordonnees']['coordonnee_2'] ?? null,
                $aside['nos_coordonnees']['coordonnee_3'] ?? null,
            ];
            ?>
            <aside class="lg:col-span-4 lg:pr-10 lg:border-r border-gray-300">
                <h3 class="uppercase text-base mb-8">
                    <?= __('Our Contact Information', 'pfoenergies'); ?>
                </h3>

                <div class="space-y-8 text-primary">
                    <?php foreach ($coordonnees as $item) :
                        if (!$item) {
                            continue;
                        }
                    ?>
                    <!-- Adresse -->
                    <div class="flex items-start gap-4">
                        <div
                            class="size-8 rounded-full bg-primary flex items-center justify-center text-white">
                            <?php if (!empty($item['icone'])) : ?>
                                <img
                                    src="<?= esc_url($item['icone']) ?>"
                                    class="w-5 h-5 object-contain"
                                >
                            <?php endif; ?>
                        </div>
                        <div>
                            <h4 class="text-base"><?= esc_html($item['titre']) ?></h4>

                            <p class="text-primary text-sm hover:underline">
                                <?= $item['contenu'] ?>
                            </p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>

                <?php
                $contact_specialise = $aside['contact_specialise']['contact_1'] ?? null;
                ?>
                <?php if ($contact_specialise) : ?>
                <div class="mt-10">
                    <h3 class="uppercase text-base mb-5">
                        <?= __('Specialized Contact', 'pfoenergies'); ?>
                    </h3>

                    <div>
                        <h4 class="text-base font-semibold">
                            <?= esc_html($contact_specialise['titre']) ?>
                        </h4>
                        <p class="text-primary text-sm hover:underline">
                            <?= $contact_specialise['contenu'] ?>
                        </p>
                    </div>
                </div>
                <?php endif; ?>
            </aside>

            <!-- Colonne droite -->
            <?php
            $index = 0;
            foreach ($tabs as $tab_id => $tab) :
                if (!$tab) {
                    continue;
                }
            ?>
            <div id="<?= esc_attr($tab_id) ?>" class="tab-content <?= $index === 0 ? 'opacity-100' : 'hidden opacity-0' ?> transition-all duration-300 lg:col-span-8">
                <h2 class="text-xl text-primary font-light">
                    <?= esc_html($tab['titre']) ?>
                </h2>

                <p class="text-gray-600 text-base mt-2 mb-8">
                    <?= esc_html($tab['description']) ?>
                </p>

                <!-- <?= do_shortcode('[contact-form-7 id="61ca171" title="" html_class="space-y-8"]'); ?> -->
                <?= $tab['contenu']; ?>
            </div>
            <?php $index++; endforeach; ?>
        </div>

    </div>

<?php 
endwhile; // Fin de la boucle
get_footer(); 
?>