<?php get_header(); ?>

<section class="min-h-[70vh] flex items-center justify-center">

    <div class="text-center">

        <h1 class="text-8xl text-primary font-bold">
            500
        </h1>

        <h2 class="text-3xl mt-4">
            <?= __('Server error', 'pfoenergies'); ?>
        </h2>

        <p class="mt-4 text-gray-600">
            <?= __('An unexpected error has occurred.', 'pfoenergies'); ?>
        </p>

        <a
            href="<?= home_url(); ?>"
            class="mt-8 inline-block bg-primary text-white px-6 py-3"
        >
            <?= __('Back to Home', 'pfoenergies'); ?>
        </a>

    </div>

</section>

<?php get_footer(); ?>