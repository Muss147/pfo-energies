<?php
$gallery = pfoenergies_get_project_gallery();

$reverse = $args['reverse'] ?? false;
?>

<article class="relative">

    <div class="grid lg:grid-cols-12 gap-0 items-center">

        <!-- TEXTE -->
        <div class="
            lg:col-span-5
            relative
            flex
            flex-col
            justify-center
            h-full
            z-10

            <?= $reverse ? 'order-1 lg:order-2' : '' ?>
        ">

            <div class="inline-block relative mb-4 lg:mb-0 lg:absolute top-0 lg:top-6 <?= $reverse ? 'left-0 lg:left-6' : 'left-0' ?>">
                <h2 class="text-xl text-primary uppercase font-semibold">
                    <?php the_title(); ?>
                </h2>

                <div class="mt-1 h-0.5 w-16 bg-primary"></div>
            </div>

            <div class="bg-primary p-5 shadow-2xl flex flex-col items-center lg:items-start gap-6">

                <div class="text-white text-sm prose prose-sm prose-invert">
                    <?php
                    echo wp_trim_words(
                        apply_filters('the_content', get_the_content()),
                        85,
                        '...'
                    );
                    ?>
                </div>

                <a
                    href="<?php the_permalink(); ?>"
                    class="bg-white text-primary hover:bg-transparent hover:text-white border-white border-2 text-md px-3 py-1 rounded-sm transition-colors duration-300 ease-in-out"
                >
                    <span class="inline-block ml-2">
                        <?= __('Learn more', 'pfoenergies') ?>
                    </span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline-block ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>

            </div>

        </div>

        <!-- IMAGE -->
        <div class="
            lg:col-span-7
            min-w-0
            overflow-hidden
            <?= $reverse ? 'order-2 lg:order-1' : '' ?>
        ">

            <div class="swiper project-swiper shadow-2xl">

                <div class="swiper-wrapper">

                    <?php foreach ($gallery as $image) : ?>

                        <div class="swiper-slide">

                            <img
                                src="<?= $image->ID
                                    ? wp_get_attachment_image_url($image->ID, 'project-highlight')
                                    : 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mO8dOlyPQAH7QL4Bgm9FAAAAABJRU5ErkJggg=='; ?>"
                                alt=""
                                class="w-full h-52 md:h-100 object-cover"
                            >

                        </div>

                    <?php endforeach; ?>

                </div>

                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>

            </div>

        </div>

    </div>

</article>