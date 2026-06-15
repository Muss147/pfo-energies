<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

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
                    <div class="">
                        <a href="" class="py-1 px-2">EN</a>
                        <a href="" class="py-1 px-2 bg-primary text-white">FR</a>
                    </div>
                    <button type="button" class="-mb-2"><img alt="" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/icon-search.png" class="hidden lg:block h-7"></button>

                    <button class="flex lg:hidden btn__menu cursor-pointer text-primary">
                        <i>Menu</i>
                    </button>
                </div>
            </div>
        </header>

        <main class="min-h-screen">