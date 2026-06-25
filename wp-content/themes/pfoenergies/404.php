<?php get_header(); ?>

<section class="min-h-lvh flex flex-col items-center justify-center">
    <div class="max-w-7xl mx-auto px-4 md:px-6 text-center">

        <h1 class="text-8xl font-bold text-primary mb-4">
            404
        </h1>

        <h2 class="text-3xl mb-4">
            <?= __('Page Not Found', 'pfoenergies'); ?>
        </h2>

        <p class="text-gray-600 mb-4">
            <?= __('The page you are looking for no longer exists or has been moved.', 'pfoenergies'); ?>
        </p>

        <?php $lang_suffix = (function_exists('pll_current_language') && pll_current_language() === 'en') ? '/en' : ''; ?>
        <form
            action="<?= esc_url(get_option('home') . $lang_suffix); ?>/"
            method="get"
            class="max-w-xl mx-auto flex gap-3 mb-10"
        >
            <?php if ($lang_suffix) : ?>
                <input type="hidden" name="lang" value="en">
            <?php endif; ?>

            <input
                type="search"
                name="s"
                value="<?= esc_attr(get_search_query()); ?>"
                class="flex-1 border-2 border-primary px-4 py-3 outline-none"
                placeholder="<?= __('Search...', 'pfoenergies') ?>"
            >

            <button
                type="submit"
                class="bg-primary text-white hover:bg-transparent hover:text-primary border-primary border-2 text-md px-3 py-2 rounded-sm transition-colors duration-300 ease-in-out shadow-2xl"
            >
                <span class="hidden sm:block">
                    <span class="inline-block ml-2"><?= __('Search', 'pfoenergies') ?></span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline-block ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </span>
                <span class="block sm:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" 
                            viewBox="0 0 24 24" 
                            fill="none" 
                            stroke="currentColor" 
                            stroke-width="2.5" 
                            stroke-linecap="round" 
                            stroke-linejoin="round" 
                            class="w-6 h-6">
                        <circle cx="14" cy="10" r="6" />
                        <line x1="9.8" y1="14.2" x2="4" y2="20" />
                    </svg>
                </span>
            </button>
        </form>

        <a
            href="<?= home_url(); ?>"
            class="inline-flex items-center bg-primary text-white px-6 py-3 rounded-sm"
        >
            <?= __('Back to Home', 'pfoenergies'); ?>
        </a>

    </div>
</section>

<?php get_footer(); ?>