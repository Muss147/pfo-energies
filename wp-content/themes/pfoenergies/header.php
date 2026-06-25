<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicons/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicons/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicons/favicon-16x16.png">
        <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicons/site.webmanifest">
        
        <?php wp_head() ?>
    </head>

    <body>
        <header class="
            header
            fixed
            top-0
            w-full
            z-99999
            bg-white
            text-primary 
            font-bold 
            text-[15px]  
            leading-3.75 
            transition-colors
            duration-300
            ease-in-out
            shadow-md">
            <div class="max-w-350 mx-auto px-4 md:px-6 grid grid-cols-6 py-4 relative">
                <a href="<?= home_url('/'); ?>" class="col-span-3 lg:col-span-1 logo" title="<?= __('Homepage', 'pfoenergies') ?>">
                    <img alt="<?= __('Homepage', 'pfoenergies') ?>" src="<?= get_theme_mod('logo') ?>" class="h-8 md:h-11">
                </a>
                <?php
                wp_nav_menu([
                    'theme_location' => 'header',
                    'container' => false,
                    'menu_class' => 'navbar__menu uppercase flex flex-col absolute items-start justify-end gap-5 w-full h-max top-16 left:0 px-4 py-8 bg-primary text-white 
                        lg:col-span-4 lg:flex-row lg:relative lg:px-0 lg:py-0 lg:bg-white lg:text-primary 
                        lg:h-full lg:w-auto lg:top-0 lg:items-end lg:gap-7'
                ]);
                ?>
                <div class="col-span-3 lg:col-span-1 mobil__menu flex items-center md:items-end justify-end gap-4 md:gap-6 lg:gap-10">
                    <?php 
                        if (function_exists('pll_the_languages')) : 
                        $languages = pll_the_languages([
                            'raw' => 1
                        ]);
                    ?>
                    <div class="flex items-end">
                        <?php foreach ($languages as $lang) : ?>
                        <a
                            href="<?= esc_url($lang['url']); ?>"
                            class="py-1 px-2 <?= $lang['current_lang']
                                ? 'bg-primary text-white'
                                : ''; ?>"
                        >
                            <?= strtoupper($lang['slug']); ?>
                        </a>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                    <button 
                        type="button"
                        class="hidden lg:block search-trigger"
                        aria-label="Recherche">
                        <!-- <img alt="" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/icon-search.png" class="h-7"> -->
                        <svg xmlns="http://www.w3.org/2000/svg" 
                                viewBox="0 0 24 24" 
                                fill="none" 
                                stroke="currentColor" 
                                stroke-width="2.5" 
                                stroke-linecap="round" 
                                stroke-linejoin="round" 
                                class="w-7 h-7 text-primary">
                            <circle cx="14" cy="10" r="6" />
                            <line x1="9.8" y1="14.2" x2="4" y2="20" />
                        </svg>
                    </button>

                    <button class="flex lg:hidden btn__menu cursor-pointer text-primary">
                        <i>Menu</i>
                    </button>
                </div>
            </div>
        </header>

        <!-- Search Modal -->
        <div class="search-modal fixed inset-0 z-999999 hidden">
            <!-- Backdrop -->
            <div class="search-backdrop absolute inset-0"></div>
            <!-- Content -->
            <div class="relative h-full flex items-center justify-center px-4">
                <div class="text-white w-full max-w-3xl p-8">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-semibold uppercase">
                            <?= __('Search', 'pfoenergies') ?>
                        </h2>

                        <button
                            type="button"
                            class="search-close absolute top-6 right-6 text-3xl leading-none cursor-pointer shadow-2xl"
                        >
                            &times;
                        </button>
                    </div>
                    <?php $lang_suffix = (function_exists('pll_current_language') && pll_current_language() === 'en') ? '/en' : ''; ?>
                    <form
                        action="<?= esc_url(get_option('home') . $lang_suffix); ?>/"
                        method="get"
                        class="flex flex-col md:flex-row gap-4"
                    >
                        <?php if ($lang_suffix) : ?>
                            <input type="hidden" name="lang" value="en">
                        <?php endif; ?>
                        <input
                            type="search"
                            name="s"
                            value="<?= esc_attr(get_search_query()); ?>"
                            placeholder="<?= __('Search...', 'pfoenergies') ?>"
                            class="search-input flex-1 w-full border-2 border-white px-4 py-3 outline-none shadow-2xl"
                            required
                        >

                        <button
                            type="submit"
                            class="bg-white text-primary hover:bg-transparent hover:text-white border-white border-2 text-md px-3 py-2 rounded-sm transition-colors duration-300 ease-in-out shadow-2xl"
                        >
                            <span class="inline-block ml-2"><?= __('Search', 'pfoenergies') ?></span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline-block ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Social side bar -->
        <div class="fixed inset-y-0 right-0 w-16 flex flex-col justify-center items-center gap-3">
            <?php if ($instagram = get_theme_mod('instagram')) : ?>
            <div class="flex items-center justify-center rounded-full bg-white shadow-md size-7">
                <a href="<?= esc_url($instagram) ?>" class="text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                        <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                        <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                        <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                    </svg>
                </a>
            </div>
            <?php endif; ?>
            <?php if ($youtube = get_theme_mod('youtube')) : ?>
            <div class="flex items-center justify-center rounded-full bg-white shadow-md size-7">
                <a href="<?= esc_url($youtube) ?>" class="text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                        <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                    </svg>
                </a>
            </div>
            <?php endif; ?>
            <?php if ($facebook = get_theme_mod('facebook')) : ?>
            <div class="flex items-center justify-center rounded-full bg-white shadow-md size-7">
                <a href="<?= esc_url($facebook) ?>" class="text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c4.56-.93 8-4.96 8-9.75z"/>
                    </svg>
                </a>
            </div>
            <?php endif; ?>
        </div>

        <main class="min-h-screen">