
<?php get_header(); ?>

    <div class="w-full h-168.75 bg-contain bg-center bg-no-repeat bg-fixed mt-14" style="background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url('<?php echo get_template_directory_uri(); ?>/assets/img/actualites.png');">
        <div class="max-w-350 mx-auto h-full flex flex-col justify-end py-14">
            <div class="max-w-full lg:max-w-2/5 w-full text-white">
                <h1 class="text-4xl uppercase font-semibold">
                    <?php if(is_category()): ?>
                        <?php single_cat_title() ?>
                    <?php else: ?>
                        <?php single_post_title() ?>
                    <?php endif ?>
                </h1>
                <div class="border-l-2 border-white font-extralight text-md my-6 pl-4">
                    <p class="">Créée fin 2022, PFO Énergies développe, finance et exploite des infrastructures durables pour favoriser l’accès à l’électricité verte en Afrique de l’Ouest.</p>
                </div>
                <a href="<?php the_permalink() ?>" class="bg-white text-primary hover:bg-transparent hover:text-white border-white border-2 text-md px-3 py-2 rounded-sm transition-colors duration-300 ease-in-out">
                    <span class="inline-block ml-2"><?= __('Learn more', 'pfoenergies') ?></span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 inline-block ml-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
    
    <div class="max-w-7xl mx-auto py-8">
        <div class="inline-block mb-8">
            <h2 class="text-xl text-primary uppercase leading-none tracking-tight font-semibold"><?= __('Careers', 'pfoenergies') ?></h2>
            <div class="mt-1 h-0.5 w-16 bg-primary"></div>
        </div>
        
        <!-- Étapes -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10 lg:gap-0 mb-16">
            <!-- Développement -->
            <div class="flex flex-col items-center text-center px-6 lg:border-r-2 lg:border-primary">
                <h3 class="text-primary text-xl font-bold uppercase mb-10">
                    Développement
                </h3>

                <div class="flex justify-center gap-12">
                    <div>
                        <img src="<?= get_template_directory_uri() ?>/assets/img/icon/conception.png"
                            alt="Conception"
                            class="h-14 mx-auto">
                        <p class="mt-4 text-gray-700">
                            Conception
                        </p>
                    </div>
                    <div>
                        <img src="<?= get_template_directory_uri() ?>/assets/img/icon/financement.png"
                            alt="Financement"
                            class="h-14 mx-auto">
                        <p class="mt-4 text-gray-700">
                            Financement
                        </p>
                    </div>
                </div>
            </div>

            <!-- Construction -->
            <div class="flex flex-col items-center text-center px-6 lg:border-r-2 lg:border-primary">
                <h3 class="text-primary text-xl font-bold uppercase mb-10">
                    Construction
                </h3>
                <div class="flex justify-center gap-12">
                    <div>
                        <img src="<?= get_template_directory_uri() ?>/assets/img/icon/epc.png"
                            alt="EPC"
                            class="h-14 mx-auto">
                        <p class="mt-4 text-gray-700">
                            EPC
                        </p>
                    </div>
                    <div>
                        <img src="<?= get_template_directory_uri() ?>/assets/img/icon/travaux.png"
                            alt="Travaux"
                            class="h-14 mx-auto">
                        <p class="mt-4 text-gray-700">
                            Travaux
                        </p>
                    </div>
                </div>
            </div>

            <!-- Exploitation -->
            <div class="flex flex-col items-center text-center px-6">
                <h3 class="text-primary text-xl font-bold uppercase mb-10">
                    Exploitation
                </h3>
                <div class="flex justify-center gap-12">
                    <div>
                        <img src="<?= get_template_directory_uri() ?>/assets/img/icon/om.png"
                            alt="O&M"
                            class="h-14 mx-auto">
                        <p class="mt-4 text-gray-700">
                            O&amp;M
                        </p>
                    </div>
                    <div>
                        <img src="<?= get_template_directory_uri() ?>/assets/img/icon/vente-energie.png"
                            alt="Vente d'énergie"
                            class="h-14 mx-auto">
                        <p class="mt-4 text-gray-700">
                            Vente d'énergie
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Cartes -->

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
            <!-- Card -->
            <article class="bg-white shadow-xl/10 overflow-hidden group">
                <a href="#">
                    <img src="<?= get_template_directory_uri() ?>/assets/img/metiers/division-ipp.jpg"
                        alt="Division IPP"
                        class="w-full h-72 object-cover transition duration-500 group-hover:scale-105">
                    <div class="p-5">
                        <h3 class="text-primary text-lg font-bold uppercase">
                            Division IPP
                        </h3>
                        <p class="uppercase italic text-primary/80 font-extralight text-sm mt-1">
                            Centrales
                        </p>
                    </div>
                </a>
            </article>

            <!-- Card -->
            <article class="bg-white shadow-xl/10 overflow-hidden group">
                <a href="#">
                    <img src="<?= get_template_directory_uri() ?>/assets/img/metiers/division-operation-1.jpg"
                        alt="Division opérations"
                        class="w-full h-72 object-cover transition duration-500 group-hover:scale-105">
                    <div class="p-5">
                        <h3 class="text-primary text-lg font-bold uppercase">
                            Division opérations
                        </h3>
                        <p class="uppercase italic text-primary/80 font-extralight text-sm mt-1">
                            Commercial et industriel
                        </p>
                    </div>
                </a>
            </article>

            <!-- Card -->
            <article class="bg-white shadow-xl/10 overflow-hidden group">
                <a href="#">
                    <img src="<?= get_template_directory_uri() ?>/assets/img/metiers/division-operation-2.jpg"
                        alt="Division opérations"
                        class="w-full h-72 object-cover transition duration-500 group-hover:scale-105">
                    <div class="p-5">
                        <h3 class="text-primary text-lg font-bold uppercase">
                            Division opérations
                        </h3>
                        <p class="uppercase italic text-primary/80 font-extralight text-sm mt-1">
                            Énergie électrique
                        </p>
                    </div>
                </a>
            </article>
        </div>
    </div>

    <section class="max-w-7xl mx-auto py-20 px-4 space-y-24">
        <!-- Projet 1 -->
        <article class="relative">
            <div class="grid lg:grid-cols-12 gap-0 items-center">
                <!-- Bloc texte -->
                <div class="lg:col-span-5 relative z-10">

                    <div class="inline-block mb-8">
                        <h2 class="text-xl text-primary uppercase leading-none tracking-tight font-semibold">Centrale solaire Ferké Solar</h2>
                        <div class="mt-1 h-0.5 w-16 bg-primary"></div>
                    </div>

                    <div class="bg-primary text-white px-4 py-5 text-sm shadow-2xl">

                        <p class="leading-relaxed mb-6">
                            Premier projet solaire réalisé par un producteur indépendant
                            (IPP - Independant Power Producer) en Côte d’Ivoire,
                            la centrale Ferké Solar contribue directement à l’objectif
                            national de 45% d’énergies renouvelables dans le mix électrique.
                        </p>

                        <p class="leading-relaxed mb-8">
                            Elle répond aux besoins énergétiques locaux de la région
                            de Ferkessédougou tout en injectant ses excédents
                            dans le réseau national.
                        </p>

                        <a href="#" class="bg-white text-primary hover:bg-transparent hover:text-white border-white border-2 text-md px-3 py-2 rounded-sm transition-colors duration-300 ease-in-out">
                            <span class="inline-block ml-2"><?= __('Learn more', 'pfoenergies') ?></span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 inline-block ml-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                            </svg>
                        </a>

                    </div>
                </div>

                <!-- Image -->
                <div class="lg:col-span-7 lg:-ml-12 mt-8 lg:mt-0">
                    <div class="relative shadow-2xl">
                        <img
                            src="<?= get_template_directory_uri(); ?>/assets/img/projets/ferke-solar.jpg"
                            alt="Ferké Solar"
                            class="w-full h-[300px] md:h-[500px] object-cover">

                        <!-- Navigation -->
                        <button class="absolute left-6 top-1/2 -translate-y-1/2 text-white text-5xl">
                            ‹
                        </button>

                        <button class="absolute right-6 top-1/2 -translate-y-1/2 text-white text-5xl">
                            ›
                        </button>
                    </div>
                </div>
            </div>
        </article>


        <!-- Projet 2 (inversé) -->
        <article class="relative">
            <div class="grid lg:grid-cols-12 gap-0 items-center">
                <!-- Image -->
                <div class="lg:col-span-7 relative z-0">
                    <div class="relative shadow-2xl">
                        <img
                            src="<?= get_template_directory_uri(); ?>/assets/img/projets/odienne-solar.jpg"
                            alt="Odienné Solar"
                            class="w-full h-[300px] md:h-[500px] object-cover">

                        <button class="absolute left-6 top-1/2 -translate-y-1/2 text-white text-5xl">
                            ‹
                        </button>

                        <button class="absolute right-6 top-1/2 -translate-y-1/2 text-white text-5xl">
                            ›
                        </button>
                    </div>
                </div>

                <!-- Texte -->
                <div class="lg:col-span-5 lg:-ml-12 relative z-10 mt-8 lg:mt-0">
                    <div class="inline-block mb-8">
                        <h2 class="text-xl text-primary uppercase leading-none tracking-tight font-semibold">Odienne Solar</h2>
                        <div class="mt-1 h-0.5 w-16 bg-primary"></div>
                    </div>

                    <div class="bg-primary text-white px-4 py-5 text-sm shadow-2xl">
                        <p class="leading-relaxed mb-6">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </p>

                        <p class="leading-relaxed mb-8">
                            Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur.
                        </p>

                        <a href="#" class="bg-white text-primary hover:bg-transparent hover:text-white border-white border-2 text-md px-3 py-2 rounded-sm transition-colors duration-300 ease-in-out">
                            <span class="inline-block ml-2"><?= __('Learn more', 'pfoenergies') ?></span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 inline-block ml-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </article>
    </section>
<?php get_footer(); ?>

