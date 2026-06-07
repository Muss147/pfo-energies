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
            <div class="max-w-350 mx-auto grid grid-cols-6 py-4 relative">
                <a href="<?= home_url('/'); ?>" class="col-span-3 lg:col-span-1 logo" title="<?= __('Homepage', 'pfoenergies') ?>">
                    <img alt="<?= __('Homepage', 'pfoenergies') ?>" src="<?= get_theme_mod('logo') ?>" class="h-11">
                </a>
                <div class="col-span-3 flex items-end justify-end text-primary lg:hidden">
                    <img alt="Menu" src="wp-content/themes/pfoenergies/assets/img/burger-menu.svg" class="h-6">
                </div>
                <?php
                wp_nav_menu([
                    'theme_location' => 'header',
                    'container' => false,
                    'menu_class' => 'col-span-6 lg:col-span-4 flex flex-col absolute py-8 border-t border-pantone  
                        lg:flex-row lg:relative lg:py-0 lg:border-none 
                        xl:gap-7 
                        items-end justify-end gap-2 md:gap-4 list-none uppercase h-full'
                ]);
                ?>
                <div class="col-span-6 lg:col-span-1 flex items-end justify-end gap-10 absolute lg:relative">
                    <div class="">
                        <a href="" class="py-1 px-2">EN</a>
                        <a href="" class="py-1 px-2 bg-primary text-white">FR</a>
                    </div>
                    <a href="" class="-mb-2"><img alt="" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/icon-search.png" class="h-8"></a>
                </div>
            </div>
        </header>

        <main class="min-h-screen">