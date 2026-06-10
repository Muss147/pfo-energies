
<?php get_header(); ?>
    
    <?php while (have_posts()) : the_post(); ?>
    
    <div class="max-w-7xl mx-auto py-8 mt-14">

        <article class="w-full">
            <?php if (has_post_thumbnail()): ?>
                <?php the_post_thumbnail('large', ['class' => 'w-full h-145 object-cover mt-3 shadow-xl/20']); ?>
            <?php endif ?>

            <?php 
            $status = get_the_terms(get_post(), 'project_status');
            $location = get_the_terms(get_post(), 'project_location');
            ?>

            <div class="text-primary uppercase text-center mt-7">
                <h1 class="text-3xl font-semibold mb-4"><?php the_title(); ?></h1>
                <span class="text-xl font-extralight">
                    <?= $location ? $location[0]->name : '' ?>
                    <?php if ($status) : ?>
                        – <?php echo $status[0]->name; ?>
                    <?php endif; ?>
                </span>
            </div>
            
            <div class="formatted mt-7 font-light text-gray-800">
                <?php the_content(); ?>
            </div>
        </article>
        
        <?php 
        if (get_field('type_de_projet') || 
            get_field('concessionnaire') || 
            get_field('maitre_douvrage') || 
            get_field('entreprise_associee') || 
            get_field('duree_des_travaux') || 
            get_field('livraison')): ?>

        <div class="flex flex-wrap lg:flex-nowrap items-start justify-between gap-4 leading-none tracking-tight mt-10">
            <div class="text-center flex-1 t">
                <h4 class="text-primary text-sm uppercase font-semibold">
                    <?php the_field('type_de_projet') ?>
                </h4>
                <span class="text-sm font-extralight text-gray-600"></span>
            </div>
            <?php if (get_field('concessionnaire')): ?>
            <div class="text-center flex-1 t">
                <h4 class="text-primary text-sm uppercase font-semibold"><?= __('Dealer', 'pfoenergies') ?></h4>
                <span class="text-sm font-extralight text-gray-600"><?php the_field('concessionnaire') ?></span>
            </div>
            <?php endif; ?>
            <?php if (get_field('maitre_douvrage')): ?>
            <div class="text-center flex-1 t">
                <h4 class="text-primary text-sm uppercase font-semibold"><?= __('Master of Works', 'pfoenergies') ?></h4>
                <span class="text-sm font-extralight text-gray-600"><?php the_field('maitre_douvrage') ?></span>
            </div>
            <?php endif; ?>
            <?php if (get_field('entreprise_associee')): ?>
            <div class="text-center flex-1 t">
                <h4 class="text-primary text-sm uppercase font-semibold"><?= __('Associated Company', 'pfoenergies') ?></h4>
                <span class="text-sm font-extralight text-gray-600"><?php the_field('entreprise_associee') ?></span>
            </div>
            <?php endif; ?>
            <?php if (get_field('duree_des_travaux')): ?>
            <div class="text-center flex-1 t">
                <h4 class="text-primary text-sm uppercase font-semibold"><?= __('Duration of Works', 'pfoenergies') ?></h4>
                <span class="text-sm font-extralight text-gray-600"><?php the_field('duree_des_travaux') ?> <?= __('months', 'pfoenergies') ?></span>
            </div>
            <?php endif; ?>
            <?php if (get_field('livraison')): ?>
            <div class="text-center flex-1 t">
                <h4 class="text-primary text-sm uppercase font-semibold"><?= __('Delivery', 'pfoenergies') ?></h4>
                <span class="text-sm font-extralight text-gray-600"><?php the_field('livraison') ?></span>
            </div>
            <?php endif; ?>
        </div>

        <?php endif; ?>
    </div>

    <?php 
    $gallery = get_attached_media('image', get_post()); 
    if (!empty($gallery)) : 
        $first_image = reset($gallery);
        $url_first_image = wp_get_attachment_image_url($first_image->ID, 'large');
    else :
        $url_first_image = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mO8dOlyPQAH7QL4Bgm9FAAAAABJRU5ErkJggg==";
    endif;
    ?>

    <?php 
    if (get_field('panneaux_solaires') || 
        get_field('hectares') || 
        get_field('foyes_electrifies')): 
    ?>
    <div class="relative mt-10">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-5">
            <div class="col-span-3 w-full h-112 bg-cover bg-center bg-no-repeat shadow-xl/20 z-10" style="background-image: url('<?= $url_first_image; ?>');"></div>
            <div class="col-span-2">
                <div class="absolute inset-y-0 right-0 h-full max-w-5/12 w-full flex items-center">
                    <div class="bg-primary text-white w-full py-5 pl-10 pr-24">
                        <h4 class="uppercase text-center p-2 border border-white"><?= __('Key Figures', 'pfoenergies') ?></h4>
                        <ul class="font-extralight mt-8">
                            <?php if (get_field('panneaux_solaires')): ?>
                            <li class="flex flex-col mb-3">
                                <span class="text-3xl font-bold"><?php the_field('panneaux_solaires') ?></span>
                                <span class="text-md font-light uppercase"><?= __('Solar panels', 'pfoenergies') ?></span>
                            </li>
                            <?php endif; ?>
                            <?php if (get_field('hectares')): ?>
                            <li class="flex flex-col mb-3">
                                <span class="text-3xl font-bold"><?php the_field('hectares') ?></span>
                                <span class="text-md font-light uppercase"><?= __('Hectares', 'pfoenergies') ?></span>
                            </li>
                            <?php endif; ?>
                            <?php if (get_field('foyes_electrifies')): ?>
                            <li class="flex flex-col">
                                <span class="text-3xl font-bold"><?php the_field('foyes_electrifies') ?></span>
                                <span class="text-md font-light uppercase"><?= __('Electrified houses', 'pfoenergies') ?></span>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <div class="max-w-7xl mx-auto mt-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach($gallery as $image): ?>
            <div class="w-full h-80 bg-cover bg-center bg-no-repeat shadow-xl/20" style="background-image: url('<?= wp_get_attachment_image_url($image->ID, 'project-gallery'); ?>');"></div>
            <?php endforeach ?>
        </div>
    </div>

    <?php endwhile; ?>

<?php get_footer(); ?>

